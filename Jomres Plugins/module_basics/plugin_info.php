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

class plugin_info_module_basics
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"module_basics",
			"category"=>"Property Manager tools",
			"marketing"=>"For SRPs, allows you to set the basic information about your rental.",
			"version"=>(float)"1.2",
			"description"=> "Allows property managers of SRPs to set the basic information about their rental. For example, the number of bedrooms, bathrooms, maximum occupancy, size of the property in square meters. This information can then be used as a shortcode to display information about the property.",
            "lastupdate"=>"2023/05/24",
            "min_jomres_ver"=>"10.7",
			'change_log'=>'v1.1 Do not do anything if module basics not yet configured. v1.2 Select list markup changes. ',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'manual_link'=>'',
            'compatability'=>['Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
