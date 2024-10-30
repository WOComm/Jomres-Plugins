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

jr_define ('PAYPAL_API_KEY_TITLE', "Clau API Paypal");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Configureu el vostre identificador de client i secret de Paypal per al vostre compte en viu i Sandbox. Un cop configurat, podreu fer els pagaments de reserva i de factures a través de Paypal.");

jr_define ('PAYPAL_API_CLIENTID', "Identificador de client");
jr_define ('PAYPAL_API_SECRET', "Secret");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "Identificador de client Sandbox");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Sandbox Secret");

jr_define ("PAYPAL_API_CLIENTID_FINDING", "Com trobeu el vostre identificador de client i secret?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Aneu a https://developer.paypal.com/ i inicieu la sessió');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Aneu a Les meves aplicacions i credencials al menú lateral.");
jr_define ("PAYPAL_API_CLIENTID_STEP3", "feu clic a Crea aplicació per crear una nova aplicació");
jr_define ("PAYPAL_API_CLIENTID_STEP4", "Doneu un nom a la vostra aplicació i feu clic a Crea aplicació");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "En aquesta pàgina podeu veure el vostre identificador de client i secret. Copieu i enganxeu aquestes claus als respectius camps anteriors.");