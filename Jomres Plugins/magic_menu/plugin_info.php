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

class plugin_info_magic_menu
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"magic_menu",
			"category"=>"Search",
			"marketing"=>"This plugin allows Super Property Managers to add new search options to the Search menu in the Jomres main menu. ",
			"version"=>"3.0",
			"description"=> "This plugin allows Super Property Managers to add new search options to the Search menu in the Jomres main menu. If the user is a Super Property Manager when they perform a search that has 'calledByModule' in the url, then Jomres will add a link titled 'Add this search' to the Search menu. Clicking on this link will give you a page where you can enter a title, for example 'Summer breaks'. When the manager saves this then a new Jomres minicomponent is created which will result in a new menu option being added to the Jomres main menu called 'Summer breaks'. ",
			"lastupdate"=>"2020/09/16",
			"min_jomres_ver"=>"9.23.1",
			'change_log'=>'v1.1 Updated to work in Jr7 1.2  Templates bootstrapped. 1.3 Variety of changes to prevent var not set notices. v1.4 Added BS3 templates. v1.5  Modified plugin to ensure correct use of jomresURL function. v1.6 BS3 template related changes. v1.7 PHP7 related maintenance. v1.8 Changed some forms to use JOMRES_SITEPAGE_URL_NOSEF instead of JOMRES_SITEPAGE_URL. v1.9 Jomres 9.7.4 related changes v2.0 Jomres 9.7.4 related changes v2.1 Remaining globals cleanup and jr_gettext refactor related changes. v2.2 Fixed a notice. v2.3 Minicomponent registry update related changes. v2.4 Frontend menu refactored. v2.5 Changed how a variable is detected. v2.6 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.7 CSRF hardening added. v2.8 French language file added v2.9 BS4 template set added v3.0 Italian language file added, thanks Nicola ',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_i48xg.png',
			'demo_url'=>'',
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/81-magic-menu',
            'compatability'=>['Bootstrap 2','Bootstrap 3'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
