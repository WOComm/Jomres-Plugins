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

class plugin_info_api_feature_plugins_hub
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"plugins_hub",
			"category"=>"REST API",
			"marketing"=>"",
			"version"=>"1.0",
			"description"=> "Allows site managers to upload their own plugins.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2023/06/19",
			"min_jomres_ver"=>"10.7.1",
			"manual_link"=>'',
			'change_log'=>'',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>false
			);
		}
	}
