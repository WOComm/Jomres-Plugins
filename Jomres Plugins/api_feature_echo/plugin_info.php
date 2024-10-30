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

class plugin_info_api_feature_echo
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_echo",
			"category"=>"REST API",
			"marketing"=>"Call the API installation and receive a response of 'ECHO'. Developer tool for confirming connection to said API.",
			"version"=>"0.2",
			"description"=> "Call the API installation and receive a response of 'ECHO'. Developer tool for confirming connection to said API.",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2019/07/02",
			"min_jomres_ver"=>"9.8.21",
			"manual_link"=>'',
			'change_log'=>' v0.2 French language file added',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true
			);
		}
	}
