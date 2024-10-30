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

jr_define ('PAYPAL_API_KEY_TITLE', "Paypal API ključ");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Konfigurirajte svoj Paypal Client ID i Secret za svoj live i Sandbox račun. Nakon što ga konfigurirate, moći ćete primati i rezervacije i plaćanja putem Paypala.");

jr_define ('PAYPAL_API_CLIENTID', "ID klijenta");
jr_define ('PAYPAL_API_SECRET', "Tajna");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "ID klijenta u testnom okruženju");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Tajna pješčanika");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Kako pronalazite svoj ID klijenta i tajnu?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Idite na https://developer.paypal.com/ i prijavite se.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Idi na Moje aplikacije i vjerodajnice u bočnom izborniku.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "kliknite Izradi aplikaciju za izradu nove aplikacije");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Dajte aplikaciji naziv, a zatim kliknite Izradi aplikaciju.");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "Na ovoj stranici možete vidjeti svoj klijentski ID i tajnu. Kopirajte i zalijepite te ključeve u odgovarajuća polja iznad.");