<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 10.6
* @package Jomres
* @copyright	2005-2023 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/


// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_search_form_elements_guide
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"search_form_elements_guide",
			"category"=>"Search tools",
			"marketing"=>"",
			"version"=>"0.2",
			"description"=> "",
            "lastupdate"=>"2023/04/17",
            "min_jomres_ver"=>"10.6",
			"manual_link"=>'',
			'change_log'=>'v0.2 Small markup tweak for the example search form.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true,
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
