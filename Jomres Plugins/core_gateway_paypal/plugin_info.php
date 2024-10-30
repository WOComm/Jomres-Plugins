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

class plugin_info_core_gateway_paypal
	{
	function __construct()
	{
		$this->data=array(
			"name"=>"core_gateway_paypal",
			"category"=>"Payment handling",
			"marketing"=>" Adds paypal gateway functionality. Apart from ordinary deposit payments, this plugin is required if you want to use the subscription functionality. Once installed you can either allow individual properties to setup their own Paypal settings, or you can override that and force all properties to pay into one central Paypal account.",
			"version"=>(float)"6.6",
			"description"=> " Adds paypal gateway functionality. Apart from ordinary deposit payments, this plugin is required if you want to use the subscription functionality.",
            "lastupdate"=>"2023/03/29",
            "min_jomres_ver"=>"9.25.2",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/173-edit-gateway-paypal',
			'change_log'=>'v3.4 added Paypal SDK and enabled handling of invoice payments. v3.5 Added functionality to support payments of booking invoices. v3.5 Modified invoice_payment_send.class.php, disabled optional line item addition to Paypal payment when paying invoices. For reasons best known to Paypal, a previously paid transaction item (e.g. deposit ) with a negative figure is not a valid line item and will cause a 400 error from Paypal, even though the balance works out as correct. v3.6 fixed a version number issue. v3.7 PHP7 related maintenance. v3.8 changed how the currency code is determined. v3.9 Updated PP SDK to allow for better determination of SSL level when talking to the remote server. v4.0 Added code to output error messages if sandbox enabled when sending payment information to Paypal. v4.1 Jomres 9.7.4 related changes v4.2 Remaining globals cleanup and jr_gettext refactor related changes. v4.3 Added some defaults to prevent notice level errors. v4.4 Notice fixes. v4.5 Removed TLS check due to throttling. v4.6 General maintenance plus updating logging to use Monolog. v4.7 User role related updates. v4.8 Notices fixes. v4.9 Fixed a notice and improved error responses re incorrect API keys. v5.0 Added changes supporting 9.8.30 minicomponent registry changes v5.1 Save plugin task changed. v5.2 Subscription related functionality updated v5.3 Modified how array contents are checked. v5.4 API key instructions updated. v5.5 Plugin updated to add transaction id to showtime. v5.6 Implemented a change that resolves an issue created by Paypal https://github.com/paypal/PayPal-PHP-SDK/pull/1152 v5.7 CSRF hardening added. v5.8 French language file added. v5.9 Resolved an issue with rounding that causes PP to throw an error. v6.0 BS4 template set added v6.1 Italian language file added, thanks Nicola v6.2  Language files updated v6.3  Fixed issue affecting WordPress forms v6.4 Bootstrap 5 template set added. v6.5 Documentation updated. v6.6 Fix bug in paypal sdk for php8',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-02_vzv9c.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
