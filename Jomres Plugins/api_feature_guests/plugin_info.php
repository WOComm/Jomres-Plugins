<?php
/**
* Jomres CMS Agnostic Plugin
* @author  
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_api_feature_guests
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_guests",
			"category"=>"REST API",
			"marketing"=>"Functionality that allows listing and modification of guests through the API",
			"version"=>"1.2",
			"description"=> "Functionality that allows listing and modification of guests through the API",
			"author"=>"",
			"authoremail"=>"",
			"lastupdate"=>"2019/10/28",
			"min_jomres_ver"=>"9.19.2",
			"manual_link"=>'',
			'change_log'=>'1.0  Plugin updated to work with Jomres data encryption of user details. v1.1 French language file added v1.2 API plugins updated to work with updates to Jomres, and some tweaks for consistency.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true
			);
		}
	}
