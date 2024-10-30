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

class j06000location_map
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false;
				$this->shortcode_data = array (
					"task" => "location_map",
					"info" => "JOMRES_SHORTCODES_06000LOCATION_MAP",
					"arguments" => array (
						array (
							"argument" => "mm_plugin",
							"arg_info" => "JOMRES_SHORTCODES_06000LOCATION_MAP_REGIONS",
							"arg_example" => "location_map_regions",
						),
					)
				);

			return;
			}
		$ePointFilepath = get_showtime('ePointFilepath'); // Need to set this here, because the calls further down will reset the path to the called minicomponent's path.
		//jomres_cmsspecific_addheaddata("css",'jomres/core-plugins/location_map/css/','location_map.css');
		require_once(JOMRES_COREPLUGINS_ABSPATH.'mega_menu_utility_scripts'.JRDS.'functions.php');
		$mega_menu_plugin = jomresGetParam( $_REQUEST, 'mm_plugin', "" );

		// We're expecting back an array with three indexs : ['javascript'], ['title'] and ['content'], the javascript will be added (it's unlikely that we'll need it, but I've said that before and ended up having to rework to add it) and the content of the menu and it's sub menu
		if ($MiniComponents->eventSpecificlyExistsCheck('06201',$mega_menu_plugin) && $mega_menu_plugin != "" )
			{
			$MiniComponents->specificEvent('06201',$mega_menu_plugin);
			$minicomp_data = $MiniComponents->getAllEventPointsData('06201');
			}
		else
			{
			$MiniComponents->triggerEvent('06200');
			$minicomp_data = $MiniComponents->getAllEventPointsData('06200');
			}
		
		foreach ($minicomp_data as $data)
			{
			$r = array();
			$r['CONTENT'] = $data['content'];
			$r['TITLE'] = $data['title'];
			if (isset($data['javascript']))
				$r['JAVASCRIPT'] = $data['javascript'];
			
			$rows[]=$r;
			}

		$output['HOME_URL'] = get_showtime('live_site');
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'location_map.html');
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->displayParsedTemplate();
		}
	
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
