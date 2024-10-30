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

class plugin_info_bootstrap_5_property_list_templates
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"bootstrap_5_property_list_templates",
			"category"=>"Site Building Tools",
			"version"=>(float)"1.4",
			"description"=> 'Provides an alternative set of property list template files. Visit admin area Property Details Templates page for a list of alternatives you can use.',
			"lastupdate"=>"2022/07/26",
			"min_jomres_ver"=>"10.2.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 Tweaked functionality to enable calling diff templates via url/shortcode. v1.2 Modified how box template looks in smaller layouts, modified  00005 script to ensure that we can send a setting to 01010 script to not show list properties header if required. v1.3 allow discovery of property list paths if task == "" v1.4 Documentation updated. ',
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