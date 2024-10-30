<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2022 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_jomres_messaging_system_parsers
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"jomres_messaging_system_parsers",
			"category"=>"Customer relationship management",
			"marketing"=>"Parsers for the Messaging API",
			"version"=>(float)"0.1",
			"description"=> "This plugin contains scripts that can parse messages handled by the Messaging API. They can search for special shortcodes in messages and process those shortcodes, either before they're stored in the database, or when the messages are handed back to the UI for display.",
			"lastupdate"=>"2022/08/31",
			"min_jomres_ver"=>"10.5.4",
			"manual_link"=>'',
			'change_log'=>'',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true,
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
