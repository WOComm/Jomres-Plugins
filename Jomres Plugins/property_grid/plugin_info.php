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

class plugin_info_property_grid
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"property_grid",
			"category"=>"Site Building",
			"marketing"=>"Displays properties in grids. Has multiple options. Bootstrap 5 only.",
			"version"=>(float)"1.6",
			"description"=> "Displays properties in grids. Has multiple options. Bootstrap 5 only.",
            "lastupdate"=>"2023/05/12",
			"min_jomres_ver"=>"10.5.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 Small image template markup improved v1.2 Markup improved. v1.3 Documentation updated. v1.4 Markup improvements v1,5 make sure reviews section is available v1.6 Removed basic module output override scripts',
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
