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

class plugin_info_stepz
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"stepz",
			"category"=>"Site Building Tools",
			"marketing"=>"Shows an indicator bar to demonstrate to the guest where they are in the booking process.",
			"version"=>(float)"4.8",
			"description"=> ' Shows an indicator bar to demonstrate to the guest where they are in the booking process. ',
            "lastupdate"=>"2022/09/05",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/102-stepz',
			'change_log'=>'3.0  Templates bootstrapped. 3.1 Variety of changes to prevent var not set notices. v3.2 Improved the bootstrapped layout, looks like arrows now. v3.3 Added BS3 templates. v3.4 Added functionality pertaining to Jomres javascript versioning. v3.5 Added changes to reflect addition of new Jomres root directory definition. v3.6 PHP7 related maintenance. v3.7 Jomres 9.7.4 related changes v3.8 Remaining globals cleanup and jr_gettext refactor related changes. v3.9 Added Shortcode related changes. v4.0 Updated path to style file v4.1 French language file added. v4.2 lang file updated v4.3 BS4 template set added v4.4 Italian language file added, thanks Nicola v4.5 Language files updated v4.6 Bootstrap 5 template set added. v4.7 Markup for arrows improved v4.8  Do not show if menuoff is in the url',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_tq1kd.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
