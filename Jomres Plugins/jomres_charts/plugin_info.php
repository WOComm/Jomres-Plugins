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

class plugin_info_jomres_charts
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"jomres_charts",
			"category"=>"Property Manager tools",
			"marketing"=>"Adds more charts for admins and property managers.",
			"version"=>(float)"2.4",
			"description"=> "Adds more charts for admins and property managers.",
            "lastupdate"=>"2021/10/25",
			"min_jomres_ver"=>"9.23.1",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/327-jomres-charts',
			'change_log'=>'v1.1 added Property Visits chart to frontend to allow managers to see how many visits their property is getting. v1.2 Jomres 9.7.4 related changes v1.3 Remaining globals cleanup and jr_gettext refactor related changes. v1.4 Notice level changes. v1.5 Notice level changes v1.6 Disabled a chart that is not currently available. v1.6 Modified how array contents are checked. v1.7 Tweaked opacity. v1.8 Added widget. v1.9 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.0 Improved guest countries chart to adapt to new encoded guest details storage. v2.1 French language file added v2.2 BS4 template set added v2.2 Italian language file added, thanks Nicola v2.4 Language files updated ',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_ru6tj.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
