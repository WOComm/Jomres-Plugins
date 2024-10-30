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

class plugin_info_manager_cleaner
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"manager_cleaner",
			"category"=>"Administrator tools",
			"marketing"=>"Utility for deleting old managers from the Jomres Manager to Property Cross reference table.",
			"version"=>(float)"1.5",
			"description"=> "Utility for deleting old managers from the Jomres Manager to Property Cross reference table. Most users will not need to install this plugin, however if you are using the Beds24 plugin and have deleted a manager using the CMSs User Interface, who at one time managed a property, then you may no longer be able to access that property. Cleaning the cross reference table should resolve this problem.",
			"lastupdate"=>"2022/08/01",
			"min_jomres_ver"=>"9.11.1",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/309-manager-cleaner',
			'change_log'=>'v1.1 Added support for cleaning up the manager\'s table too. v1.2 PHP7 related maintenance. v1.3 Added uninstaller to remove cleanup cron tasks. v1.4 Use of "secret" in cron tasks removed. It is not necessary and is unreliable. v1.5 Documentation updated',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/jr_house.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
