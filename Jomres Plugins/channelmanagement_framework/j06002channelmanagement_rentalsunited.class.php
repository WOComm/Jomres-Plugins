<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06002channelmanagement_rentalsunited {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$ePointFilepath = get_showtime('ePointFilepath');

		define("JOMRES_CHANNEL_MANAGER" , "rentals_united");
		
		$JRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );
		
		/*
		$channelmanagement_framework_user_accounts = new channelmanagement_framework_user_accounts();
		$user_accounts = $channelmanagement_framework_user_accounts->get_accounts_for_user($JRUser->id);
		
		if ( trim($mrConfig["channel_management_rentals_united_username"]) == '' ) {
			echo jr_gettext('CHANNELMANAGEMENT_RENTALSUNITED_USERNAME_NOT_SET','CHANNELMANAGEMENT_RENTALSUNITED_USERNAME_NOT_SET',false);
			return;
		}
		
		if ( trim($mrConfig["channel_management_rentals_united_password"]) == '' ) {
			echo jr_gettext('CHANNELMANAGEMENT_RENTALSUNITED_PASSWORD_NOT_SET','CHANNELMANAGEMENT_RENTALSUNITED_PASSWORD_NOT_SET',false);
			return;
		} */
		

		
		jr_import('channelmanagement_framework_properties');
		$channelmanagement_framework_properties = new channelmanagement_framework_properties();
		$local_properties = $channelmanagement_framework_properties->get_local_property_ids_for_channel( (int)$JRUser->userid );
		
		
		if ( empty($local_properties) ) {
			$MiniComponents->specificEvent('06002', 'channelmanagement_rentalsunited_setup');
		} else {
			
			$output = array();
			$pageoutput = array();

			$output['CHANNELMANAGEMENT_RENTALSUNITED_TITLE'] = jr_gettext('CHANNELMANAGEMENT_RENTALSUNITED_TITLE','CHANNELMANAGEMENT_RENTALSUNITED_TITLE',false);

			$pageoutput[] = $output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			//$tmpl->addRows( 'rows', $rows );
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'channel_dashboard.html' );
			echo $tmpl->getParsedTemplate();
		}
		

			
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
