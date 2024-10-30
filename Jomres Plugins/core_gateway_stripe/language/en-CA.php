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


/**
 * Jomres CMS Agnostic Plugin
 * @author Woollyinwales IT <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright    2005-2017 Woollyinwales IT
 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

jr_define('STRIPE_TITLE', "Stripe");
jr_define('STRIPE_CONNECT_CONFIG_INFO', "This Stripe gateway is designed specifically to allow you as the site manager to receive a portion of the payments made to Property Managers at booking time. Before it can be used, you must first setup your own integration with Stripe Connect. <a href='http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class='btn btn-primary'>Documentation for this plugin can be found here.</a><br/>If you click Save on this page, to enable this plugin to work seamlessly all other gateways will be disabled Before getting started, make sure that you have gone to your Stripe Connect page and indicated that you are setting up a platform. Once that has been done follow the onscreen instructions to setup your account. Before managers can Connect their account with yours you must visit Settings > Connect Settings and in the \"OAuth settings\" area enabled OAuth for Standard Accounts and then click Save (note, you will need to do this in both Test and Live modes). ");

jr_define('STRIPE_REGISTER_CONNECT', "Connect with us!");
jr_define('STRIPE_REGISTER_CONNECT_BLURB', "You've registered, but the connection isn't complete yet. You need to connect your Stripe account with our website. Once that's done, you can add all of your properties to our site and start taking bookings.");

jr_define('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Welcome to ");
jr_define('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Before you can start setting your property(s) up, you need to connect us with your Stripe account. Click on the link to get started.");

jr_define('STRIPE_SETUP_INFO', "We now need to connect your account to ours, this will allow us to take payments on your behalf so click the Connect button to be taken to Stripe where you can confirm the connection.");
jr_define('STRIPE_SETUP_DONE', "You are already connected with us, nothing more to do here! Close this window and let's get on with the business of doing business.");
jr_define('STRIPE_SETUP_THANKS', "Thank you for connecting with us! You can close this window now.");
jr_define('STRIPE_SETUP_DISCONNECT', "Disconnect your account.");
jr_define('STRIPE_SETUP_DISCONNECTED', "Account disconnected, you can close this window now.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Stripe Connect Client ID");
jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "You can get your Stripe Client ID from your <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>Dashboard > Settings > Connect . API keys are under the Developers menu option.</a>");
jr_define('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Please ensure that you set your Redirect URI in <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>Connect > Settings</a> to <br/> ");

jr_define('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Secret key");
jr_define('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Public key");

jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Your Commission");
jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "This commission is taken from the payment sent to the property manager at booking time. It is then placed into your Stripe account by Stripe. <br/> This is the percentage of commission you will charge property managers for their bookings. Your commission is charged based on the ENTIRE cost of the booking, not the deposit value. <br/> Whatever you set this value to, we recommend that you configure Site Configuration ->Booking Form -> Minimum Deposit figure to be at least twice this figure, so if you want to charge 10% commission, then you should make Minimum Deposit be 20%.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "This is the percentage that Stripe charges you for making payments on your site. Currently they charge 1.4% for European Cards, and 2.9% for non-European cards. This figure is required for determining prices at booking and payment time.");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Stripe Fee non-euro");

jr_define('STRIPE_PAYMENT_FORM_CREDITCARD', "Card Number");
jr_define('STRIPE_PAYMENT_FORM_EXPIRATION', "Expiration (MM/YY)");
jr_define('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define('STRIPE_PAYMENT_FORM_ZIP', "Billing Zip");

jr_define('STRIPE_PAYMENT_FORM_SECURE', "Secure Payment Form");
jr_define('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Billing Details");
jr_define('STRIPE_PAYMENT_FORM_CARDDETAILS', "Card Details");
jr_define('STRIPE_PAYMENT_FORM_HOLDER', "Card Holder's Name");
jr_define('STRIPE_PAYMENT_FORM_PAYNOW', "Pay now");
jr_define('STRIPE_PAYMENT_FORM_TOPAY', "To pay now");

jr_define('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'The street is required and cannot be empty');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'The street must be more than 6 and less than 96 characters long');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'The city is required and cannot be empty');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'The zip is required and cannot be empty');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'The zip must be more than 3 and less than 12 characters long');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'The email address is required and can\'t be empty');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'The input is not a valid email address');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'The email must be more than 6 and less than 65 characters long');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'The card holder name is required and can\'t be empty');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'The card holder name must be more than 6 and less than 70 characters long');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'The credit card number is required and can\'t be empty');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'The credit card number is invalid');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'The expiration month is required');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'The expiration month can contain digits only');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'The expiration year is required');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'The expiration year can contain digits only');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'The cvv is required and can\'t be empty');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'The value is not a valid CVV');

jr_define('STRIPE_PAYMENT_FAILED', "Sorry, we were unable to process your payment at this time.");
jr_define('STRIPE_PAYMENT_TRY_AGAIN', "Please try again");

jr_define('STRIPE_PAYMENT_ERROR_DECLINED', "Payment was declined.");
jr_define('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Too many requests made to the API too quickly");
jr_define('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Invalid parameters were supplied to Stripe's API");
jr_define('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Authentication with Stripe's API failed");
jr_define('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Network communication with Stripe failed (has your internet connection dropped out?)");
jr_define('STRIPE_PAYMENT_ERROR_UNCAUGHT', "An uncaught error occured");



