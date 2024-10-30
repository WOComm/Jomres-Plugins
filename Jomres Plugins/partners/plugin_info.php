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

class plugin_info_partners
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"partners",
			"category"=>"Bookings Configuration",
			"marketing"=>"Adds a new button to the administrator's control panel which allows them to create 'partners'. The partners can then be assigned discounts if they make bookings at certain properties.",
			"version"=>(float)"2.9",
			"description"=> " Adds a new button to the administrator's control panel which allows them to create 'partners'. The partners can then be assigned discounts if they make bookings at certain properties.",
            "lastupdate"=>"2022/02/04",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/30-control-panel/user-management/202-partners',
			'change_log'=>' v1.1 updated for use in v5.6. v1.2 removed a reference to mysql real escape string. 1.3 updated to work with Jr7.1 1.4 Jr7.1 specific changes v1.5 Various improvements and bug fixes. v1.6 Added changes to reflect addition of new Jomres root directory definition. v1.7  Modified plugin to ensure correct use of jomresURL function. v1.8 Improved toolbar rendering. v1.9 PHP7 related maintenance. v2.0 Remaining globals cleanup and jr_gettext refactor related changes. v2.1 Fixed some notice level errors. v2.2 Advanced Site Config flag removed. v2.3 Plugin refactored for admin area changes in jr 9.9 v2.4 Modified how array contents are checked. v2.5 Node/javascript path related changes. v2.6 GDPR related changes. v2.7 BS4 template set added v2.8 Bootstrap 5 template set added. v2.9 Updated query that saves discount so that dates are provided.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_0rh5g.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
