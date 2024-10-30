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

class plugin_info_logo_uploader
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"logo_uploader",
			"category"=>"Property Manager tools",
			"marketing"=>"Allows site administrators to upload a logo that will be used on admin invoices and property managers to upload a logo for each property that will be used on booking invoices.",
			"version"=>(float)"1.4",
			"description"=> "Allows site administrators to upload a logo that will be used on admin invoices and property managers to upload a logo for each property that will be used on booking invoices.",
            "lastupdate"=>"2022/08/03",
			"min_jomres_ver"=>"9.9.18",
			"manual_link"=>'',
			'change_log'=>'v1.1 French language file added v1.2 Italian language file added, thanks Nicola v1.3 Language files updated v1.4 Documentation updated',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
