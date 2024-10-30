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

class plugin_info_qr_code_vcard
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"qr_code_vcard",
			"category"=>"Property Details Enhancements",
			"marketing"=>"Adds a QR code vcard tab to the property details page with information about the property's manager/agent.",
			"version"=>(float)"2.0",
			"description"=> "Adds a QR code vcard tab to the property details page with information about the property's manager/agent.",
			"lastupdate"=>"2022/08/03",
			"min_jomres_ver"=>"9.11.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/96-qr-code-vcard',
			'change_log'=>'v1.1 Modified plugin so that it uses the new qr code generation feature. v1.2 Added changes to reflect addition of new Jomres root directory definition.v1.3 PHP7 related maintenance. v1.4 jr_gettext tweaks. v1.5 Fixed some notices. v1.6 Modified functionality to use new get_property_details_url function. v1.7 Modified how array contents are checked. v1.8 Node/javascript path related changes. v1.9 Plugin updated to work with Jomres data encryption of user details. v2.0 Updated to fix errant tabs and documentation updated. ',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_neg4n.png',
			'demo_url'=>'',
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
