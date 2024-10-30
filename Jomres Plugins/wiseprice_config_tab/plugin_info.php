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

class plugin_info_wiseprice_config_tab
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"wiseprice_config_tab",
			"category"=>"Bookings Configuration",
			"marketing"=>"Adds a configuration tab to property config that allows Hotels and B&Bs to configure wise price settings, which enables variable discounts based on room availability on a given date.",
			"version"=>(float)"1.6",
			"description"=> " Adds a configuration tab to property config that allows MRPs to configure wise price settings, which enables variable discounts based on room availability on a given date. ",
			"lastupdate"=>"2016/04/25",
			"min_jomres_ver"=>"9.7.4",
			"manual_link"=>'http://www.jomres.net/manual/property-managers-guide/49-your-toolbar/settings/property-configuration/253-wiseprice-or-lastminute',
			'change_log'=>'v1.1 modified the discount dropdowns to allow users to select 0 as the discount. 1.2 Modified tab\'s output so that it uses the appropriate text when a property is set to use the new \'wholeday\' booking feature which will be available in 5.5.2. v1.3 updated to work with Jr7.1 v1.4 Minor tweak to ensure that editing mode does not interfere with buttons.v1.5 PHP7 related maintenance. v1.6 Remaining globals cleanup and jr_gettext refactor related changes.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_c6q9i.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
