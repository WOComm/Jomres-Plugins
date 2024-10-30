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

class plugin_info_minimum_occupancies
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"minimum_occupancies",
			"category"=>"Bookings Configuration",
			"marketing"=>"Allows a property manager to define different minimum occupancy levels for different room types.",
			"version"=>"6.6",
			"description"=> " Allows a property manager to define different minimum occupancy levels for different room types.",
            "lastupdate"=>"2022/01/04",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/property-managers-guide/48-your-toolbar/settings/301-minimum-occupancies',
			'change_log'=>'v2.6 modified the minimum occupancies plugin to bring it in line with the current version of Jomres. v2.7 Added a fix for some users getting the No Vacancies message in error. v2.8 Changed the plugin category in the menu. v2.9 Fixed a small bug where an existing minimum occupancy setting does not include any new guest types when it is edited, if they were added after it was created. v3.0 Removed references to Token functionality that is no longer used. v3.1 Modified menu allocation. v3.2 Added BS3 templates. v3.3 Added changes to reflect addition of new Jomres root directory definition. v3.4 Generate date input updated to support BS3/Font Awesome. v3.5 Fixed path to images. v3.6 Improved path to calendar image due to recent changes. v3.7 Improved functionality so that correct guest numbers are automatically chosen when amending bookings. v3.8 renamed files to affect where they are triggered. Security fix.  v3.9 tweak to make BS3 calandar icon clickable. v4.0 made calendar input uneditable. v4.1 PHP7 related maintenance. v4.2 Changed some forms to use JOMRES_SITEPAGE_URL_NOSEF instead of JOMRES_SITEPAGE_URL. v4.3 updated datatables. v4.4 Datepicker related tweaks. v4.5 Jomres 9.7.4 related changes v4.6 Remaining globals cleanup and jr_gettext refactor related changes. v4.7 jr_gettext tweaks. v4.8 Notice level changes. v4.9 Fixed an issue where Fixed interval dropdowns could cause a javascript error. v5.0 Fixed an issue where this script could cause white page errors in label editing. v5.1 Notices fixes. v5.2 Updated booking class to use new internal settings RE tariff types. v5.3 Extras tasks renamed and renumbered. v5.4 Menu options updated for menu refactor in v9.8.30 v5.5 Modified how array contents are checked. v5.6 Tweaked when a menu option will be shown. v5.7 Changed how a path is defined. v5.8 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v5.9 Modified plugin to work for SRPs too. v6.0 Node/javascript path related changes. v6.1 CSRF hardening added. v6.2 French language file added v6.3 BS4 template set added v6.4 Italian language file added, thanks Nicola v6.5 Language files updated v6.6 Bootstrap 5 template set added.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_7bge3.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
		

	}
