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

class j06002channelmanagement_jomres2jomres {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$ePointFilepath = get_showtime('ePointFilepath');

		$JRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );
		
		jr_import('channelmanagement_framework_user_accounts');
		if (!class_exists('channelmanagement_framework_user_accounts')) {
			throw new Exception('Error: Channel management framework plugin not installed');
		}

		$channelmanagement_framework_user_accounts = new channelmanagement_framework_user_accounts();
		$user_accounts = $channelmanagement_framework_user_accounts->get_accounts_for_user($JRUser->id);

		if (empty($user_accounts)) {
			jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL.'&task=channelmanagement_framework_user_accounts&jr_redirect_url='.jr_base64url_encode(getCurrentUrl())), '');
		}
		
		
		jr_import('channelmanagement_framework_properties');
		$channelmanagement_framework_properties = new channelmanagement_framework_properties();
		$local_properties = $channelmanagement_framework_properties->get_local_property_ids_for_channel( (int)$JRUser->userid );
		
		
		if ( empty($local_properties) ) {
			$MiniComponents->specificEvent('06002', 'channelmanagement_rentalsunited_setup');
		} else {
			
			$output = array();
			$pageoutput = array();

			$output['CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE'] = jr_gettext('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE','CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE',false);

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
