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

jr_define ('PAYPAL_API_KEY_TITLE', "kľúč rozhrania Paypal API");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Konfigurujte svoje ID a tajné heslo pre Paypal pre živé aj sandboxové účty. Po nakonfigurovaní budete môcť prostredníctvom Paypalu prijímať platby za rezervácie aj faktúry.");

jr_define ('PAYPAL_API_CLIENTID', "ID klienta");
jr_define ('PAYPAL_API_SECRET', "Secret");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "ID klienta v karanténe");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Secret sandbox");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Ako zistíte svoje ID klienta a tajomstvo?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Choďte na https://developer.paypal.com/ a prihláste sa.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Prejdite na položku Moje aplikácie a poverenia v bočnej ponuke.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "kliknutím na Vytvoriť aplikáciu vytvoríte novú aplikáciu");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Pomenujte svoju aplikáciu a potom kliknite na položku Vytvoriť aplikáciu.");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "Na tejto stránke môžete vidieť svoje ID klienta a tajný kód. Skopírujte a prilepte tieto kľúče do príslušných polí vyššie.");