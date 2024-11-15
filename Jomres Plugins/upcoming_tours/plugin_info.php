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

class plugin_info_upcoming_tours
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"upcoming_tours",
			"category"=>"Search",
			"marketing"=>"Lists properties that have tours coming soon.",
			"version"=>"1.4",
			"description"=> "Lists properties that have tours coming soon. See the shortcodes page for information on possible options." ,
            "lastupdate"=>"2022/08/03",
			"min_jomres_ver"=>"9.9.17",
			"manual_link"=>'',
			'change_log'=>'v1.1 French language file added v1.2 Italian language file added, thanks Nicola v1.3 Language files updated v1.4 Documentation updated. ',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/2018-01-08_bzqk3.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
    
    
    
