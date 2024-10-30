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

jr_define('STRIPE_STANDARD_TITLE',"Stripe Standard");
jr_define('STRIPE_STANDARD_MARKETING',"" );

jr_define('STRIPE_STANDARD_API_TOKEN_DESC',"If you do not yet have API Keys you will first need to visit this page and get an API token  <a href='https://dashboard.stripe.com/developers' target='_blank'>API key pair</a>");

jr_define('STRIPE_STANDARD_API_TEST_MODE',"Test mode");
jr_define('STRIPE_STANDARD_API_TEST_MODE_DESC',"When set to Yes then your Test API keys will be used.");

jr_define('STRIPE_STANDARD_API_LIVE_PUBLISHABLE_KEY_TITLE',"Live Publishable key");
jr_define('STRIPE_STANDARD_API_LIVE_SECRET_KEY_TITLE',"Live Secret key");

jr_define('STRIPE_STANDARD_API_TEST_PUBLISHABLE_KEY_TITLE',"Test Publishable key");
jr_define('STRIPE_STANDARD_API_TEST_SECRET_KEY_TITLE',"Test Secret key");

	jr_define('STRIPE_STANDARD_PAYMENT_FAILED',"Payment failed!");
jr_define('STRIPE_STANDARD_PAYMENT_FAILED_BLURB',"Unfortunately we are unable to confirm successful payment. Please go back to the booking form and try again.");
jr_define('STRIPE_STANDARD_PAYMENT_FAILED_BUTTON',"Return to the Booking Form");




