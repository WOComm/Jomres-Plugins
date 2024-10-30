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

class plugin_info_useful_links
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"useful_links",
			"category"=>"Property Details Enhancements",
			"marketing"=>"This plugin is designed to show links to specific searches if the url includes \"country\", \"region\" or \"town\". ",
			"version"=>(float)"2.9",
			"description"=> 'This plugin is designed to show links to specific searches if the url includes "country", "region" or "town". It will also give a link to the wikipedia page for the town/region/country. You will need to configure the plugin in the administrator area first to indicate the property type ids for Hotels, Real Estate and Apartment/Cottage/Villas. Use Jomres asamodule to create a new module, and set the task to "useful_links".',
            "lastupdate"=>"2022/08/03",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/106-useful-links',
			'change_log'=>'v1.1 changed how the country name is found to provide meaningful links to wikipedia. v1.2 Removed references to Token functionality that is no longer used. v1.3 Hide menu option if Simple Site Config enabled. v1.4 Added BS3 templates. v1.5 tweaked plugin to improve region names. v1.6 Added language to url to get wiki pages in the appropriate language. v1.7 PHP7 related maintenance. v1.8 Jomres 9.7.4 related changes v1.9 Remaining globals cleanup and jr_gettext refactor related changes. v2.0 Fixed some notice level errors. v2.1 Modified how region names are determined v2.2 Changed how variables are detected. v2.3 Shortcode info added v2.4 French language file added v2.6 Italian language file added, thanks Nicola v2.7 Language files updated v2.8 Bootstrap 5 template set added. v2.9 Documentation updated. ',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_8b1o6.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
