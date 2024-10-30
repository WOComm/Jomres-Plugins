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


jr_define ('PAYPAL_API_KEY_TITLE', "Paypal API -nøgle");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Konfigurer dit Paypal -klient -id og hemmelighed for både dine live- og Sandbox -konti. Når det er konfigureret, vil du være i stand til at tage både booking og faktura betaling via Paypal.");

jr_define ('PAYPAL_API_CLIENTID', "Client ID");
jr_define ('PAYPAL_API_SECRET', "Hemmelighed");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "Sandbox Client ID");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Sandkassehemmelighed");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Hvordan finder du dit klient -id og hemmelighed?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Gå til https://developer.paypal.com/ og log ind.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Gå til Mine apps og legitimationsoplysninger i sidemenuen.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "klik på Opret app for at oprette en ny app");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Giv din app et navn, og klik derefter på Opret app.");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "På denne side kan du se dit klient -id og hemmelighed. Kopier og indsæt disse nøgler i de respektive felter ovenfor.");