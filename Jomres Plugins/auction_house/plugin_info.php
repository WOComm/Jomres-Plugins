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

class plugin_info_auction_house
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"auction_house",
			"category"=>"Miscellaneous",
			"marketing"=>"Allows property managers to create auctions for rooms in a property, or auctions that aren't linked to rooms. ",
			"version"=>(float)"5.2",
			"description"=> " Allows property managers to create auctions for rooms in a property, or just auctions that aren't linked to rooms. ",
            "lastupdate"=>"2023/05/24",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/property-managers-guide/44-your-toolbar/misc/228-auction-house',
			'change_log'=>'v2.7 Modified auction house so that multiselect is only loaded if needed. v2.8 Removed an un-needed menu item. v2.9 Added changes to reflect addition of new Jomres root directory definition. v3.0 updated BS3 templates. v3.1 added changes relating to invoice improvements in 8.2. v3.2 Added code specific to new commission functionality. v3.3 PHP7 related maintenance. 3.4 Jomres 9.7.4 related changes v3.5 Jomres 9.7.4 related changes v3.6 Remaining globals cleanup and jr_gettext refactor related changes. v3.7 Added Shortcode related changes. v3.8 User role related updates. v3.9 User role related updates. v4.0 Menu options updated for menu refactor in v9.8.30 v4.1 Modified how array contents are checked. v4.2 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v4.3 Node/javascript path related changes. v4.4 Plugin updated to work with Jomres data encryption of user details. v4.5  CSRF hardening added. v4.6 French language file added. v4.6 BS4 template set added v4.8 Tweaked a template array variable to show rooms correctly. v4.9 Language files updated v5.0 Fixed issue affecting WordPress forms v5.0 Documentation updated. v5.2 Select list markup changes.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_43oth.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
