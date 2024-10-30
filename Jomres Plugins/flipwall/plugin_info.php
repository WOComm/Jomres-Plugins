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

class plugin_info_flipwall
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"flipwall",
			"category"=>"Site Building Tools",
			"marketing"=>"Shows a random set of property images, which when clicked will flip over to show part of the property description and a link to the property's detail page.",
			"version"=>(float)"3.2",
			"description"=> " Shows a random set of property images, which when clicked will flip over to show part of the property description and a link to the property's detail page. Can be placed via jomres_asamodule by setting the 'task' to 'flipwall'.",
            "lastupdate"=>"2022/01/04",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/65-flipwall',
			'change_log'=>'1.1 Updated to work with Jomres v6 1.2 layout tweaks made. 1.3 Modified where ePointFilepath is set to prevent some users getting patTemplate file not found errors. 1.4 Updated to work with Jr7 1.5  Templates bootstrapped. 1.6 added code to strip out html from panels. 1.7 Added code supporting Media Centre image locations. v1.8 Added BS3 templates. v1.9 Added functionality pertaining to Jomres javascript versioning. v2.0 Added changes to reflect addition of new Jomres root directory definition. v2.1 Resolved an issue that would appear on sites with less than 20 properties. v2.2 PHP7 related maintenance. v2.3 Jomres 9.7.4 related changes v2.4 Remaining globals cleanup and jr_gettext refactor related changes. v2.5 Modified functionality to use new get_property_details_url function. v2.6 Menu options updated for menu refactor in v9.8.30 v2.7 Modified how array contents are checked. v2.8 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.9 French language file added. v3.0 BS4 template set added v3.1 Language files updated v3.2 Bootstrap 5 template set added.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_9aud3.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
