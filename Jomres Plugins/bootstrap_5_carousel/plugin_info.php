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

class plugin_info_bootstrap_5_carousel
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"bootstrap_5_carousel",
			"category"=>"Site Building Tools",
			"version"=>(float)"1.4",
			"description"=> 'Replaces the Jomres slideshow with a Bootstrap 5 carousel.',
			"type"=>"module",
			"lastupdate"=>"2023/05/23",
			"min_jomres_ver"=>"10.6.0",
			"manual_link"=>'',
			'change_log'=>'v1.1 Documentation updated. v1.2 Added image sizing options. v1.3 Lazy loading added v1.4 Added small/large images display on viewport size.',
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