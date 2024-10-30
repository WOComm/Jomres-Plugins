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

class plugin_info_coupons
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"coupons",
			"category"=>"Bookings Configuration",
			"marketing"=>"Adds a new button to the manager's toolbar which is used to add/edit/delete discount codes which can be used by guests when making a booking. Coupons are specific to individual properties and can be configured to be used within certain dates, and only be valid for certain dates. Additionally they can be specific to only a certain guest. When a coupon is displayed it can be viewed in a printable screen, including a QR code. This code can be scanned into a phone and the user will be taken direct to the booking form, with that discount code already applied.",
			"version"=>(float)"5.6",
			"description"=> " Adds a new button to the manager's toolbar which is used to add/edit/delete discount vouchers which can be used by guests when making a booking.",
            "lastupdate"=>"2023/06/02",
            "min_jomres_ver"=>"10.7",
			"manual_link"=>'http://www.jomres.net/manual/property-managers-guide/48-your-toolbar/settings/256-discount-coupons',
			'change_log'=>'v2.5 Added BS3 related template changes. v2.6 Added functionality related to new subscription features in Jomres 9 v2.7 PHP7 related maintenance. v2.8 Changed some forms to use JOMRES_SITEPAGE_URL_NOSEF instead of JOMRES_SITEPAGE_URL. v2.9 Jomres 9.7.4 related changes v3.0 Remaining globals cleanup and jr_gettext refactor related changes. v3.1 jr_gettext tweaks. v3.2 User role related updates. v3.3 Notices fixes. v3.4 Modified functionality to use new get_booking_url function. v3.5 Improved how urls are generated. v3.6 Added changes supporting 9.8.30 minicomponent registry changes v3.7 Coupon classes added. v3.8 Menu options updated for menu refactor in v9.8.30 v3.9 Subscription related functionality updated v4.0 Modified how array contents are checked. v4.1 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v4.2 Added update for administrator coupons. v4.3 Plugin updated to work with Jomres data encryption of user details. v4.4 CSRF hardening added. v4.5 Print coupon page improved to prevent overflow of text. v4.6 French language file added. 4.7 BS4 template set added v4.8 Italian language file added, thanks Nicola v4.9 Language files updated. v5.0 Fixed issue affecting WordPress forms v5.1 Bootstrap 5 template set added. v5.2 Serbian lang file updated. v5.3 Documentation updated. v5.4 Documentation updated. v5.5  Select list markup changes. v5.6 Updated subscriptions related functionality.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_ibgva.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
