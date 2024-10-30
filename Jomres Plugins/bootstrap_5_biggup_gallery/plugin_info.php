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

class plugin_info_bootstrap_5_biggup_gallery
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"bootstrap_5_biggup_gallery",
			"category"=>"Site Building Tools",
			"version"=>(float)"1.1",
			"description"=> 'Shows property images, which when clicked the image will open in a modal with Pros from reviews showing vertical on the right. { jomres_script show_property_slideshow PROPERTY_UID=N }',
			"type"=>"module",
			"lastupdate"=>"2022/05/06",
			"min_jomres_ver"=>"10.3.1",
			"manual_link"=>'',
			'change_log'=>'v1.1 Documentation updated',
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
