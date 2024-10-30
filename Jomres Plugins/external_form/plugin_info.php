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

class plugin_info_external_form
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"external_form",
			"category"=>"Administrator tools",
			"marketing"=>"Allows you to include a form from an external form plugin into the tabs of the property details page.",
			"description"=> "Joomla only. Adds a new configuration option to the Jomres administrator area where you set arguments that would normally be called in an article by doing something like {rsform 1}.",
			"version"=>(float)"1.5",
            "lastupdate"=>"2021/10/25",
			"min_jomres_ver"=>"9.8.30",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/24-control-panel/portal-functionality/176-external-form',
			'change_log'=>'v0.7 PHP7 related maintenance. v0.8 Jomres 9.7.4 related changes v1.0 Remaining globals cleanup and jr_gettext refactor related changes. v1.1 Fixed some notice level errors. v1.2 Settings moved to Site Config. v1.3 French language file added. v1.4 Language files updated. v1.5 Language files updated',
			'highlight'=>'Requires an external form component.',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_tlrlp.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
