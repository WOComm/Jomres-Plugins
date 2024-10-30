<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 10.5.3
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################
	jr_define('BRAINTREE_TITLE',"Braintree");
jr_define('BRAINTREE_MARKETING',"<h3>Բարձրացրեք եկամուտը Global Payments-ի գործընկերոջ հետ</h3>
Հասնել ավելի շատ գնորդների և ապահովել ավելի բարձր փոխարկումներ վճարային միակ հարթակի միջոցով, որը տրամադրում է PayPal, Venmo (ԱՄՆ-ում), վարկային և դեբետային քարտեր և հանրահայտ թվային դրամապանակներ, ինչպիսիք են Apple Pay-ը և Google Pay-ը մեկ, անխափան ինտեգրման մեջ: ");

jr_define('BRAINTREE_MERCHANT_ID',"Կենդանի վաճառողի ID");
jr_define('BRAINTREE_MERCHANT_PUBLIC_KEY',"Կենդանի հանրային բանալի");
jr_define('BRAINTREE_MERCHANT_PRIVATE_KEY',"Կենդանի անձնական բանալի");

jr_define ('BRAINTREE_API_TEST_MODE',"Փորձարկման ռեժիմ");
jr_define('BRAINTREE_API_TEST_MODE_DESC',"Եթե դուք օգտագործում եք թեստային ռեժիմ, դուք կունենաք տարբեր վաճառողի ID, հանրային և մասնավոր բանալիներ:");

jr_define('BRAINTREE_TEST_MERCHANT_ID',"Փորձարկվող վաճառողի ID");
jr_define('BRAINTREE_TEST_MERCHANT_PUBLIC_KEY',"Հանրային բանալին փորձարկել");
jr_define('BRAINTREE_TEST_MERCHANT_PRIVATE_KEY',"Փորձարկման անձնական բանալին");