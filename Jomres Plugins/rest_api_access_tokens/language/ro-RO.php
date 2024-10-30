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

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Listați jetoanele de acces API REST");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Această pagină listează toți clienții și, dacă sunt disponibile, token-urile lor de acces (clienții s-ar putea să nu fi solicitat un token de acces). Acest lucru este util dacă doriți să trimiteți interogări printr-un client precum Postman și aveți nevoie de un token de acces . Deși această pagină listează jetoane de acces SISTEM, nu este recomandat să le utilizați.");