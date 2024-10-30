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

jr_define('BITPAY_TITLE',"Bitpay");
jr_define('BITPAY_MARKETING',"<h3>Accept or send Crypto payments globally</h3>
NO RISK — Never touch crypto, no fraud chargebacks<br/>
ANY WALLET — We support all crypto wallets, 90+ and growing<br/>
ANY CHANNEL — Reach hundreds of millions of customers<br/>
JUST 1% — No setup fees and no monthly minimums<br/>
GLOBAL — Access 229 countries & territories instantly" );

jr_define('BITPAY_API_TOKEN_TITLE',"API Token");
jr_define('BITPAY_TEST_API_TOKEN_TITLE',"TEST API Token");
jr_define('BITPAY_API_TOKEN_DESC',"If you do not yet have an API Token you will first need to visit one of these pages and request an API Token : For test API keys visit <a href='https://test.bitpay.com/dashboard/merchant/api-tokens' target='_blank'>here</a> and for live API keys visit <a href='https://www.bitpay.com/dashboard/merchant/api-tokens' target='_blank'>here</a>.");

jr_define('BITPAY_API_TEST_MODE',"Test mode");
jr_define('BITPAY_API_TEST_MODE_DESC',"If you are using test mode you must use an API Token created on the Bitpay test system, and for live payments, a token made on the live system.");

jr_define('BITPAY_PAYMENT_FAILED',"Payment failed!");
jr_define('BITPAY_PAYMENT_FAILED_BLURB',"Unfortunately we are unable to confirm successful payment. Please go back to the booking form and try again.");
jr_define('BITPAY_PAYMENT_FAILED_BUTTON',"Return to the Booking Form");







