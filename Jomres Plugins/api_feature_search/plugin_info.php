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

class plugin_info_api_feature_search
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_search",
			"category"=>"REST API",
			"marketing"=>"Functionality that allows API Clients to search for properties.",
			"version"=>"1.3",
			"description"=> "Functionality that allows API Clients to search the database. Requires installation of ajax search composite plugin to function.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2022/06/04",
			"min_jomres_ver"=>"9.19.2",
			"manual_link"=>'',
			'change_log'=>'v0.3 Modified how data is returned. v0.4 Removed endpoints that should be in Site Structure plugin. 0.5 Added support for auth_free functionality (available v9.9.6 of Jomres), meaning that anybody can access this part of the api, you do not need a client id/secret pair. v1.0 Added cat_id to returned properties response. v1.1 French language file added v1.2 API plugins updated to work with updates to Jomres, and some tweaks for consistency. v1.3 Added searching by dates.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true
			);
		}
	}
