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

class plugin_info_asamodule_recently_viewed
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"asamodule_recently_viewed",
			"category"=>"Site Building Tools",
			"marketing"=>"Shows recently viewed properties in an ASAModule widget/module. Allows the site visitor to return to a previously viewed property.",
			"version"=>(float)"1.9",
			"description"=> "Widget. Shows recently viewed properties in an ASAModule widget/module. Use the arguments 'asamodule_recently_viewed_listlimit' to control the number of properties shown. CMS agostic replacement for jomres_ngm_recently_viewed.",
			"lastupdate"=>"2022/05/08",
			"min_jomres_ver"=>"10.3.0",
			"type"=>"",
			"manual_link"=>'',
			'change_log'=>'v1.1 added: $tmpBookingHandler->initBookingSession(); //so that the session id is found and set on non jomres pages. v1.2 Corrected the name of a variable that sets the list limit. v1.3 Added vertical layout option. v1.4 PHP7 related maintenance. 1.5  Jomres 9.7.4 related changes v1.6 Notice fixes.  v1.7 Added Shortcode related changes. v1.8 Modified how array contents are checked.',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_f5gax.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
