<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9
* @package Jomres
* @copyright 2017
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_api_feature_cleaningschedule
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_cleaningschedule",
			"category"=>"REST API",
			"marketing"=>"A quick and dirty (sic) cleaning schedule that can be viewed through the API",
			"version"=>"1.0",
			"description"=> "A quick and dirty (sic) cleaning schedule that can be viewed through the API",
			"author"=>"",
			"authoremail"=>"",
			"lastupdate"=>"2019/10/28",
			"min_jomres_ver"=>"9.19.2",
			"manual_link"=>'',
			'change_log'=>'v0.3 Notes updated v0.3 French language file added v1.0  API plugins updated to work with updates to Jomres, and some tweaks for consistency.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true
			);
		}
	}
