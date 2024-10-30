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

class plugin_info_api_feature_favourites
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_favourites",
			"category"=>"REST API",
			"marketing"=>"Functionality that allows editing of user's favourites through the API",
			"version"=>"1.0",
			"description"=> "Functionality that allows editing of user's favourites through the API",
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"lastupdate"=>"2019/10/28",
			"min_jomres_ver"=>"9.19.2",
			"manual_link"=>'',
			'change_log'=>'v0.3 Modified how data is returned. v0.4 Added SET NAMES UTF8 v0.5 French language file added v1.0 API plugins updated to work with updates to Jomres, and some tweaks for consistency.',
			'highlight'=>'',
			'image'=>'https://www.jomres.net/manual/images/Manual/09_38_6dfbu.png',
			'demo_url'=>'',
			'free'=>true
			);
		}
	}
