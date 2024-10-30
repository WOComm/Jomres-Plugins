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

class plugin_info_common_template_variables
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"common_template_variables",
			"category"=>"Administrator tools",
			"marketing"=>"Administrator area functionality. Designed to show developers common strings that are available to all templates without needing to add them to the template's calling script.",
			"version"=>(float)"2.8",
			"description"=> "Designed to show developers common strings that are available to all templates without needing to add them to the template's calling script. Adds a menu option 'common strings' to the Developer section in the administrator area Jomres menu.",
            "lastupdate"=>"2022/07/28",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/43-common-template-variables',
			'change_log'=>'1.1 updated to work with Jr7.1 1.2 v7.1 specific changes v1.3 Minor tweak to ensure that editing mode does not interfere with buttons. v1.4  Hide menu option if Simple Site Config enabled. v1.4 Added BS3 templates. v1.5 Added changes to reflect addition of new Jomres root directory definition. v1.6 PHP7 related maintenance. v1.7 Jomres 9.7.4 related changes v1.8 Remaining globals cleanup and jr_gettext refactor related changes. v1.9 Fixed some notice level errors. v2.0 Advanced Site Config flag removed. v2.1 Plugin refactored for admin area changes in jr 9.9 v2.2 French language file added. v2.3 BS4 template set added v2.4 Italian language file added, thanks Nicola v2.5  Language files updated v2.6 Language files updated v2.7 Bootstrap 5 template set added.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_5bw5l.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
