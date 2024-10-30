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
	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Lista tokenów dostępu REST API");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Ta strona zawiera listę wszystkich klientów i, jeśli są dostępne, ich tokeny dostępu (klienci mogli nie prosić o token dostępu). Jest to przydatne, jeśli chcesz wysyłać zapytania przez klienta takiego jak Listonosz i potrzebujesz tokena dostępu Chociaż ta strona zawiera listę tokenów dostępu do SYSTEMU, nie zaleca się ich używania. ");