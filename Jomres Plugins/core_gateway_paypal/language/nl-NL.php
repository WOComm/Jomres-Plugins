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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################



jr_define('PAYPAL_API_KEY_TITLE',"Paypal API-sleutel");
jr_define('PAYPAL_API_KEY_TITLE_DESC',"Configureer uw Paypal-client-ID en geheim voor zowel uw live- als Sandbox-accounts. Eenmaal geconfigureerd, kunt u zowel boekings- als factuurbetalingen via Paypal accepteren.");

jr_define('PAYPAL_API_CLIENTID',"Cliënt-ID");
jr_define('PAYPAL_API_SECRET',"Geheim");
jr_define('PAYPAL_API_CLIENTID_SANDBOX',"Sandbox-client-ID");
jr_define('PAYPAL_API_SECRET_SANDBOX',"Sandbox-geheim");

jr_define('PAYPAL_API_CLIENTID_FINDING',"Hoe vind je je klant-ID en geheim?");

jr_define('PAYPAL_API_CLIENTID_STEP1','Ga naar https://developer.paypal.com/ en log in.');
jr_define('PAYPAL_API_CLIENTID_STEP2',"Ga naar Mijn apps en inloggegevens in het zijmenu.");
jr_define('PAYPAL_API_CLIENTID_STEP3',"klik op App maken om een ​​nieuwe app te maken");
jr_define('PAYPAL_API_CLIENTID_STEP4',"Geef uw app een naam en klik vervolgens op Maak app.");
jr_define('PAYPAL_API_CLIENTID_STEP5',"Op deze pagina kunt u uw klant-ID en geheim zien. Kopieer en plak die sleutels in de respectievelijke velden hierboven.");
