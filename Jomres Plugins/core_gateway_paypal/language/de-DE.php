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

jr_define('PAYPAL_API_KEY_TITLE',"Paypal-API-Schlüssel");
jr_define('PAYPAL_API_KEY_TITLE_DESC',"Konfigurieren Sie Ihre Paypal-Client-ID und Ihr Paypal-Geheimnis sowohl für Ihr Live- als auch für Ihr Sandbox-Konto. Nach der Konfiguration können Sie sowohl Buchungs- als auch Rechnungszahlungen über Paypal entgegennehmen.");

jr_define('PAYPAL_API_CLIENTID',"Client-ID");
jr_define('PAYPAL_API_SECRET',"Geheimnis");
jr_define('PAYPAL_API_CLIENTID_SANDBOX',"Sandbox-Client-ID");
jr_define('PAYPAL_API_SECRET_SANDBOX',"Sandbox-Geheimnis");

jr_define('PAYPAL_API_CLIENTID_FINDING',"Wie finden Sie Ihre Client-ID und Ihr Geheimnis?");

jr_define('PAYPAL_API_CLIENTID_STEP1','Gehen Sie zu https://developer.paypal.com/ und melden Sie sich an.');
jr_define('PAYPAL_API_CLIENTID_STEP2',"Gehe zu Meine Apps und Zugangsdaten im Seitenmenü.");
jr_define('PAYPAL_API_CLIENTID_STEP3',"klicke auf App erstellen, um eine neue App zu erstellen");
jr_define('PAYPAL_API_CLIENTID_STEP4',"Geben Sie Ihrer App einen Namen und klicken Sie dann auf App erstellen.");
jr_define('PAYPAL_API_CLIENTID_STEP5',"Auf dieser Seite können Sie Ihre Client-ID und Ihr Geheimnis sehen. Kopieren Sie diese Schlüssel und fügen Sie sie in die entsprechenden Felder oben ein.");