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

class plugin_info_shopping_cart
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"shopping_cart",
			"category"=>"Site Building Tools",
			"marketing"=>"Provides shopping cart functionality.",
			"version"=>(float)"2.0",
			"description"=> "Internal plugin. Provides shopping cart functionality. As it's impossible to take payments for different properties with different payment systems, this plugin needs that the core paypal plugin be installed, and that the plugin override option is set to Yes so that all payments will go to the site manager's paypal account.",
			"lastupdate"=>"2018/12/11",
			"min_jomres_ver"=>"9.9.18",
			'change_log'=>"v1.1 small change from a true to a false to prevent touch templates from trying to show a function that does not exist. 1.2 Tweak to not show departure dates if so required by a property. v1.3 Plugin updated to work alongside Jomres 6.6.6 and it the bootstrap templates. When the cart is shown, prices are converted to the Site global currency. v1.4 tweaks to how global currency code is used. v1.5 Added changes to reflect addition of new Jomres root directory definition. v1.6 PHP7 related maintenance. v1.7 Remaining globals cleanup and jr_gettext refactor related changes. v1.7 Added Shortcode related changes. v1.8  Modified code to reflect fact that currency code conversion is now a singleton. v1.9 Modified how array contents are checked. v2.9 Node/javascript path related changes. ",
			"manual_link"=>'',
			"image"=>'https://snippets.jomres.net/plugin_screenshots/jr_house.png',
            'compatability'=>['Bootstrap 2','Bootstrap 3'],
			);
		}
	}
