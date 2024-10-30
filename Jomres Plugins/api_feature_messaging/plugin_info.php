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

class plugin_info_api_feature_messaging
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_messaging",
			"category"=>"REST API",
			"marketing"=>"Functionality that allows API Clients to message properties.",
			"version"=>"0.1",
			"description"=> "Functionality that allows REST API Clients to message properties.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2022/08/31",
			"min_jomres_ver"=>"10.5.4",
			"manual_link"=>'',
			'change_log'=>'',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true
			);
		}
	}
