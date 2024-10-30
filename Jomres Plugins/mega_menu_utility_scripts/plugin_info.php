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

class plugin_info_mega_menu_utility_scripts
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"mega_menu_utility_scripts",
			"category"=>"Utilities",
			"marketing"=>"A couple of functions required by the mega menu plugin. You wouldn't normally install this plugin, if it's needed Jomres will install it for you.",
			"version"=>(float)"1.6",
			"description"=> " A couple of functions required by the mega menu plugin.",
			"lastupdate"=>"2017/05/12",
			"min_jomres_ver"=>"9.8.30",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/318-mega-menu-utility-scripts',
			'change_log'=>'v1.1 rewrote code for clarity. v1.2 PHP7 related maintenance. v1.3 Removed references to customtext class due to 9.8.2 language changes. v1.4 Plugin updated to use region ids only. v1.5  Modified how array contents are checked. v1.6 Modified how region names are determined',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/jr_house.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",

			);
		}
	}
