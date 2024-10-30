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

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"List REST API-adgangstokens");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Denne side viser alle klienter og, hvis de er tilgængelige, deres adgangstokens (klienter har muligvis ikke anmodet om et adgangstoken). Dette er nyttigt, hvis du vil sende forespørgsler gennem en klient som Postman, og du har brug for et adgangstoken Selvom denne side viser SYSTEM-adgangstokens, anbefales det ikke, at du bruger dem. ");