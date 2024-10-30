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

class plugin_info_hyphen_check
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"hyphen_check",
			"category"=>"Administrator tools",
			"marketing"=>"Tool for checking tables and replacing hyphen html entities with the real thing in the propertys table.",
			"version"=>(float)"1.3",
			"description"=> "Tool for checking tables and replacing hyphen html entities with the real thing in the propertys table.",
            "lastupdate"=>"2022/07/29",
			"min_jomres_ver"=>"9.12.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 French language file added v1.2 Language files updated v1.3 Documentation updated',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
