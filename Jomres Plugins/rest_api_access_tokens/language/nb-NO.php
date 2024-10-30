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
	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Liste REST API-tilgangstokener");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Denne siden viser alle klienter og, hvis tilgjengelig, deres tilgangstokener (klienter har kanskje ikke bedt om et tilgangstoken). Dette er nyttig hvis du vil sende forespørsler gjennom en klient som Postman og du trenger et tilgangstoken Selv om denne siden viser SYSTEM-tilgangstokener, anbefales det ikke at du bruker dem. ");