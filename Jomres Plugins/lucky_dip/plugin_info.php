<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

class plugin_info_lucky_dip
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"lucky_dip",
			"category"=>"Search",
			"marketing"=>"A different kind of search feature, we threw it together as a bit of fun to see if we could provide a different way of searching for properties. This is designed for site managers who're targetting those middle income thirty-somethings who know they want to go on holiday, but don't know where. They only know that they want to spend a few pounds/euros/dollars and they want to do something (e.g. skiing). This plugin gives the visitor an input to enter a pound/euro/dollar/whatever amount and select a feature or features.",
			"version"=>"3.6",
			"description"=> "A different kind of search feature. This is designed for site managers who're targetting those middle income thirty-somethings who know they want to go on holiday, but don't know where. They only know that they want to spend a few pounds/euros/dollars and they want to do something (e.g. skiing). This plugin gives the visitor an input to enter a pound/euro/dollar/whatever amount and select a feature or features. When they click Submit they're taken to a set of search results that will prioritise the results based on the closest number of features it could find that matches the selection, and the system will estimate the number of nights they could stay for the cost they entered. The plugin adds a new link to the Search category of the Jomres main menu called 'lucky dip' once installed but of course you'd probably want to link your own main menu to the 'lucky_dip' task, perhaps from the main page. Alternatively you could use the mambotasaplugin or jomresasamodule to position the initial input.",
            "lastupdate"=>"2022/08/01",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/80-lucky-dip',
			'change_log'=>'v0.2 tweaked code to ensure unpublished properties are not shown. v0.3 Minor layout tweaks. v1  Added code supporting Media Centre image locations. v1.1 Added BS3 templates. v1.2 changed form method from get to post to resolve a redirection issue. v1.3 Added changes to reflect addition of new Jomres root directory definition. v1.4  Modified how queries are performed to take advantage of quicker IN as opposed to OR.  PHP7 related maintenance.1.5 PHP7 related maintenance. v1.6 Changed some forms to use JOMRES_SITEPAGE_URL_NOSEF instead of JOMRES_SITEPAGE_URL. v1.7 Jomres 9.7.4 related changes v1.8 Remaining globals cleanup and jr_gettext refactor related changes. v1.9 jr_gettext tweaks. v2.0 Modified functionality to use new get_property_details_url function. v2.1 Modified code to reflect fact that currency code conversion is now a singleton. v2.2 Menu options updated for menu refactor in v9.8.30 v2.3 Fixed a notice. v2.4 Modified how array contents are checked. v2.5 Add Nights output. v2.6 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.7 Node/javascript path related changes. v2.8 CSRF hardening added. v2.9 French language file added v3.0 BS4 template set added v3.1 Italian language file added, thanks Nicola v3.2 Language files updated v3.3  Fixed issue affecting WordPress forms v3.4 Bootstrap 5 template set added. v3.5 Added shortcode data. v3.6 Documentation updated.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_sdx5z.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
