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

class plugin_info_example_custom_common_strings
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"example_custom_common_strings",
			"category"=>"Administrator tools",
			"version"=>(float)"1.3",
			"marketing"=>"Shows a developer how to add strings via one script that can be used in all templates without additional coding.",
			"description"=> "This plugin is designed to demonstrate how strings can be added to the Common Strings array in Jomres, which can then be used in any template without any additional coding. Open j00005example_custom_common_strings.class.php in /jomres/core-plugins/example_custom_common_strings and read the comments in that file to understand how to use this plugin.",
			"lastupdate"=>"2022/07/29",
			"min_jomres_ver"=>"9.2.1",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/315-example-custom-common-strings',
			'change_log'=>'v1.2 PHP7 related maintenance. v1.3 Documentation updated.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
