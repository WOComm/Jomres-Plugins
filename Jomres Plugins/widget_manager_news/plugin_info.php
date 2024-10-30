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

class plugin_info_widget_manager_news
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"widget_manager_news",
			"category"=>"Widgets",
			"marketing"=>"A widget to display news articles in the manager dashboard",
			"version"=>(float)"2.1",
			"description"=> "This widget gives Site Admin the ability to communicate site or wider news articles to their property managers through the Property Manager's control panel. It adds a new link Site News to the Portal section of the Administrator area and from there you can create small articles that will appear if the Widget has been enabled.",
            "lastupdate"=>"2022/08/03",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'',
			'change_log'=>'Fixed a bug where a template file was missing. v1.2 Added a feature where news articles can be targetted towards individual properties. v1.3 Improved templates. v1.4 Fixed a menu link. v1.5 CSRF hardening added. v1.6 French language file added v1.7 French lang file updated v1.8 BS4 template set added v1.9 Language files updated v2.0 Bootstrap 5 template set added. v2.1 Template improvements and documentation updated',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_o8s8i.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
