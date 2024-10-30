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

class plugin_info_api_feature_guesttypes
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_guesttypes",
			"category"=>"REST API",
			"marketing"=>"Functionality that allows view and modify of guest types through the API",
			"version"=>"1.5",
			"description"=> "Functionality that allows view and modify of guest types through the API",
			"author"=>"",
			"authoremail"=>"",
			"lastupdate"=>"2019/10/28",
			"min_jomres_ver"=>"9.19.2",
			"manual_link"=>'',
			'change_log'=>'v1.2 Plugin updated to harden some inputs. v1.3 Plugin updated to add ID of newly created guest types. v1.4 French language file added v1.5 API plugins updated to work with updates to Jomres, and some tweaks for consistency.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
?>