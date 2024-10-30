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

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Список токенів доступу REST API");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Ця сторінка містить список усіх клієнтів і, якщо доступно, їхні маркери доступу (клієнти, можливо, не запитували маркер доступу). Це корисно, якщо ви хочете надсилати запити через клієнт, як-от Postman, і вам потрібен маркер доступу . Хоча на цій сторінці перераховано маркери доступу SYSTEM, не рекомендується їх використовувати. ");