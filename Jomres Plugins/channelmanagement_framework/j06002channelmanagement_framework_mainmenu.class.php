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

class j06002channelmanagement_framework_mainmenu {
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
		
		if ($JRUser->accesslevel < 70 ) { // Needs to be a full manager, not a receptionist
			return;
		}
		
		$output = array();
		$pageoutput = array();
		
		$menu_sections = array();

		$menu_sections[]= array ( "TEXT" => jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD','CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD',false) , "TASK" => "channelmanagement_framework");
		$menu_sections[]= array ( "TEXT" => jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS','CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS',false) , "TASK" => "channelmanagement_framework_user_accounts");

		$pageoutput[] = $output;
		$tmpl = new patTemplate();
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'menu_sections', $menu_sections );
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'menu.html' );
		$this->retVals = $tmpl->getParsedTemplate();
		//var_dump($this->retVals);exit;;
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
