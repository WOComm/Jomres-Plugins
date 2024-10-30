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

class plugin_info_location_station
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"location_station",
			"category"=>"Search",
			"marketing"=>" Allows you to provide information about each town. If information about a town has been created by admin, then the information is shown above the property details page.",
			"version"=>(float)"4.6",
			"description"=> "Internal plugin. Allows you to provide information about each town. If information about a town has been created by admin, then the information is shown above the property details page. To configure town information, you need to view the Location Station page in the administrator area, under 'Portal Functionality'.",
            "lastupdate"=>"2022/08/01",
            "min_jomres_ver"=>"9.25.2",
			'change_log'=>'v1.1 layout tweaks. 1.2 added a check for ajax calls. 1.3 If no information is entered for a previously modified location, now no output is shown. 1.4 Updated to work in Jr7  Templates bootstrapped. 1.6 Jr7.1 specific changes 1.7 updated code so that region names are found correctly. v1.8 fixed code to use region ids. v1.9 Hide menu option if Simple Site Config enabled. v2.0 Added BS3 templates. v2.1 Added changes to reflect addition of new Jomres root directory definition. v2.2 Improved toolbar rendering. v2.3 PHP7 related maintenance. v2.4 Jomres 9.7.4 related changes v2.5 Jomres 9.7.4 related changes v2.6 Remaining globals cleanup and jr_gettext refactor related changes. v2.7 Fixed some notice level errors. v2.8 Changed how locations are stored to resolve issues with Hat symbol. v2.9 Fixed a notice. v3.0 Modfied query so that it wont get locations from properties where country/region/town is blank. v3.1  Preview option in jomres.php refactored out and this plugin updated to reflect that. v3.2 Advanced Site Config flag removed. v3.3 Plugin refactored for admin area changes in jr 9.9 v3.4 Modified how array contents are checked. v3.5 Modified how region names are determined. v3.6 Improved a query. v3.7 Node/javascript path related changes. v3.8 Improved so that blank can be saved where required. v3.9 CSRF hardening added. v4.0 French language file added v4.1 BS4 template set added v4.2 Italian language file added, thanks Nicola v4.3 Language files updated v4.4 Bootstrap 5 template set added. v4.5 Documentation updated v4.6 Removed some test code that was left in-situ in error. ',
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/24-control-panel/portal-functionality/297-location-station-2',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_r0mgw.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
