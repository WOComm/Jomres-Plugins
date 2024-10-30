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

class plugin_info_property_inna_module
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"property_inna_module",
			"category"=>"Site Building Tools",
			"marketing"=>"Show a small property thumbnail in a module, which links to the property's details page.",
			"version"=>"2.2",
			"description"=> 'Module. Set jomres_asamodule so that the task is "property_inna_module" and the arguments to "&id=N" where N = a property\'s uid to see that property inserted into a module.',
            "lastupdate"=>"2022/08/03",
			"min_jomres_ver"=>"9.9.10",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/93-property-inna-module',
			'change_log'=>' v1.1 modified plugin so that we can pass a comma seperated list and output multiple properties. v1.3 fixed a bug that was preventing language translations from showing properly. v1.4 Added a call to gmaps source function. v1.5 PHP7 related maintenance. v1.6 Modified how array contents are checked. v1.7 Changed how a variable is detected v1.8 Shortcode info added v1.9 French language file added v2.0 Italian language file added, thanks Nicola v2.1 Language files updated v2.2 Documentation updated ',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_1f1qk.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
