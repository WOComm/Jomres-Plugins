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

class plugin_info_show_review
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"show_review",
			"category"=>"Site Building",
			"marketing"=>"Show a single review",
			"version"=>"1.1",
			"description"=> "Show a single review, either as a page for itself or as a shortcode. See the shortcodes page for arguments." ,
            "lastupdate"=>"2022/08/03",
            "min_jomres_ver"=>"10.2.2",
			"manual_link"=>'',
			'change_log'=>'v1.0 Updated plugin to ensure that it backs out gracefully in the event that it is asked to show a review that does not exist. v1.1 Documentation updated.',
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
    
    
    
