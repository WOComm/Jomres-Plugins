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

class plugin_info_api_feature_coupon
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_coupon",
			"category"=>"REST API",
			"marketing"=>"Functionality that allows view and set of coupons through the API",
			"version"=>"1.6",
			"description"=> "Functionality that allows view and set of coupons through the API",
			"author"=>"",
			"authoremail"=>"",
			"lastupdate"=>"2019/10/28",
			"min_jomres_ver"=>"9.19.2",
			"manual_link"=>'',
			'change_log'=>'v1.2 Modified scope so that coupons are part of get/set property scope. v1.3 Syntax updated for consistency, see API documentation for more information. v1.4 Plugin updated to work with Jomres data encryption of user details. v1.5 French language file added v1.6 API plugins updated to work with updates to Jomres, and some tweaks for consistency. ',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true
			);
		}
	}
