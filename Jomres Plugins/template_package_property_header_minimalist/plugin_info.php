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

class plugin_info_template_package_property_header_minimalist
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"template_package_property_header_minimalist",
			"category"=>"Templates",
			"marketing"=>"Installs an alternative Property Header template where the property header has been cut down to the bare minimum.",
			"version"=>(float)"0.2",
			"description"=> "Installs an alternative Property Header template where the property header has been cut down to the bare minimum",
			"lastupdate"=>"2022/08/03",
			"min_jomres_ver"=>"9.8.30",
			"manual_link"=>'',
			'change_log'=>' v0.2 Documentation updated',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_p0acc.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 3'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
