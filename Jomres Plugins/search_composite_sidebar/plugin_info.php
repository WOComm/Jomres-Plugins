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

class plugin_info_search_composite_sidebar
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"search_composite_sidebar",
			"category"=>"Site Building Tools",
			"marketing"=>"Provides an ajax driven search sidebar",
			"version"=>(float)"1.0",
			"description"=> "Min version Jomres 10.7. Overrides ajax search composite top bar and replaces it with a sidebar that will appear on search result pages. ",
            "lastupdate"=>"2023/05/03",
            "min_jomres_ver"=>"10.7.0",
			"manual_link"=>'',
			'change_log'=>'',
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
