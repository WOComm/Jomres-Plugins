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

class plugin_info_api_feature_site_structure
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_site_structure",
			"category"=>"REST API",
			"marketing"=>"Functionality that allows API Clients to retrieve information about the site structure.",
			"version"=>"1.2",
			"description"=> "Functionality that allows API Clients to retrieve information about the site structure. As this information is not property specific there is no requirements for scope validation, therefore so long as the client themselves (the Oauth key pair ) has been validated then they can pull the information out of the system.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2019/10/28",
			"min_jomres_ver"=>"9.19.2",
			"manual_link"=>'',
			'change_log'=>'v0.2 Modified how region names are determined v0.3 Modified how country names are determined. 1.0 Added property categories route to api. v1.1 API plugins updated to work with updates to Jomres, and some tweaks for consistency. Plugin made Auth Free as no sensitive information is returned.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true
			);
		}
	}
