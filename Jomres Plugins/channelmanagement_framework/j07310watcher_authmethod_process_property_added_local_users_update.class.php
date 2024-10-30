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

class j07310watcher_authmethod_process_property_added_local_users_update
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

			$super_property_managers = array();
			$query = 'SELECT `userid` FROM #__jomres_managers WHERE access_level = 90 ';
			$superPropertyManagers = doSelectSql($query);
			if (!empty($superPropertyManagers)) {
				foreach ($superPropertyManagers as $x) {
					$super_property_managers[] = $x->userid;
				}
			}

			foreach ( $webhook_messages as $webhook_notification ) {
				if ($webhook_notification->data->manager_id != 0 ) {
					logging::log_message("CMF instant webhook handler :  Webhook triggered ".$webhook_notification->webhook_event , 'CMF', 'DEBUG' , '' );
					$data = $webhook_notification->data;

					// First we'll use the manager id to give the property a local cmf xref id, so we'll need to get the manager id, find their channel id, then send that off to the api to create the local cross reference
					if (isset($data) && $data !== false && isset($webhook_notification->webhook_event) && $webhook_notification->webhook_event == 'property_created' ) {
						$query = "SELECT id FROM #__jomres_channelmanagement_framework_channels WHERE channel_name = 'jomres_local_ui' AND cms_user_id = ".(int)$webhook_notification->data->manager_id;
						$channel_id = (int)doSelectSql($query,1);
						channelmanagement_framework_utilities :: register_local_properties_to_manager ( $webhook_notification->data->manager_id , $channel_id , array( $webhook_notification->data->property_uid ) );

						// Next we need to find the super property managers and give them the same links in the xref table. If we don't, then they will not be able to administer the property using the cmf ui functionality. I can easily see that a normal property manager will create a property and then a super property manager will toddle along and do something for them. Because we're using the cmf api to honour the permissions system (instead of creating an exception for super managers) we need to send the same request to the api to give the super managers the same rights to the property(s).
						if (!empty($super_property_managers)) {
							foreach ($super_property_managers as $super_manager) {
								if ($webhook_notification->data->manager_id != $super_manager){
									$query = "SELECT id FROM #__jomres_channelmanagement_framework_channels WHERE channel_name = 'jomres_local_ui' AND cms_user_id = ".(int)$super_manager;
									$channel_id = (int)doSelectSql($query,1);

									if ($channel_id > 0) { // They may not have yet logged in and had a channel id created for them. If they log in later, then the 00005 cmf script will take care of adding any existing properties to the xref table for them.
										channelmanagement_framework_utilities :: register_local_properties_to_manager ( $super_manager , $channel_id , array( $webhook_notification->data->property_uid ) );
									}
								}
							}
						}
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
	