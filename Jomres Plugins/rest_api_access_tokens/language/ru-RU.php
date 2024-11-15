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

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Список токенов доступа REST API");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"На этой странице перечислены все клиенты и, если они доступны, их токены доступа (клиенты могут не запрашивать токен доступа). Это полезно, если вы хотите отправлять запросы через клиента, такого как Postman, и вам нужен токен доступа , Хотя на этой странице перечислены токены доступа SYSTEM, использовать их не рекомендуется. ");