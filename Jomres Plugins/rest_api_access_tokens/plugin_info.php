<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_rest_api_access_tokens
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"rest_api_access_tokens",
			"category"=>"REST API",
			"marketing"=>"List current access tokens",
			"version"=>(float)"1.0",
			"description"=> "List current access tokens in the Administrator area",
            "lastupdate"=>"2023/03/10",
            "min_jomres_ver"=>"10.6.0",
			"manual_link"=>'',
			'change_log'=>'',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
