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

class plugin_info_quick_register
	{
	function __construct()
	{
		$this->data=array(
			"name"=>"quick_register",
			"category"=>"Site Building Tools",
			"marketing"=>"Offers improved registration functionality for both Joomla and Wordpress. Offers a simple registration form that requests a user's email address and registers that user immediately.",
			"version"=>(float)"2.5",
			"description"=> "Offers improved registration functionality for both Joomla and Wordpress. Offers a simple registration form that requests a user's email address and registers that user immediately. Also offers a login option, both options are presented as modal popups.",
            "lastupdate"=>"2022/08/03",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'',
			'change_log'=>'v0.6 Gave a setting a default value. v0.7 removed tooltip that was not working. v0.8 Tweaked a template v0.9 Further tweaked a template for languages with longer translations of Join. v1.0 Updated the name of a function. v1.1 Added changes supporting 9.8.30 minicomponent registry changes v1.2 Settings moved to Site Config v1.3 Registration task changed. v1.4 Tweaked how we unset a menu option. v1.5 Changed how a path is defined. v1.6 Plugin updated to demonstrate shortcode settings in Shortcodes page. v1.7 GDPR related changes. v1.8 Fixed bug created by new GDPR functionality. v1.9 CSRF hardening added. v2.0 French language file added v2.1 BS4 template set added v2.2 Language files updated v2.3 Bootstrap 5 template set added. v2.4 Bootstrap 5 markup improved v2.5 Documentation updated',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_6hee6.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
