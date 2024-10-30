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

class plugin_info_je_mapview
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"je_mapview",
			"category"=>"Search",
			"marketing"=>"Allows users to view search results on map.",
			"version"=>(float)"4.4",
			"description"=> "The Map View plugin adds a new button to the Jomres property list/search results pages and allows guests to switch the search results view to a map view. If a search was performed, only the properties returned by the search will be displayed on the map. This will allow guests to quickly find properties on their desired location by browsing the map. 
			The map can be configured from the administrator control panel -> Portal Functionality -> JE Map View.
			The Map View plugin now has support for property type specific markers, so you can have a different marker depending on property type. Property type specific markers can be uploaded to /jomres/core-plugins/je_mapview/markers/ptype dir and named like ptype_id.png. If a specific property type marker does not exist then a marker with a ? will be shown.",
            "lastupdate"=>"2023/05/24",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'',
			'change_log'=>'v3.1 updated marker cluserer javascript. v3.2 Modified functionality to use new get_property_details_url function. v3.4 Settings moved to site config. v3.5 Settings moved to site config gmaps tab. v3.6 Added de-sanitisation of hyphens v3.7 Updated plugin to use media centre markers. v3.8 French language file added v3.9  BS4 template set added v4.0 Italian language file added, thanks Nicola v4.1 Fix notices v4.2 Language files updated v4.3 Bootstrap 5 template set added. v4.4  Select list markup changes.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_x6m5y.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
