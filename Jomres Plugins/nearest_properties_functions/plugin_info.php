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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_nearest_properties_functions
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"nearest_properties_functions",
			"category"=>"Utilities",
			"marketing"=>"A utility plugin to provide a nearest properties function.",
			"version"=>(float)"0.9",
			"description"=> " A utility plugin to provide a nearest properties function.",
			"lastupdate"=>"2015/11/09",
			"min_jomres_ver"=>"9.2.1",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/85-nearest-properties-functions',
			'change_log'=>'v0.9 PHP7 related maintenance.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/jr_house.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
	
// Example usage :
/*
		$result = jomres_find_nearest_properties_by_lat_long($current_property_details->lat,$current_property_details->long,1000, 100,"km");
		var_dump($result);exit;
*/
