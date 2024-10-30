<?php
/**
* Jomres CMS Agnostic Plugin
* @author  
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class plugin_info_api_feature_charts
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_charts",
			"category"=>"REST API",
			"marketing"=>"Functionality that allows view charts through the API",
			"version"=>"1.0",
			"description"=> "Functionality that allows view charts through the API",
			"author"=>"",
			"authoremail"=>"",
			"lastupdate"=>"2019/10/28",
			"min_jomres_ver"=>"9.19.2",
			"manual_link"=>'',
			'change_log'=>'v0.2 Small code tidy up, updated notes and removed a chart that is no longer valid as the table has been removed from Core. v1.0 API plugins updated to work with updates to Jomres, and some tweaks for consistency.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true
			);
		}
	}
