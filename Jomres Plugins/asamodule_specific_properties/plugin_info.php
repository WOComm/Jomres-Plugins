<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class plugin_info_asamodule_specific_properties
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"asamodule_specific_properties",
			"category"=>"Site Building Tools",
			"marketing"=>"Shows specific properties in an ASAModule widget/module. Useful for generating visits to properties that might otherwise not be seen.",
			"version"=>(float)"1.2",
			"description"=> "Widget. Shows specific properties in an ASAModule widget/module. Use the arguments 'asamodule_sp_uids=x,y,z' to specify the property uids to be shown. Use asamodule_sp_vertical=1 if the module would be used with a vertical layout.",
			"lastupdate"=>"2022/05/08",
			"min_jomres_ver"=>"10.3.0",
			"type"=>"",
			"manual_link"=>'',
			'change_log'=>' v1.1 Added Shortcode related changes.',
			'image'=>'',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
