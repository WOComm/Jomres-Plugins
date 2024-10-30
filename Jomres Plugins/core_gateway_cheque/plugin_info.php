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

class plugin_info_core_gateway_cheque
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"core_gateway_cheque",
			"category"=>"Payment handling",
			"marketing"=>"Adds the 'cheque' gateway to the system, allowing guests who're booking to get the property's details for sending a cheque to pay for their deposit.",
			"version"=>(float)"3.8",
			"description"=> " Adds the 'cheque' gateway to the system, allowing guests who're booking to get the property's details for sending a cheque to pay for their deposit.",
			"lastupdate"=>"2022/09/26",
			"min_jomres_ver"=>"10.3.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/15-core-plugins/46-core-gateway-cheque',
			'change_log'=>'v1.1 submit button made translatable. 1.2 Fixed a broken url v1.3 added code to prevent buttons being clicked twice. v1.4 Reversed the previous change as it does not work on Chrome. v1.5 Changed how the url to the configuration window is constructed. Added support for double-click prevention. v1.6 Removed references to Token functionality that is no longer used. v1.7 Added functionality to support new Jomres management view code. v1.8 modified cheque plugin to use a dedicated manager contact details if available (super property manager details will not be used if a non-super managers details are not available). v1.9 bug fixed an issue from the previous, test, release. v2.1 Added Subscription specific functionality v2.2 PHP7 related maintenance. v2.3 Remaining globals cleanup and jr_gettext refactor related changes. v2.4 User role related updates. v2.5 More Role related adjustments. v2.6 Notices fixes. v2.7 Fixed notices. v2.8 Added changes supporting 9.8.30 minicomponent registry changes v2.9 Save plugin task changed. v3.0 Subscription related functionality updated v3.1 Modified how array contents are checked. v3.2 Modified how region names are determined. v3.3 Modified so that popup shows gateway name as passed thru jr gettext so that it is translated where appropriate. v3.4 Removed a call to an obsoleted function. v3.5 Plugin updated to work with Jomres data encryption of user details. v3.6 CSRF hardening added. v3.7 Updated plugin to give it BS version specific templates and make sure that the choice to pay by cheque is added to the booking notes. v3.8 Updated to work with 10.5.4',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_4plis.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
