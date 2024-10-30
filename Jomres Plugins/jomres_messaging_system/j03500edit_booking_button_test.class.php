<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 *  @version Jomres 10.5.4
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	


class j03500edit_booking_button_test
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
	 
	public function __construct()
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}
		$ePointFilepath=get_showtime('ePointFilepath');
		$eLiveSite = get_showtime('eLiveSite');
		if (jomres_bootstrap_version() != "5") {
			return;
		}

		$use_messaging_system = get_showtime('use_messaging_system') ;
		if ($use_messaging_system == "0" ) {
			return;
		}

		$contract_uid = jomresGetParam($_REQUEST, 'contract_uid', 0);
		if ($contract_uid == 0) {
			return;
		}

		$defaultProperty = getDefaultProperty();
		$current_contract_details = jomres_singleton_abstract::getInstance('basic_contract_details');
		$current_contract_details->gather_data($contract_uid, $defaultProperty);

		$guest_uid = $current_contract_details->contract[$contract_uid]['contractdeets']['guest_uid'];
		$property_uid = $current_contract_details->contract[$contract_uid]['contractdeets']['property_uid'];

		if ($guest_uid > 0 ) {
			$query = "SELECT mos_userid FROM #__jomres_guests WHERE guests_uid = ".(int)$guest_uid;
			$guest_data = doSelectSql($query);
			if (!empty($guest_data)) {
				$cms_user_id = $guest_data[0]->mos_userid;
				$query = "SELECT group_id FROM #__jomres_messages_user_group WHERE property_uid = ".(int)$property_uid." AND user_id = ".(int)$cms_user_id;

				$group_info = doSelectSql($query);
				if (!empty($group_info)) {
					if ( isset($group_info[0]->group_id) && $group_info[0]->group_id > 0) {
						// This manager may not have been a party to the conversation when it was created
						// If the plugin becomes useful I may need to add code that adds and removes managers from groups when they're added to properties, but I'm not going to spend time on that now unless it's required later on.
						// For now, we'll check that the manager is in the group, if they are we can show the button

						$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

						$query = "SELECT group_id FROM #__jomres_messages_user_group WHERE group_id = ".(int)$group_info[0]->group_id." AND user_id = ".(int)$thisJRUser->cms_user_id;
						$manager_participation = doSelectSql($query);
						if (!empty($manager_participation)) {
							jomres_cmsspecific_addheaddata('css', $eLiveSite, 'messaging.css');
							jomres_cmsspecific_addheaddata('javascript', $eLiveSite.'iframe_resizer/', 'iframeResizer.contentWindow.min.js');

							$output = array();
							$pageoutput = array();
							$output['GROUP_ID']			= $group_info[0]->group_id;
							$output['CONVERSATIONS']	= jr_gettext( 'CONVERSATIONS' , 'CONVERSATIONS' , false);
							$output['ELIVESITE']		=  $eLiveSite;

							$pageoutput[ ] = $output;
							$tmpl = new patTemplate();
							$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
							$tmpl->readTemplatesFromInput('edit_booking_conversation_button.html');
							$tmpl->addRows('pageoutput', $pageoutput);
							$template = $tmpl->getParsedTemplate();

							$edit_booking_buttons = get_showtime('edit_booking_buttons');
							$edit_booking_buttons[] = $template;
							set_showtime('edit_booking_buttons' , $edit_booking_buttons );
						}
					}
				}
			}
		}
	}

	public function getRetVals()
	{
		return null;
	}
}
