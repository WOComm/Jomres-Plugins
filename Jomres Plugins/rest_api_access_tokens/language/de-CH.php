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
	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"REST-API-Zugriffstoken auflisten");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Diese Seite listet alle Clients und, falls verfügbar, ihre Zugriffstoken auf (Clients haben möglicherweise kein Zugriffstoken angefordert). Dies ist nützlich, wenn Sie Abfragen über einen Client wie Postman senden möchten und ein Zugriffstoken benötigen Obwohl auf dieser Seite SYSTEM-Zugriffstoken aufgeführt sind, wird deren Verwendung nicht empfohlen. ");