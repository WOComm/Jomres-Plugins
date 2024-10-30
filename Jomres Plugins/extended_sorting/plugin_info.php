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

class plugin_info_extended_sorting
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"extended_sorting",
			"category"=>"Search",
			"marketing"=>"Extended Sorting plugin for Jomres. Created by Jomres Extras. Offers additional sorting options in property list.",
			"version"=>(float)"4.0",
			"description"=> 'Extended Sorting plugin for Jomres. Created by Jomres Extras. Offers additional sorting options in property list.',
            "lastupdate"=>"2022/07/29",
			"min_jomres_ver"=>"9.9.1",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/58-extended-sorting',
			'change_log'=>'v2.0 Tweaked functionality to support Wordpress, in relation to storing user settings. v2.1 Added changes to reflect addition of new Jomres root directory definition. v2.2 Fixed an issue where random sorting was not applied to properties. v2.3 Modified how queries are performed to take advantage of quicker IN as opposed to OR. v2.4 added Sort by date added. Fixed sort by price ascending query. v2.5 fixed issue with sorting by guest numbers. v2.6 Improved some queries. v2.7 PHP7 related maintenance. v2.9 Added changes relating to search by dates so that sorting by prices still works. v3.0 Discovered that senility might be contagious. v3.1 Jomres 9.7.4 related changes v3.2 Remaining globals cleanup and jr_gettext refactor related changes. v3.3 Fixed some notices. v3.4 Modified how array contents are checked. v3.5 Changed how variables are detected. v3.6 French language file added. v3.7 Italian language file added, thanks Nicola v3.8 Language files updated. v3.9 Serbian lang file updated. v4.0 Documentation updated.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_yi5vv.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
