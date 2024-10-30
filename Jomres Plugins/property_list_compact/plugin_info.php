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

class plugin_info_property_list_compact
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"property_list_compact",
			"category"=>"Property List Views",
			"version"=>"2.2",
			"marketing"=>"Similar to the standard property list, but puts the property image in the background, no link to popup.",
			"description"=> "Similar to the standard property list, but puts the property image in the background, no link to popup. Bootstrap 2 & 3 only, not Bootstrap 5.",
            "lastupdate"=>"2022/04/19",
            "min_jomres_ver"=>"9.25.2",
			'change_log'=>'v1.1 added some paging tweaks. v1.2 Updated templates for dealing with new 8.1.12 live scrolling. v1.3 Increased the number of properties returned to 6. v1.4 PHP7 related maintenance. v1.5 Jomres 9.7.4 related changes v1.6 Remaining globals cleanup and jr_gettext refactor related changes. v1.7 Node/javascript path related changes. v1.8 French language file added v1.9 BS4 template set added v2.0 Language files updated v2.1 Bootstrap 5 template set added. v2.2 Not relevant to BS5 based systems.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_jynmx.png',
			'demo_url'=>'',
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/330-property-list-compact',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
