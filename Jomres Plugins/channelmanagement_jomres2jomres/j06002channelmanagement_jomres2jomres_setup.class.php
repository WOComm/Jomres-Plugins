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

class j06002channelmanagement_jomres2jomres_setup {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$ePointFilepath = get_showtime('ePointFilepath');
		
		$current_channel = channelmanagement_framework_utilities :: get_current_channel ( $this , array ( "j06002channelmanagement_" , "_setup" ) );
		
		$JRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );

		$output = array();
		$pageoutput = array();

		$output['CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE'] = jr_gettext('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE','CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE',false);
		$output['CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE'] = jr_gettext('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE','CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE',false);
		$output['CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT'] = jr_gettext('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT','CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT',false);
		$output['CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT'] = jr_gettext('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT','CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT',false);
			
		$output['IMPORT_URL'] = jomresURL(JOMRES_SITEPAGE_URL."&task=channelmanagement_framework_import_properties&channel_name=".$current_channel);
		//$output['EXPORT_URL'] = jomresURL(JOMRES_SITEPAGE_URL."&task=channelmanagement_rentalsunited_export_all_properties");

		$pageoutput[] = $output;
			
		$tmpl = new patTemplate();
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'channel_setup_dashboard.html' );
		$this->retVals = $tmpl->getParsedTemplate();
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
