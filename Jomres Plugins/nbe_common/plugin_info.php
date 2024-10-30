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

class plugin_info_nbe_common
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"nbe_common",
			"category"=>"Bookings Engines",
			"marketing"=>"Common functionality for use by the New Booking Engine of Jomres.",
			"version"=>(float)"0.7",
			"description"=> "Common functionality for use by the New Booking Engine of Jomres",
            "lastupdate"=>"2022/10/17",
            "min_jomres_ver"=>"10.4.0",
			"manual_link"=>'',
			'change_log'=>'v0.3 Min Jomres version changed v0.4 Added check for crawlers and exit gracefully if the caller is one. v0.5 Added handling of MRPs v0.6 Documentation updated v0.7 Resolved a PHP8.1 depreciation notice',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
