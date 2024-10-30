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

jr_define ('PAYPAL_API_KEY_TITLE', "Paypal API -nøkkel");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Konfigurer din Paypal -klient -ID og hemmelighet for både live- og Sandbox -kontoene dine. Når du har konfigurert dem, kan du ta både booking og faktura via Paypal.");

jr_define ('PAYPAL_API_CLIENTID', "Klient -ID");
jr_define ('PAYPAL_API_SECRET', "Secret");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "Sandbox Client ID");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Sandbox Secret");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Hvordan finner du din klient -ID og hemmelighet?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Gå til https://developer.paypal.com/ og logg inn.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Gå til Mine apper og legitimasjon i sidemenyen.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "klikk på Opprett app for å opprette en ny app");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Gi appen et navn, og klikk deretter på Opprett app.");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "På denne siden kan du se din klient -ID og hemmelighet. Kopier og lim inn nøklene i de respektive feltene ovenfor.");