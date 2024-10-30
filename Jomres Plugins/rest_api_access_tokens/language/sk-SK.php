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

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Vypísať prístupové tokeny REST API");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Táto stránka obsahuje zoznam všetkých klientov a ak sú k dispozícii, ich prístupové tokeny (klienti možno nepožiadali o prístupový token). Toto je užitočné, ak chcete posielať dopyty cez klienta ako Postman a potrebujete prístupový token Hoci táto stránka obsahuje zoznam prístupových tokenov SYSTEM, neodporúča sa, aby ste ich používali. ");