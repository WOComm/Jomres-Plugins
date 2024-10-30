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

class plugin_info_default_property_settings
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"default_property_settings",
			"category"=>"Administrator tools",
			"marketing"=>"Administrator area function. Allows administrators to set newly created properties default settings.",
			"version"=>(float)"4.7",
			"description"=> " Allows you to modify the default General Configuration settings as they are stored in #__jomres_settings without needing to use phpmyadmin. ",
            "lastupdate"=>"2022/01/04",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/18-control-panel/developer-tools/144-default-property-settings',
			'change_log'=>'v2.6 Array Cache related changes. v2.7 Hide menu option if Simple Site Config enabled. v2.8 Added BS3 templates. v2.9 Added changes to reflect addition of new Jomres root directory definition. v3.0  Modified plugin to ensure correct use of jomresURL function.v3.1 changed how some settings are discovered. v3.2 Removed Smoking and Disabled access options from default property settings. v3.3 PHP7 related changes. v3.4 Jomres 9.7.4 related changes v3.5 Remaining globals cleanup and jr_gettext refactor related changes. v3.6 jr_gettext changes. v3.7 Changed how the default configuration file is imported into the plugin. v3.8 Added facebook page to list of settings that cannot be set by default. v3.9 Fixed some notice level errors. v4.0  Removed references to Jomres Array Cache as it is now obsolete. v4.1 Advanced Site Config flag removed. v4.2 Plugin refactored for admin area changes in jr 9.9 v4.3 CSRF hardening added. v4.4 French language file added. v4.5 BS4 template set added v4.6 Language files updated. v4.7 Bootstrap 5 template set added.',
			'highlight'=>' Advanced feature, do not use if you don\'t understand what it does.',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_stus3.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
