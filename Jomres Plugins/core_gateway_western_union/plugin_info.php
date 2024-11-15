<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_core_gateway_western_union
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"core_gateway_western_union",
			"category"=>"Payment handling",
			"marketing"=>"Western Union gateway (offline payments). Adds functionality to edit Western Union account details for each property individually or globally for all properties.",
			"version"=>(float)"3.6",
			"description"=> "Western Union gateway (offline payments). Adds functionality to edit Western Union account details for each property individually or globally for all properties.",
            "lastupdate"=>"2022/09/27",
            "min_jomres_ver"=>"10.3.0",
			"manual_link"=>'',
			'change_log'=>'v2.1 Fix paths. v2.2 Improved Print icon functionality. v2.3 Updated language file. v2.4 Added changes supporting 9.8.30 minicomponent registry changes v2.5 Save plugin task changed. v2.6 Modified how admin menu is generated. v2.7 Subscription related functionality updated v2.8 Modified how array contents are checked. v2.9 CSRF hardening added. v3.0 French language file added v3.1 BS4 template set added v3.2 Language files updated v3.3  Fixed issue affecting WordPress forms v3.4 Bootstrap 5 template set added. 3.5 Gateway renamed, but still uses old settings. Plugin updated to add booking note when gateway selected, and the BS5 templates have been tweaked/improved. Basic modernisation. v3.6 Tweaks for Jomres 10.5.4',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_ndtm7.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
			}
	}
