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

class plugin_info_site_telegram_posts
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"site_telegram_posts",
			"category"=>"Integrations",
			"marketing"=>"",
			"version"=>"1.1",
			"description"=> "Send updates to a Telegram channel",
			"lastupdate"=>"2023/07/30",
			"min_jomres_ver"=>"10.7.1",
			"manual_link"=>'',
			'change_log'=>'v1.1 check that a constant has already been defined before trying to define it again.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>false,
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
