<?php
/**
 * Jomres CMS Agnostic Plugin
 * @author Woollyinwales IT <sales@jomres.net>
 * @version Jomres 10.7
 * @package Jomres
 * @copyright	2005-2023 Woollyinwales IT
 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
 **/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_property_faqs
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"property_faqs",
			"category"=>"Property tools",
			"marketing"=>"Edit and display frequently asked questions.",
			"version"=>(float)"1.4",
			"description"=> "Edit and display frequently asked questions. These can be displayed in the property details pages, or as a shortcode.",
            "lastupdate"=>"2023/06/08",
            "min_jomres_ver"=>"10.7.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 Added json-ld schema for FAQPage v1.2 Added property type specific FAQ files, and the ability to override them with a custom file. v1.3 Fixed a bug with the default questions file name. v1.8 Plugin improved to support multiple languages.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
