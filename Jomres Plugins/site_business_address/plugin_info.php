<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_site_business_address
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"site_business_address",
			"category"=>"Site Building",
			"marketing"=>"Show the address details for the site as stored in Admin > Jomres > Settings > Site Configuration > Your Company Details tab. Designed to be entered in a footer.",
			"version"=>"0.11",
			"description"=> "Show the address details for the site as stored in Admin > Jomres > Settings > Site Configuration > Your Company Details tab. Designed to be entered in a footer. Use it as a shortcode." ,
            "lastupdate"=>"2022/04/17",
            "min_jomres_ver"=>"10.2.2",
			"manual_link"=>'',
			'change_log'=>' v0.11 Documentation updated',
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
    
    
    
