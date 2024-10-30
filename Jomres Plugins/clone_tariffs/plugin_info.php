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

class plugin_info_clone_tariffs
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"clone_tariffs",
			"category"=>"Bookings Configuration",
			"marketing"=>"This feature allows a property manager who has access to more than one property to clone tariffs from one property to another. A common usage for this is by property managers who manage multiple properties. It allows them to easily copy complex, time consuming to create tariffs from one property to another. Normally the source property isn't published and is used simply as a repository for these complex tariffs.",
			"version"=>(float)"3.6",
			"description"=> "This feature allows a property manager who has access to more than one property to clone tariffs from one property to another. ",
            "lastupdate"=>"2023/05/24",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/property-managers-guide/48-your-toolbar/settings/260-clone-tariffs',
			'change_log'=>' v0.6 Added BS3 templates. v0.7 fixed bugs where Advanced tariffs would not be cloned and existing tariffs for Advanced would not be removed if requested. v0.8 fixed some variables so that the menu option is hidden from those who do not need to see it. v0.9 fixed a bug where tariff modes were not being compared properly therefore target property tariffs were being deleted. v1.0 Added a variety of BS3 template tweaks. v1.1 Modified how queries are performed to take advantage of quicker IN as opposed to OR. v1.2 PHP7 related maintenance. v1.3 Changed some forms to use JOMRES_SITEPAGE_URL_NOSEF instead of JOMRES_SITEPAGE_URL. v1.4 Jomres 9.7.4 related changes v1.5 Remaining globals cleanup and jr_gettext refactor related changes. v1.6 jr_gettext tweaks. v1.7 Updated plugin to work on current version of Jomres. v1.8 Webhook related changes. v1.9 Webhook task renamed for consistency v2.0 Removed references to Jomres Array Cache as it is now obsolete. v2.1 Menu options updated for menu refactor in v9.8.30 v2.2 Modified how array contents are checked. v2.3 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.4 Improved how we get tariffs from source properties by checking to see if a tariff type actually has a set of tariffs. v2.5 CSRF hardening added. v2.6 French language file added. v2. BS4 template set added v2.8  Italian language file added, thanks Nicola  v2.9 Language files updated v3.0  Fixed issue affecting WordPress forms. v3.1 Bootstrap 5 template set added. v3.2 Language file translations fixed v3.3 Fixed hard coded menu item. v3.4 Serbian lang file updated. v3.5 Documentation updated. v3.6 Select list markup changes.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/clone_tariffs.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
