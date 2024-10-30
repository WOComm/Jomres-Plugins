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

class plugin_info_access_control
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"access_control",
			"category"=>"Administrator tools",
			"marketing"=>"Allows site administrators to change required access levels for specific tasks. This changes what appears in the Jomres main menu and which tasks can be reached directly.",
			"version"=>(float)"1.5",
			"description"=> "Allows site administrators to change required access levels for specific tasks. This changes what appears in the Jomres main menu and which tasks can be reached directly.",
            "lastupdate"=>"2021/10/25",
			"min_jomres_ver"=>"9.16.0",
			"manual_link"=>'https://www.jomres.net/manual/site-managers-guide/28-control-panel/system-maintenance/197-access-control',
			'change_log'=>'v1.1 changed how the new_level access level is sanitised as the previous method was converting negative figures to zero. v1.2 Added french lang file. v1.3 Italian language file added, thanks Nicola v1.4 Language files updated v1.5 Language files updated',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_nfbxa.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
