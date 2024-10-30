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
	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Vypsat přístupové tokeny REST API");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Tato stránka obsahuje seznam všech klientů a jejich přístupových tokenů, pokud jsou k dispozici (klienti možná nepožadovali přístupový token). To je užitečné, pokud chcete odesílat dotazy přes klienta, jako je Postman, a potřebujete přístupový token Přestože tato stránka obsahuje seznam přístupových tokenů SYSTEM, nedoporučujeme je používat. ");