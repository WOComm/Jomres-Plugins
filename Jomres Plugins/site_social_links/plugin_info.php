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

class plugin_info_site_social_links
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"site_social_links",
			"category"=>"Site Building",
			"marketing"=>"Social Media Links for the site as stored in Admin > Jomres > Settings > Site Configuration > Portal tab.",
			"version"=>"0.11",
			"description"=> "Social Media Links for the site as stored in Admin > Jomres > Settings > Site Configuration > Portal tab." ,
            "lastupdate"=>"2022/08/03",
            "min_jomres_ver"=>"10.2.2",
			"manual_link"=>'',
			'change_log'=>'v0.11 Documentation updated. ',
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
    
    
    
