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

class plugin_info_bootstrap_5_hero_slider
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"bootstrap_5_hero_slider",
			"category"=>"Site Building Tools",
			"marketing"=> 'A slider made up of property main images and takes Search Widget parameters to add a search form overlay',
			"version"=>(float)"1.1",
			"description"=> 'A slider made up of property main images (by default featured properties) and takes Search Widget parameters to add a search form overlay. Uses the property\'s name/description/price to build each panel.',
			"type"=>"module",
			"lastupdate"=>"2022/11/08",
			"min_jomres_ver"=>"10.5.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 Improved how looping works/indicators',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
