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


jr_define ('_PHPLIST_INSTRUCTIONS', "Este complemento integra Jomres con PHPList y le permite agregar automáticamente el nombre y el correo electrónico de los clientes a una lista de correo cuando hacen una reserva");
jr_define ('_PHPLIST_HSKIPCONFEMAIL', "¿Omitir el correo electrónico de confirmación de suscripción?");
jr_define ('_PHPLIST_HSENDHTMLEMAILS', "¿Enviar correos electrónicos HTML?");
jr_define ('_PHPLIST_HPHPLISTURL', "URL base de la página principal de PHPList");
jr_define ('_PHPLIST_HPHPLISTURL_DESC', "La URL debe tener una barra inclinada y no usar ningún parámetro en ella");
jr_define ('_PHPLIST_HUSER', "Nombre de usuario de administrador de PHPList");
jr_define ('_PHPLIST_HPASS', "PHPList contraseña de administrador");
jr_define ('_PHPLIST_HATTRIB1', "atributo1");
jr_define ('_PHPLIST_HATTRIB1_DESC', "Atributo PHPList / nombre de campo donde desea almacenar el nombre del invitado. Déjelo en blanco para ninguno.");
jr_define ('_PHPLIST_HATTRIB2', "atributo2");
jr_define ('_PHPLIST_HATTRIB2_DESC', "Atributo PHPList / nombre de campo donde desea almacenar el apellido del invitado. Déjelo en blanco para ninguno.");
jr_define ('_PHPLIST_HLIST_ID', "ID de lista de correo");