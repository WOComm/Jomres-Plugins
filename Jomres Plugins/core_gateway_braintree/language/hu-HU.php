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
	jr_define('BRAINTREE_MARKETING',"<h3>Növelje bevételét egy globális fizetési partnerrel</h3>
Érjen el több vásárlót, és növelje a konverziót az egyetlen fizetési platformmal, amely egyetlen, zökkenőmentes integrációban kínálja a PayPal-t, a Venmo-t (az Egyesült Államokban), a hitel- és betéti kártyákat, valamint a népszerű digitális pénztárcákat, mint az Apple Pay és a Google Pay. " );

	jr_define('BRAINTREE_MERCHANT_ID',"Élő kereskedőazonosító");
	jr_define('BRAINTREE_MERCHANT_PUBLIC_KEY',"Élő nyilvános kulcs");
	jr_define('BRAINTREE_MERCHANT_PRIVATE_KEY',"Élő privát kulcs");

	jr_define('BRAINTREE_API_TEST_MODE',"Teszt mód");
	jr_define('BRAINTREE_API_TEST_MODE_DESC',"Ha teszt módot használ, más kereskedői azonosítója, nyilvános és privát kulcsa lesz.");

	jr_define('BRAINTREE_TEST_MERCHANT_ID',"Teszt kereskedőazonosító");
	jr_define('BRAINTREE_TEST_MERCHANT_PUBLIC_KEY',"Nyilvános kulcs tesztelése");
	jr_define('BRAINTREE_TEST_MERCHANT_PRIVATE_KEY',"Privát kulcs tesztelése");