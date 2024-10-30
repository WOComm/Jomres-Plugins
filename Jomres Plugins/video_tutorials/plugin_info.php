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

class plugin_info_video_tutorials
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"video_tutorials",
			"category"=>"Help",
			"marketing"=>"Additional help videos for property managers",
			"version"=>(float)"1.3",
			"description"=> "This plugin provides additional help videos for property managers to access via the frontend.",
            "lastupdate"=>"2021/10/25",
			"min_jomres_ver"=>"9.9.11",
			"manual_link"=>'',
			'change_log'=>'v1.1 Removed a reference to a setting that no longer exists in Jomres. v1.2 French language file added v1.3 Language files updated',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_fk0s6.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
