<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 *  @version Jomres 10.7.2
 *
 * @copyright	2005-2023 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('Direct Access to this file is not allowed.');
// ################################################################
	#[AllowDynamicProperties]
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 *
	 */

class j99994site_telegram_posts
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
	 
	function __construct()
	{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable=false;
			return;
		}

		if (get_showtime('task') == 'background_process') {
			return;
		}

		$ePointFilepath = get_showtime('ePointFilepath');

		$webhook_messages = get_showtime('webhook_messages');
		if (is_array($webhook_messages)) {
			$webhook_messages = array_unique($webhook_messages, SORT_REGULAR); // Remove duplicate objects
		}

		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

		if (get_showtime('task') == 'save_new_property') {
			// We can rely on the JRUser object

			$thisJRUser->init_user($thisJRUser->id);
			if ($thisJRUser->userIsManager) {
				$manager_id 	= $thisJRUser->id;
				$property_uid 	= end($thisJRUser->authorisedProperties);
			} else {
				logging::log_message("Webhook watcher. Non-registered user attempting to create property webhook event. Returning. ", 'Webhooks', 'DEBUG');
				return;
			}
		} else {
			$property_uid 	= (int)get_showtime("property_uid");
			$manager_id 	= 0;

			if ($property_uid == 0 && !jomres_cmsspecific_areweinadminarea() ) {
				return;
			}

			$property_manager_xref = get_showtime('property_manager_xref');

			if (is_null($property_manager_xref)) {
				$property_manager_xref = build_property_manager_xref_array();
			}

			if (array_key_exists($property_uid, $property_manager_xref)) {
				$manager_id = (int)$property_manager_xref[ $property_uid ];
			}

			if ($thisJRUser->userIsManager) {
				$manager_id = $thisJRUser->id;
			}

			if ($manager_id == 0) { // The function will try to find the manager id for a property. If it cannot be found the function will return the first super property manager's id will be returned. It's a last-ditch attempt to find a manager's id for a property. In the case of Beds24 calls, if there are more than one super property manager, and if the the first super property manager isn't registered with Beds24 then bookings still will not be sent.
				$manager_id = (int)find_manager_id_for_property_uid($property_uid);
			}
		}

		if ($manager_id == 0) {
			 return;
		}

		if ( !defined('TELEGRAM_TOKEN') || TELEGRAM_TOKEN == '' ) {
			return;
		}
		if ( !defined('TELEGRAM_CHAT_ID') || TELEGRAM_CHAT_ID == '' ) {
			return;
		}

		$all_events = true;

		if (!empty($webhook_messages)) {
			$basic_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
			$telegram = new Telegram(TELEGRAM_TOKEN);
			foreach ($webhook_messages as $message) {
				if ($all_events) {
					$pageoutput = array();
					$output = array();

					$output['WEBHOOK_EVENT'] = $message->webhook_event;
					if ($property_uid >0){
						$output['PROPERTY_NAME'] = $basic_property_details->get_property_name($property_uid);
						$output['PROPERTY_DASHBOARD'] = JOMRES_SITEPAGE_URL_NOSEF.'&task=dashboard&thisProperty='.$property_uid;
					}

					$manager_user = jomres_cmsspecific_getCMS_users_frontend_userdetails_by_id($manager_id);

					$output['MANAGER_ID'] =$manager_id;
					$output['MANAGER_USERNAME'] =$manager_user[$manager_id]['username'];

					$output['MANAGER_LINK'] = JOMRES_SITEPAGE_URL_NOSEF.'/administrator/index.php?option=com_users&view=user&layout=edit&id='.$manager_id;

					$output['EVENT_SERIALISED'] = serialize($message);

					$guest_user = jomres_cmsspecific_getCMS_users_frontend_userdetails_by_id($thisJRUser->id);
					$output['USER_USERNAME'] = $guest_user[$thisJRUser->id]['username'];
					$output['USER_LINK'] = get_showtime('live_site').'/'.JOMRES_ADMINISTRATORDIRECTORY.'/index.php?option=com_users&view=user&layout=edit&id='.$thisJRUser->id;

					$pageoutput[] = $output;
					$tmpl = new patTemplate();
					$tmpl->setRoot($ePointFilepath.'templates'.JRDS);
					$tmpl->readTemplatesFromInput('webhook_event.html');
					$tmpl->addRows('pageoutput', $pageoutput);
					$template = $tmpl->getParsedTemplate();

					$content = array('chat_id' => TELEGRAM_CHAT_ID, 'text' => $template ,'parse_mode' => 'HTML');
					$result = $telegram->sendMessage($content);
				}
			}
		}
	}

	/*
	 *
	 object(stdClass)#2322 (3) {
  ["webhook_event"]=>
  string(16) "property_updated"
  ["webhook_event_description"]=>
  string(32) "Logs when a property is updated."
  ["data"]=>
  object(stdClass)#2327 (2) {
    ["property_uid"]=>
    int(2)
    ["task"]=>
    string(16) "property_updated"
  }
}
	 *
	 */

	function getRetVals()
	{
		return null;
	}
}
