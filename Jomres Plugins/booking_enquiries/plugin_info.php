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

class plugin_info_booking_enquiries
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"booking_enquiries",
			"category"=>"Property Manager tools",
			"marketing"=>"Adds functionality that allows property managers to approve bookings. When this functionality is enabled bookings don't immediately  block rooms. Instead the manager is given the opportunity to review the booking before approving it. Once the booking is approved the guest returns to the website by clicking a link and can proceed with paying for the booking.",
			"version"=>(float)"2.7",
			"description"=> " Adds functionality that allows property managers to approve bookings.",
            "lastupdate"=>"2022/07/26",
			"min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/36-booking-enquiries',
			'change_log'=>'v1.1 fixed a bug in one of the bootstrap 3 templates which caused patTemplate to complain about recursion. v1.2 Updated the jquery ui email approval template. v1.3 Added code specific to new commission functionality. v1.4 PHP7 related maintenance. v1.5 Changed some forms to use JOMRES_SITEPAGE_URL_NOSEF instead of JOMRES_SITEPAGE_URL. v1.6 Jomres 9.7.4 related changes v1.7 Remaining globals cleanup and jr_gettext refactor related changes. v1.8 Modified how array contents are checked. v1.9 CSRF hardening added. v2.0 French language file added. v2.1 Added update to rejected flag in contracts table.v2.2 BS4 template set added v2.3 Italian language file added, thanks Nicola v2.4 Language files updated v2.5 Bootstrap 5 template set added. v2.6 Serbian lang file updated. v2.7 Documentation added',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/All_Listings_-_Mozilla_Firefox_nsyoa.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
