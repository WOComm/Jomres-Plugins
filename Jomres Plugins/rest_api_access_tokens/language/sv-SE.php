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

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Lista REST API-åtkomsttokens");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Denna sida listar alla klienter och om de är tillgängliga, deras åtkomsttoken (klienter kanske inte har begärt en åtkomsttoken). Detta är användbart om du vill skicka frågor via en klient som Postman och du behöver en åtkomsttoken Även om den här sidan listar SYSTEM-åtkomsttokens, rekommenderas det inte att du använder dem. ");