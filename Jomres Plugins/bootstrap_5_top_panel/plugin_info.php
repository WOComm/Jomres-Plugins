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

class plugin_info_bootstrap_5_top_panel
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"bootstrap_5_top_panel",
			"category"=>"Site Building Tools",
			"version"=>(float)"2.2",
			"description"=> 'Show currency selector, language selector and add your own listing links. Ideal for top menu position. Remember to save your Open Exchange Rates API key, and also enable the currency conversion functionality in the Site Config "Currency conversion" tab. You can determine which languages are shown through the Site Config "Choose languages" tab however you must also setup your CMS to work as a multi-language site. Jomres does not install other languages for you.',
			"type"=>"module",
			"lastupdate"=>"2023/01/16",
			"min_jomres_ver"=>"10.6.0",
			"manual_link"=>'',
			'change_log'=>' v1.1 Markup improved v1.2 Fixed a notice v1.3 Disable language selector in Joomla, you need to just Joomla\s v1.7 Improved behaviour WRT single property sites. v1.4 Updated WP login url. v1.5 Fix a notice. v1.6 Set a default if for some reason WP does not return a valid response to a function call. v1.8 Documentation updated v1.9  Do not show if menuoff is in the url v2.0 changed how the new property url is built v2.1 Markup improvements v2.2 Removed lang from urls and changed how home url is determined to fix new property link issues.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}