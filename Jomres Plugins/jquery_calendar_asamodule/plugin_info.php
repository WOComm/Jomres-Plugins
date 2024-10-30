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

class plugin_info_jquery_calendar_asamodule {
	function __construct()
		{
		$this->data=array(
			"name"=>"jquery_calendar_asamodule",
			"category"=>"Site Building Tools",
			"marketing"=>"Allows you to create a module to display a date picker in a module position.",
			"version"=>(float)"1.3",
			"description"=> " Allows you to create a module to display a date picker in a module position. Set the asamodule task to 'jquery_calendar_asamodule' and the arguments to '&property_uid=N' where N is the property uid of the property who's booking form you want to direct the user to.",
			"lastupdate"=>"2017/03/15",
			"min_jomres_ver"=>"9.8.28",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/73-jquery-calendar-asamodule',
			'change_log'=>'v1.1 PHP7 related maintenance. v1.2 Modified functionality to use new get_booking_url function. ',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_sb47h.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
