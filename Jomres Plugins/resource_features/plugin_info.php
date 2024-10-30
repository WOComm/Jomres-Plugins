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

class plugin_info_resource_features
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"resource_features",
			"category"=>"Bookings Configuration",
			"marketing"=>"Allows the site admin to create room/resource features that can be assigned by managers to their rooms/resources and also allow managers to create their property specific room/resources features. Room/resource features are useful because if you enable the \"classic\" rooms list in the booking form then guests can search for rooms with specific features.",
			"version"=>(float)"4.6",
			"description"=> " Allows the site admin to create room/resource features that can be assigned by managers to their rooms/resources and also allow managers to create their property specific room/resources features.",
            "lastupdate"=>"2023/07/31",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/property-managers-guide/48-your-toolbar/settings/240-room-resource-features',
			'change_log'=>'v1.1 Improvements to Room feature editing for JQ UI based systems. v1.2 Added changes to reflect addition of new Jomres root directory definition. v1.3  Modified plugin to ensure correct use of jomresURL function. v1.4 BS3 template related changes. v1.5 Added new functionality that allows uploading of images for Optional Extras. v1.6 small performance improvements. v1.7 Improved how room features images are managed. v1.8  fixed a bug with images not showing when not logged in. v1.9 Removed template touchable code from j06002list_resource_features.class.php v2.0 added asamodule_resources to exception tasks. v2.1 PHP7 related maintenance. v2.2 Changed some forms to use JOMRES_SITEPAGE_URL_NOSEF instead of JOMRES_SITEPAGE_URL. v2.3 Jomres 9.7.4 related changes v2.4 Remaining globals cleanup and jr_gettext refactor related changes. v2.5 Resolved an issue with images. v2.6 Fixed some notice level errors. v2.7 Fixed a notice and changed a language file string. v2.8 Notice fix. v2.9 Media centre related changes.  Advanced Site Config flag removed. 3.0 Advanced Site Config flag removed. v3.1 Modified how admin menu is generated. v3.2 Menu options updated for menu refactor in v9.8.30 v3.3 Tweaked when the menu will be shown. v3.4 Tweaked how a row is generated. v3.5 Changed how a path is defined. v3.6 Updated code to use images class. v3.7 Node/javascript path related changes. v3.8 CSRF hardening added. v3.9 Resolved an issue with saving room features in admin area. v4.0 French language file added v4.1 BS4 template set added v4.2 Italian language file added, thanks Nicola v4.3 Language files updated v4.4 Bootstrap 5 template set added. v4.5 Documentation updated v4.6 resolve a notice',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_s4a0t.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
