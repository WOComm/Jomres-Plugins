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

jr_define ('PAYPAL_API_KEY_TITLE', "Paypal API -kulcs");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Állítsa be Paypal ügyfélazonosítóját és titkát mind az élő, mind a Sandbox -fiókjához. Miután konfigurálta, a foglalás és a számla kifizetését is elvégezheti a Paypalon keresztül.");

jr_define ('PAYPAL_API_CLIENTID', "Ügyfél -azonosító");
jr_define ('PAYPAL_API_SECRET', "Titkos");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "Sandbox ügyfél -azonosító");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Sandbox Secret");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Hogyan találja meg ügyfél -azonosítóját és titkát?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Ugrás a https://developer.paypal.com/ oldalra és jelentkezzen be.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Ugrás a Saját alkalmazásokhoz és hitelesítő adatokhoz az oldalsó menüben.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "kattintson az Alkalmazás létrehozása gombra új alkalmazás létrehozásához");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Adjon nevet az alkalmazásának, majd kattintson az Alkalmazás létrehozása elemre").
jr_define ('PAYPAL_API_CLIENTID_STEP5', "Ezen az oldalon láthatja ügyfél -azonosítóját és titkát. Másolja és illessze be ezeket a kulcsokat a fenti megfelelő mezőkbe.");