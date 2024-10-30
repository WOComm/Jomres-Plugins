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
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Konfigurujte své ID a tajné ID klienta Paypal pro svůj živý i Sandbox účet. Jakmile budete nakonfigurováni, budete moci přijímat platby za rezervace i faktury přes Paypal.");

jr_define ('PAYPAL_API_CLIENTID', "ID klienta");
jr_define ('PAYPAL_API_SECRET', "Secret");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "ID klienta sandboxu");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Sandbox Secret");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "Jak zjistíte své ID klienta a tajný klíč?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Přejít na https://developer.paypal.com/ a přihlásit se.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Přejít na Moje aplikace a přihlašovací údaje v postranní nabídce.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "kliknutím na Vytvořit aplikaci vytvoříte novou aplikaci");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Pojmenujte svou aplikaci a poté klikněte na Vytvořit aplikaci.");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "Na této stránce můžete vidět své ID klienta a tajný klíč. Zkopírujte a vložte tyto klíče do příslušných polí výše.");