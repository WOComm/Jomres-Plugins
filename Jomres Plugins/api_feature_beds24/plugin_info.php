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

class plugin_info_api_feature_beds24
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_beds24",
			"category"=>"REST API",
			"marketing"=>"Functionality that offers features that would specifically be required by Beds24 channel manager. ",
			"version"=>"0.3",
			"description"=> "Functionality that offers features that would specifically be required by Beds24 channel manager. To date, this plugin will respond with the Jomres property uid when passed a Beds24 propId",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2019/07/01",
			"min_jomres_ver"=>"9.8.25",
			"manual_link"=>'',
			'change_log'=>'v0.3 French language file added',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>''
			);
		}
	}
