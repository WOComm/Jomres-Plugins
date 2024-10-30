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

class plugin_info_powered_by_gone
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"powered_by_gone",
			"category"=>"Utilities",
			"marketing"=>"Removes the powered by Jomres link from the bottom of the page.",
			"version"=>(float)"1.3",
			"description"=> "Removes the powered by Jomres link from the bottom of the page.",
			"type"=>"internal",
			"lastupdate"=>"2015/11/09",
			"min_jomres_ver"=>"9.2.1",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/91-powered-by-gone',
			'change_log'=>'1.1 added code to watch jquery and change the cursor to the waiting cursor when ajax activity takes place. 1.2 Updated to work with Jr7, including using new poweredby template. v1.3 PHP7 related maintenance.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_2u1m6.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
