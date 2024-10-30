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

class plugin_info_popular_properties
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"popular_properties",
			"category"=>"Site Building Tools",
			"marketing"=>"ists all reviewed properties in a grid showing their rating.",
			"version"=>(float)"3.4",
			"description"=> " Lists all reviewed properties in a grid showing their rating. Doesn't link into any existing area of Jomres, instead it would expect to be included by a module through a link like http://www.domain.com/index.php?option=com_jomres&task=popular_properties.",
            "lastupdate"=>"2022/08/01",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/90-popular-properties',
			'change_log'=>'1.5 Updated to add a menu option to Jomres 6 mainmenu. Added a lang file. Added a check for an obsolete file. 1.6 Updated to correct a classname. 1.7 Modified where ePointFilepath is set to prevent some users getting patTemplate file not found errors. 1.3 updated to worth with Jr7. v1.9 Updated a number of URLs that had fallen behind the times and become out-of-date. Added proper template directory structure. v2.0 PHP7 related maintenance. v2.1 Jomres 9.7.4 related changes v2.2 Remaining globals cleanup and jr_gettext refactor related changes. v2.2 Added a retval so that notices are not triggered v2.4 Removed references to customtext class due to 9.8.2 language changes. v2.5 Modified functionality to use new get_property_details_url function. v2.6 Frontend menu refactored. v2.7 Modified how array contents are checked. v2.8 Removed a check for admin area to allow scripts to call frontend menu in the administrator area. v2.9 French language file added v3.0 BS4 template set added v3.1 Italian language file added, thanks Nicola v3.2 Language files updated v3.3 Bootstrap 5 template set added. v3.4 BS5 template added, shortcode info added and documentation updated.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_2u1m6.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
