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


jr_define ('PAYPAL_API_KEY_TITLE', "Cheia API Paypal");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Configurați-vă ID-ul și secretul clientului Paypal atât pentru conturile dvs. live, cât și pentru cele Sandbox. După configurare, veți putea să efectuați atât plăți de rezervare, cât și facturi prin Paypal.");

jr_define ('PAYPAL_API_CLIENTID', "ID client");
jr_define ('PAYPAL_API_SECRET', "Secret");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "ID client Sandbox");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Sandbox Secret");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Cum îți găsești ID-ul de client și secretul?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Accesați https://developer.paypal.com/ și Conectați-vă.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Accesați aplicațiile și acreditările mele din meniul lateral.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "faceți clic pe Creați aplicație pentru a crea o aplicație nouă");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Dați un nume aplicației dvs., apoi faceți clic pe Creați aplicație");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "Pe această pagină puteți vedea ID-ul clientului și secretul. Copiați și lipiți aceste chei în câmpurile respective de mai sus.");
