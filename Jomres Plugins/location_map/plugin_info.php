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

class plugin_info_location_map
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"location_map",
			"category"=>"Search",
			"marketing"=>"A plugin which shows a list of countries which have been populated by published properties.",
			"version"=>(float)"2.9",
			"description"=> " A plugin which shows a list of countries which have been populated by published properties. Call the plugin thru jomres_asamodule, setting the 'task' to 'location_map' and place the module whereever you want to show the output.",
            "lastupdate"=>"2022/08/03",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/76-location-map',
			'change_log'=>'Updated to add a menu option to Jomres 6 mainmenu. Removed an old file thru obsolete file checking. Added a lang file. 1.2 Updated to work on Jr7 1.3  Templates bootstrapped. v1.4 Added BS3 templates. v1.5 Added changes to reflect addition of new Jomres root directory definition. v1.5 PHP7 related maintenance. v1.7 Jomres 9.7.4 related changes v1.8 Jomres 9.7.4 related changes v1.9 Remaining globals cleanup and jr_gettext refactor related changes. v2.0 Plugin updated to use region ids only. v2.1 Menu options updated for menu refactor in v9.8.30 v2.2 Changed how a path is defined. v2.3 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.4 French language file added v2.5 BS4 template set added v2.6 Language files updated v2.7 Bootstrap 5 template set added. v2.8 Updated to offer shortcodes v2.9 Documentation updated',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_t53xd.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
