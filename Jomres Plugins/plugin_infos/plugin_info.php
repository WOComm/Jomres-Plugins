<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2022 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_plugin_infos
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"plugin_infos",
			"category"=>"System",
			"marketing"=>"Displays information about installed plugins.",
			"version"=>(float)"1.6",
			"description"=> "This plugin searches plugin directories for README.md files and then displays the contents. This provides provides more scope for providing you with information than is available in the Jomres Plugin Manager. Plugin information is only available in English",
            "lastupdate"=>"2022/08/01",
			"min_jomres_ver"=>"10.3.0",
			"manual_link"=>'',
			'change_log'=>"v1.1 Added support for screenshot images and allowing html in READMEs for demonstration purposes, and cancelling out Jomres shortcodes so that they don't try to render. v1.2 Made plugin play nice in Joomla 4. Added headers with information as to the plugin's location, scripts, version ect. v1.3 Added commonMark syntax highlighting and caching so that we don't need to constantly parse markdown if we've done it already. v1.4 Added support for videos. v1.5 BS5 markup improved. v1.6 Documentation updated.",
			'highlight'=>'Minimum PHP version : PHP8.0.',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true,
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
