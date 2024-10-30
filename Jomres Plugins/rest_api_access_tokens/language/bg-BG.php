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

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Списък с токени за достъп до REST API");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Тази страница изброява всички клиенти и, ако са налични, техните токени за достъп (клиентите може да не са поискали токен за достъп). Това е полезно, ако искате да изпращате заявки чрез клиент като Postman и имате нужда от токен за достъп Въпреки че тази страница изброява SYSTEM маркери за достъп, не се препоръчва да ги използвате. ");