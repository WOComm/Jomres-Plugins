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

class plugin_info_super_dashboard
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"super_dashboard",
			"category"=>"Property Manager tools",
			"marketing"=>" Shows booking information for ALL properties that a manager has rights to.",
			"version"=>(float)"3.7",
			"description"=> " Shows booking information for ALL properties that a manager has rights to. Adds a new link to the Dashboard category in the main menu called Legacy Dashboard",
            "lastupdate"=>"2023/05/24",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/property-managers-guide/39-your-toolbar/dashboard/295-legacy-dashboard',
			'change_log'=>'v1.4 Updated to work in Jomres 8. v1.5 Added changes to reflect addition of new Jomres root directory definition. v1.6 fixed a bug where you could not switch months. v1.7 PHP7 related maintenance. v1.8 Changed some forms to use JOMRES_SITEPAGE_URL_NOSEF instead of JOMRES_SITEPAGE_URL. v1.9 Jomres 9.7.4 related changes v2.0 Remaining globals cleanup and jr_gettext refactor related changes. 2.1 Modified functionality to use new get_booking_url function. v2.2 tweaked how urls are generated. v2.3 Edit booking tasks renamed and renumbered. v2.3 Fixed a notice. v2.4 Frontend menu refactored. v2.5 Modified how array contents are checked. v2.6 Changed how variables are detected. v2.7 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.8 Node/javascript path related changes. v2.9 Plugin updated to work with Jomres data encryption of user details. v3.0 Improved plugin so that properties are output in alphabetical order. v3.1 French language file added v3.2 BS4 template set added v3.3 Italian language file added, thanks Nicola v3.4 Language files updated v3.5 Bootstrap 5 template set added. v3.6 Documentation updated. v3.7 Select list markup changes.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_rrdkx.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
