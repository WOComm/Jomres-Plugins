<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j06000magic_menu
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		
		if (!JOMRES_MAGIC_MENU_CONTINUE)
			return;
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$thisJRUser=jomres_getSingleton('jr_user');

		 if ( $thisJRUser->accesslevel >= 90 )
			{
			$pageoutput = array();
			$output = array();
			
			$tmpBookingHandler = jomres_getSingleton('jomres_temp_booking_handler');
			
			$output['SEARCH_URL'] = JOMRES_SITEPAGE_URL_NOSEF.$tmpBookingHandler->tmpsearch_data['magic_menu_search'];
			
			$output['_JOMRES_MAGIC_MENUS_INFO']			=jr_gettext('_JOMRES_MAGIC_MENUS_INFO', '_JOMRES_MAGIC_MENUS_INFO');
			$output['_JOMRES_MAGIC_MENUS_SAVE']			=jr_gettext('_JOMRES_MAGIC_MENUS_SAVE', '_JOMRES_MAGIC_MENUS_SAVE');
			$output['_JOMRES_MAGIC_MENUS_SEARCHTITLE']	=jr_gettext('_JOMRES_MAGIC_MENUS_SEARCHTITLE', '_JOMRES_MAGIC_MENUS_SEARCHTITLE');
			$output['_JOMRES_MAGIC_MENUS_TITLE']		=jr_gettext('_JOMRES_MAGIC_MENUS_TITLE', '_JOMRES_MAGIC_MENUS_TITLE');
			$output['_JOMRES_MAGIC_MENUS_RAW']			=jr_gettext('_JOMRES_MAGIC_MENUS_RAW', '_JOMRES_MAGIC_MENUS_RAW');
			$output['_JOMRES_MAGIC_MENUS_MENU_SECTION']	=jr_gettext('_JOMRES_MAGIC_MENUS_MENU_SECTION', '_JOMRES_MAGIC_MENUS_MENU_SECTION');
			$output['_JOMRES_MAGIC_MENUS_MENU_SECTION_INFO']=jr_gettext('_JOMRES_MAGIC_MENUS_MENU_SECTION_INFO', '_JOMRES_MAGIC_MENUS_MENU_SECTION_INFO');
			
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.JRDS."templates" );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'magic_menu.html');
			$tmpl->displayParsedTemplate();

			 }
		}

	function touch_template_language()
		{
		$output=array();
		$output[]		=jr_gettext('_JOMRES_MAGIC_MENUS_INFO', '_JOMRES_MAGIC_MENUS_INFO');
		$output[]		=jr_gettext('_JOMRES_MAGIC_MENUS_SAVE', '_JOMRES_MAGIC_MENUS_SAVE');
		$output[]		=jr_gettext('_JOMRES_MAGIC_MENUS_SEARCHTITLE', '_JOMRES_MAGIC_MENUS_SEARCHTITLE');
		$output[]		=jr_gettext('_JOMRES_MAGIC_MENUS_TITLE', '_JOMRES_MAGIC_MENUS_TITLE');
		$output[]		=jr_gettext('_JOMRES_MAGIC_MENUS_RAW', '_JOMRES_MAGIC_MENUS_RAW');
		$output[]		=jr_gettext('_JOMRES_MAGIC_MENUS_MENU_SECTION', '_JOMRES_MAGIC_MENUS_MENU_SECTION');
		$output[]		=jr_gettext('_JOMRES_MAGIC_MENUS_MENU_SECTION_INFO', '_JOMRES_MAGIC_MENUS_MENU_SECTION_INFO');
		$output[]		=jr_gettext('_JOMRES_MAGIC_MENUS_CUSTOMSEARCHES', '_JOMRES_MAGIC_MENUS_CUSTOMSEARCHES');
		

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
