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

class plugin_info_api_feature_webhooks
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_webhooks",
			"category"=>"REST API",
			"marketing"=>"Offers functionality specifically designed to offer data to remote servers that have received a webhook notification.",
			"version"=>"0.6",
			"description"=> "Offers functionality specifically designed to offer data to remote servers that have received a webhook notification. Developed seperately from other API features so that sites can offer only webhook responses if required.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2019/07/02",
			"min_jomres_ver"=>"9.10.0",
			"manual_link"=>'',
			'change_log'=>'v0.2 Added more webhook response features v0.3 Removed a file that was left in place in error. v0.4 Guest schema related changes. v0.5 Adjustment to remove Jomres version from its old setting. v0.6 French language file added',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true
			);
		}
	}
