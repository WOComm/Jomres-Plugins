<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define('_SUBSCRIPTIONS_ACTIVE',"Active");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Not active");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Payment status");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Level");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Edit subscription");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Send subscription expiration reminder email?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Send reminder email");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"days before the subscription will expire");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Send email when subscription expired?");
jr_define('_SUBSCRIPTIONS_MY',"My subscriptions");
jr_define('_SUBSCRIPTIONS_HRENEW',"Renew");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Subscription renewal");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"You have already subscribed, please purchase a renewal instead.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Edit subscription package");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Type the first few letters of the username and you`ll see a dropdown with usernames. Click on a username to select it.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"This subscription package is no longer available so it can`t be renewed, please consider upgrading it.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"You are not subscribed to this package so you can`t renew it.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"There are no renewal options for this package");
jr_define('_SUBSCRIPTIONS_CANCEL',"Cancel subscription");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Frequency (days)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Subscription length in days");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Renewals not allowed for this package.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Renewal price");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Set this to 0 to disable renewals for this package or enter a price for the renewal");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Package options");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Package details");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Your subscription package");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Your subscription package doesn`t include access to this feature. To use this feature, you`ll need to upgrade your subscription.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Your subscription has expired and all your listings have been unpublished. Your listings are not visible to guests anymore and your won`t be able to receive online bookings from our website anymore. To continue using our services, publish your listings and start receiving online bookings, please login to your account and purchase a renewal." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Your subscription at" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"has expired" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"This is a notification to let you know that your subscription will expire soon. To continue using our services, please login to your account and purchase a renewal." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Subscription packages" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Name" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Description" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Published" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Frequency" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Price" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Business limit" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Maximum number of businesses that can be added with this subscription package" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Subscribe" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Use subscription handling functionality" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Sorry, but that package ID is not recognised." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"You don't seem to have filled in your account details yet. To list your property on the site, we need you to complete your account details before we can go further." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"You have used all property slots available in your subscription package, so you won`t be able to create any new listings. Please upgrade your package if you`d like to create more listings." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Income by year/month");
jr_define('_SUBSCRIPTION_WARNING',"You`ve enabled subscriptions but looks like you haven`t created any subscription packages yet. Owners won`t be able to register properties on your site until at least one suscription package is created.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API Access" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"You can access this feature by upgrading to the " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Subscription Package. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Upgrade');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Subscribed');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Subscription gateway settings');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'You are not currently subscribed to any subscription packages. Please subscribe to a package to continue using our services.');
