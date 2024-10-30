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

class plugin_info_booking_distancing
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"booking_distancing",
			"category"=>"Bookings Configuration",
			"marketing"=>"Blocks a property or room after a booking is made, for N days, to allow for a deep clean",
			"version"=>(float)"1.4",
			"description"=> "Adds an option to Property Configuration which gives managers the option to block the day(s) before and after a booking. This gives them the opportunity to perform deep cleans, for example, for the safety of their guests.",
            "lastupdate"=>"2022/05/08",
			"min_jomres_ver"=>"9.21.4",
			"manual_link"=>'',
			'change_log'=>' v1.2 Italian language file added, thanks Nicola v1.3 Language files updated. v1.4 Documentation updated.',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
