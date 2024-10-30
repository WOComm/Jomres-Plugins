<?php
/**
* Jomres CMS Specific Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_nag_off
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"nag_off",
			"category"=>"System",
			"version"=>(float)"1.0",
			"marketing"=>"Prevents the nag in the plugin manager from showing",
			"description"=> "Prevents the nag in the plugin manager from showing",
			"lastupdate"=>"2022/07/04",
			"min_jomres_ver"=>"10.5.0",
			"manual_link"=>'',
			'change_log'=>'',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",			
			);
		}
	}
