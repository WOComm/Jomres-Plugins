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

class plugin_info_last_active
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"last_active",
			"category"=>"Property Manager tools",
			"marketing"=>"Displays (below the dashboard) the new bookings count since the property manager/receptionist last login, for all properties that this manager/receptionist has access to.",
			"version"=>(float)"2.3",
			"description"=> "Displays (below the dashboard) the new bookings count since the property manager/receptionist last login, for all properties that this manager/receptionist has access to.",
            "lastupdate"=>"2022/08/01",
            "min_jomres_ver"=>"9.25.2",
			'change_log'=>'v1 Initial release. v1.1 fixed how a calculation is done to improve when the message times out. v1.2 PHP7 related maintenance. v1.3 Jomres 9.7.4 related changes v1.4 Remaining globals cleanup and jr_gettext refactor related changes. v1.5 Changed how we get the property name. v1.6 Added widget code. v1.7 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v1.8 French language file added v1.9 BS4 template set added v2.0 Italian language file added, thanks Nicola v2.1 Language files updated v2.2 Bootstrap 5 template set added. v2.3 Documentation updated.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_93ceo.png',
			'demo_url'=>'',
			'manual_link'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
