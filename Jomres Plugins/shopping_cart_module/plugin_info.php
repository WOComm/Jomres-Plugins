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

class plugin_info_shopping_cart_module
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"shopping_cart_module",
			"category"=>"Site Building Tools",
			"marketing"=>"Offers a shopping cart module for showing guests what bookings they've saved in their carts.",
			"version"=>(float)"2.9",
			"description"=> "Internal plugin. Offers a shopping cart module for showing guests what bookings they've saved in their carts. Use jomres asamodule, setting 'show_cart_module' as the asamodule task. No arguments are required. Requires the shopping_cart plugin.",
            "lastupdate"=>"2022/01/04",
            "min_jomres_ver"=>"9.25.2",
			'change_log'=>'v1.1 template improved.1.2 Tweak to not show departure dates if so required by a property. v1.3 Plugin updated to work alongside Jomres 6.6.6 and it the bootstrap templates. 1.4 Updated to work on Jr7. 1.5  Templates bootstrapped. v1.6 Added BS3 templates. v1.7 tweaks to how global currency code is used. v1.8 Added changes to reflect addition of new Jomres root directory definition. v1.9 BS3 related template tweaks. v2.0 change the url generation used. v2.1 PHP7 related maintenance. v2.2 Remaining globals cleanup and jr_gettext refactor related changes. v2.3 Added Shortcode related changes. v2.4  Modified code to reflect fact that currency code conversion is now a singleton. v2.5 Modified how array contents are checked. v2.6 Changed how variables are detected. v2.7 Node/javascript path related changes. v2.8 BS4 template set added v2.9 Bootstrap 5 template set added. ',
			"manual_link"=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/jr_house.png',
            'compatability'=>['Bootstrap 2','Bootstrap 3'],
			);
		}
	}
