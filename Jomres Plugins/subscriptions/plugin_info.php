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

class plugin_info_subscriptions
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"subscriptions",
			"category"=>"Monetisation",
			"marketing"=>"Subscripton packages can be created which allow site admins to charge property managers for listing their properties on their site.",
			"version"=>(float)"6.3",
			"description"=> "Adds functionality that allows site managers to create subscription packages and subscriptions, and forces property managers to subscribe to list their properties on the site.",
            "lastupdate"=>"2023/06/04",
            "min_jomres_ver"=>"10.7.0",
			"manual_link"=>'http://www.jomres.net/manual/site-managers-guide/20-control-panel/income-generation/300-subscription-packages',
			'change_log'=>' 1.1 updated for use in v5.6 1.2 modified subscriptions list to show usernames. 1.3 updated to work with Jr7.1 v1.4 Removed references to Jomres URL Token function. v1.5 Reordered button layout. v1.6 Added changes to reflect addition of new Jomres root directory definition. v2 Subscription functionality completely re-written for Jomres 9. v2.1 Added searching for usernames in the Add Subscription page. v2.2 fixed an issue where the price of a subscription in "my subscriptions" could be displayed incorrectly when using a different currency. v2.3 added some missing templates that were missed out of the last version. v2.4 PHP7 related maintenance. v2.4 Added subscription related charting scripts. v2.6 Property list limit subs plugin added because property creation functionality has been re-added to Core. v2.7 Jomres 9.7.4 related changes v2.8 Jomres 9.7.4 related changes v2.9 Remaining globals cleanup and jr_gettext refactor related changes. 3.0 Added changes that pertain to NO ZERO NUMBER updates to the database. v3.1 User role related updates. v3.2 New feature that allows subscriptions to offer access to email templates, to have email templates as an option in subscription packages. v3.3 Notices fixes. v3.4 Added changes supporting 9.8.30 minicomponent registry changes v3.5 Registration task changed. v3.6 Task names updated. v3.7 Advanced Site Config flag removed. v3.8 Modified how admin menu is generated. v3.8 Menu options updated for menu refactor in v9.8.30 v4.0 Subscription related functionality updated v4.1 Modified how array contents are checked. v4.2 Added some defaults. v4.3 Changed how variables are detected. v4.4 Updated chart related code. v4.5 Added ability for API and Webhooks to be able to be added to subscription plans. v4.6 Node/javascript path related changes. v4.7 Plugin updated to work with Jomres data encryption of user details. v4.7 Use of "secret" in cron tasks removed. It is not necessary and is unreliable. v4.9 CSRF hardening added. v5.0 added jr_base64url_encode to the save_subscription redirect url so that post edit_account redirects can happen correctly on all servers. v5.1 French language file added v5.2 Improved how an empty list is handled. v5.3 BS4 template set added v5.4 Italian language file added, thanks Nicola  v5.5 Language files updated v5.6 Bootstrap 5 template set added. v5.7 Edit package template updated to not use tabs in BS5. v5.8 Select list markup changes. v6.0 Significant rewrite to make use of Stripe subscriptions functionality. v6.1 Minor output improvements in My Subs page. v6.2 Changed how Packages are associated with Stripe packages, allow Subscription descriptions to be stored in markup format. v6.3 Enabled property number limits to be part of a subscription package. ',
			'highlight'=>'Stripe subscriptions only. Make sure to visit the Plugins Information page first and read about this plugin before attempting to setup subscriptions. You need to ensure that you have entered valid API keys for Stripe before doing anything else.',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_jzvp4.png',
			'demo_url'=>'',
			'compatability'=>['Bootstrap 5'],
			'free'=>true,
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
