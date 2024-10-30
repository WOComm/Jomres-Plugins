<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_location_map_sitemap
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"location_map_sitemap",
			"category"=>"Search",
			"marketing"=>" This will show a list of regions and towns and links to the published properties in those areas.",
			"version"=>(float)"2.7",
			"description"=> " Plugin for the location_map plugin, to run this, create a jomres_asamodule module, set the 'task' to 'location_map' and the arguments to '&mm_plugin=location_map_sitemap'. This will show a list of regions and towns and links to the published properties in those areas.",
            "lastupdate"=>"2022/01/04",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/78-location-map-sitemap',
			'change_log'=>'v1.1 renamed list regions to sitemap and changed a constant. v1.2 improved layout. v1.3 Added BS3 templates. v1.4 PHP7 related maintenance. v1.5 Jomres 9.7.4 related changes v1.6 Remaining globals cleanup and jr_gettext refactor related changes. v1.7 Added a missing initialisation array. v1.8 Plugin updated to use region ids only. v1.9 Modified functionality to use new get_property_details_url function. v2.0 Menu options updated for menu refactor in v9.8.30 v2.1 Modified how array contents are checked. v2.2 Modified how region names are determined v2.3 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.4 French language file added v2.5 BS4 template set added v2.6 Language files updated. v2.7 Bootstrap 5 template set added.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_t9y7v.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
