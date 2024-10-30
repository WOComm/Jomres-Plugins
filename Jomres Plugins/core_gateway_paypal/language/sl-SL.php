<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################



jr_define ('PAYPAL_API_KEY_TITLE', "Paypal API Key");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Konfigurirajte svoj ID odjemalca in skrivnost za Paypal tako za svoj račun v živo kot za peskovnik. Ko ga konfigurirate, boste lahko sprejemali tako rezervacije kot plačila po računu preko Paypala.");

jr_define ('PAYPAL_API_CLIENTID', "ID odjemalca");
jr_define ('PAYPAL_API_SECRET', "Skrivnost");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "ID odjemalca v peskovniku");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Skrivnost peskovnika");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Kako najdete ID in skrivnost odjemalca?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Pojdite na https://developer.paypal.com/ in se prijavite.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Pojdi na Moje aplikacije in poverilnice v stranskem meniju.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "kliknite Ustvari aplikacijo za ustvarjanje nove aplikacije");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Dajte aplikaciji ime, nato kliknite Ustvari aplikacijo.");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "Na tej strani si lahko ogledate svoj ID odjemalca in skrivnost. Kopirajte in prilepite te ključe v ustrezna zgornja polja.");
