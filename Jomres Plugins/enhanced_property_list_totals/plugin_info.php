<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_enhanced_property_list_totals
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"enhanced_property_list_totals",
			"category"=>"Property List Views",
			"marketing"=>"Extends the property list pricing information to show exact pricing based on the items searched on.",
			"version"=>(float)"1.7",
			"description"=> " Extends the property list pricing information to show exact pricing based on the items searched on. If you have a fast server, and you are concerned that prices in the property list be as accurate as possible, then use this plugin to enhance the prices output in the property list pages. It adds extra calculations when generating prices for various search parameters, and extra queries required to gather this information, so CPU and memory usage is increased slightly. Totals also include forced Extras. It does not yet cater to last minute and/or wise price settings, user specific discounts and fixed period bookings are not included.",
			"lastupdate"=>"2020/12/14",
			"min_jomres_ver"=>"9.8.30",
			"manual_link"=>'',
			'change_log'=>'v0.6 Jomres 9.7.4 related changes v0.7 Jomres 9.7.4 related changes v0.8 Remaining globals cleanup and jr_gettext refactor related changes. v0.9 Added some user requests and notice changes. 1.0  Notice level changes. v1.1 Notice level changes. v1.2 Improved how date differences are calculated. v1.3 9.8.2 changes related to property uids. v1.4 Modified plugin to use population of an array instead of mrconfig setting to decide how to pull tariffs from db. v1.5 Cache some data to prevent out of memory problems. v1.6 Modified how array contents are checked. v1.7 check for empty array',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_1x68j.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
