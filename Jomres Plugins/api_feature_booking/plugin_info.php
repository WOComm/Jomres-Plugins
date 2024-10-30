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

class plugin_info_api_feature_booking
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_booking",
			"category"=>"REST API",
			"marketing"=>"Functionality that allows API Clients to make bookings.",
			"version"=>"0.7",
			"description"=> "Functionality that allows API Clients to make bookings.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2023/05/23",
			"min_jomres_ver"=>"10.4.0",
			"manual_link"=>'',
			'change_log'=>'v0.4 Added checks for crawlers plus some other small changes v0.5 Added handling of MRPs v0.5 Added checks for room availability v.7 PHP 8.1 changes',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true
			);
		}
	}
