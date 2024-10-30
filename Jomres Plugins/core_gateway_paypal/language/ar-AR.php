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
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


jr_define ('PAYPAL_API_KEY_TITLE', "Clave API de Paypal");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "Configure su ID de cliente de Paypal y su secreto para sus cuentas en vivo y Sandbox. Una vez configurado, podrá realizar pagos de reservas y facturas a través de Paypal.");

jr_define ('PAYPAL_API_CLIENTID', "ID de cliente");
jr_define ('PAYPAL_API_SECRET', "Secreto");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "ID de cliente de Sandbox");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Secreto de Sandbox");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "¿Cómo encuentra su ID de cliente y su secreto?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'Vaya a https://developer.paypal.com/ e inicie sesión');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "Ir a Mis aplicaciones y credenciales en el menú lateral");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "haga clic en Crear aplicación para crear una nueva aplicación");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "Asigne un nombre a su aplicación, luego haga clic en Crear aplicación");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "En esta página puede ver su ID de cliente y su secreto. Copie y pegue esas claves en los campos respectivos de arriba");