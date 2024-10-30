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

class plugin_info_lastminute_config_tab
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"lastminute_config_tab",
			"category"=>"Bookings Configuration",
			"marketing"=>"Adds a configuration tab to property config that allows SRPs (Apartments/villas/cottages) to configure lastminute discounts.",
			"version"=>(float)"1.4",
			"description"=> " Adds a configuration tab to property config that allows SRPs to configure lastminute discounts for villas/apartments etc.",
			"lastupdate"=>"2017/06/20",
			"min_jomres_ver"=>"9.7.4",
			"manual_link"=>'http://www.jomres.net/manual/property-managers-guide/49-your-toolbar/settings/property-configuration/253-wiseprice-or-lastminute',
			'change_log'=>'v1.1 updated to work with Jr7.1 v1.2 PHP7 related maintenance. v1.3 Remaining globals cleanup and jr_gettext refactor related changes. v1.4 Modified discount dropdown so that zero can be selected.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_vi4lo.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
