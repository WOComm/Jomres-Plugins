<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.21
 *
* @copyright	2005-2020 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * 
	 */

class j07310watcher_authmethod_process_manager_changed_local_users_update
{	
	/**
	 *
	 * Constructor
	 * 
	 * Main functionality of the Minicomponent 
	 *
	 * 
	 * 
	 */
	 
	public function __construct($componentArgs)
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;
			return;
		}

		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton');
		$channelmanagement_framework_singleton->init(999999999);

		$this->retVals = false;

		// $messages =  unserialize($componentArgs["payload"]); // Need to do this to get messages in 07320 scripts
		$messages = $componentArgs; // In 07310 scripts we can access the componentArgs variable

		$webhook_messages = $messages['webhook_messages'];

		logging::log_message("CMF property creation add property to local users channels : Received instant message with contents " , 'CMF', 'DEBUG' , serialize( $webhook_messages ) );

		if (!empty($webhook_messages)) {
			$webhook_messages = array_unique( $webhook_messages, SORT_REGULAR ); // Remove duplicate objects

			foreach ( $webhook_messages as $webhook_notification ) {
				if ($webhook_notification->data->manager_id != 0 ) {
					logging::log_message("CMF instant webhook handler :  Webhook triggered ".$webhook_notification->webhook_event , 'CMF', 'DEBUG' , '' );
					$data = $webhook_notification->data;

					// First we'll use the manager id to give the property a local cmf xref id, so we'll need to get the manager id, find their channel id, then send that off to the api to create the local cross reference
					if (
						isset($data) &&
						$data !== false &&
						isset($webhook_notification->webhook_event) &&
						(
							$webhook_notification->webhook_event == 'manager_added' ||
							$webhook_notification->webhook_event == 'manager_updated' ||
							$webhook_notification->webhook_event == 'manager_deleted'
						)
					)
					{


						$query = "SELECT id FROM #__jomres_channelmanagement_framework_channels WHERE channel_name = 'jomres_local_ui' AND cms_user_id = ".(int)$webhook_notification->data->manager_id;
						$channel_id = (int)doSelectSql($query,1);

						// Whether the manager has been added/changed or deleted, we'll to a straight removal of the channel in the cmf table. This will clean up the xref and channel table. The 00005 script will then re-initialise the data the next time the manager visits a page (or not, if they've been deleted). We don't need to silently re-initialise the data as this functionality is for the purpose giving managers rights to their properties through the cmf ui feature. As such the 00005 script's triggering will take care of that for us.
						$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
						$jrConfig = $siteConfig->get();
						$system_token =$jrConfig['system_token'];

						$call_api = new jomres_call_api('system' , $system_token );

						$method = 'DELETE';
						$endpoint = 'cmf/admin/channel/'.$channel_id;

						$result = $call_api->send_request(
							$method ,
							$endpoint ,
							[] ,
							[]
						);

					}
				}
			}
		}
	logging::log_message("CMF instant webhook handler : Completed Watcher's run." , 'CMF', 'DEBUG' , '' );
	}

	

	public function getRetVals()
	{
		return $this->retVals;
	}
}
	