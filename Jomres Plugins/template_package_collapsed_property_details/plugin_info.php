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

class plugin_info_template_package_collapsed_property_details
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"template_package_collapsed_property_details",
			"category"=>"Templates",
			"marketing"=>"Property Details, no-tabs version, with collapsed panels",
			"version"=>(float)"1.1",
			"description"=> "This contains the property details template with all panels except the main property description & map collapsed. BS3 only.",
			"lastupdate"=>"2018/08/03",
			"min_jomres_ver"=>"9.9.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/358-template-override-packages',
			'change_log'=>' v1.1 Documentation updated',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_2lo1d.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 3'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
