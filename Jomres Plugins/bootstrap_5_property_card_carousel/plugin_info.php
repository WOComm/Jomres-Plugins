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

class plugin_info_bootstrap_5_property_card_carousel
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"bootstrap_5_property_card_carousel",
			"category"=>"Site Building Tools",
			"version"=>(float)"1.1",
			"description"=> 'Provides a property card carousel a little like the Amazon carousel of suggested items.',
			"type"=>"module",
			"lastupdate"=>"2022/06/16",
			"min_jomres_ver"=>"10.2.2",
			"manual_link"=>'',
			'change_log'=>'v1.1 Changed where a filter array is declared.',
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