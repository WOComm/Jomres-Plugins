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

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Popis REST API tokena za pristup");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Ova stranica navodi sve klijente i, ako su dostupni, njihove pristupne tokene (klijenti možda nisu zatražili pristupni token). Ovo je korisno ako želite slati upite preko klijenta kao što je Postman i trebate pristupni token . Iako ova stranica navodi SUSTAVNE pristupne tokene, ne preporučuje se da ih koristite. ");