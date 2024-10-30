<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2023 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_search_map
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"search_map",
			"category"=>"Search",
			"marketing"=>"Air BNB style map view of properties.",
			"version"=>"0.2",
			"description"=> "Air BNB style map view of properties." ,
            "lastupdate"=>"2023/05/23",
            "min_jomres_ver"=>"10.7.0",
			"manual_link"=>'',
			'change_log'=>'v0.1 Improved behaviour on small screens v0.2 IDE messed up the javascript',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_z42sy.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
    
    
    
