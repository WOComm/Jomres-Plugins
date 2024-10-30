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

class plugin_info_nbe_booking_form
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"nbe_booking_form",
			"category"=>"Bookings",
			"marketing"=>"The new booking engine booking form",
			"version"=>(float)"0.10",
			"description"=> "Switches compatible properties over to use the new Jomres Booking Engine form. See the plugin infos page for more information about this plugin.",
			"lastupdate"=>"2022/10/17",
			"min_jomres_ver"=>"10.4.0",
			"manual_link"=>'',
			'change_log'=>'v0.3 Improved the form UI v0.4 More form improvements, adding api url to iframe query. v0.5 css tweaks and improvements. v0.6 Added handling of MRPs v0.7 Added switch to site config. By default this plugin now does not override the default (old) booking forms. V0.8 domain tweaks and a few layout issues resolved. v0.9 Documentation updated v0.10 Ensure that displayed date is shown in UTC, but locally formatted, rather than just locally formatted (which can set the wrong date in the prices panel)',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
