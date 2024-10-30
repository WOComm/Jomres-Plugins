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

class plugin_info_show_room_calendar
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"show_room_calendar",
			"category"=>"Site Building Tools",
			"marketing"=>"A simple plugin for use by ASAModule that allows you to show a room calendar in a module position.",
			"version"=>(float)"1.9",
			"description"=> "Set your ASAModule task to show_room_calendar, then in the arguments set the an id like so : '&id=1'. This will allow you to show a specific rooms's calendar in the module position of your choice.",
            "lastupdate"=>"2022/08/03",
			"min_jomres_ver"=>"9.9.4",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/311-show-room-calendar',
			'change_log'=>'v1.1 PHP7 related maintenance. v1.2 Remaining globals cleanup and jr_gettext refactor related changes. v1.3 Modified how array contents are checked. v1.4 Changed how variables are detected. v1.5 removed usage of an obsoleted function call v1.6 French language file added v1.7 Italian language file added, thanks Nicola v1.8 Language files updated v1.9 Documentation updated.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_4o1av.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
