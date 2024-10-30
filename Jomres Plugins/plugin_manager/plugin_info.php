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

class plugin_info_plugin_manager
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"plugin_manager",
			"category"=>"System",
			"marketing"=>"Displays and installs plugins that can be downloaded from Jomres.net, also allows you to install third party plugins.",
			"version"=>(float)"6.7",
			"description"=> "Displays and installs plugins that can be downloaded from Jomres.net, also allows you to install third party plugins. Manages use of local minicomponents.",
            "lastupdate"=>"2023/11/23",
			"min_jomres_ver"=>"10.7.0",
			"manual_link"=>'',
			'change_log'=>'',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_4tti8.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"https://www.jomres.net",
			'free'=>true,
			'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			);
		}
	}
