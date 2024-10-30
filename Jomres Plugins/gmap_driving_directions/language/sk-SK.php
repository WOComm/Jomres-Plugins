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

jr_define('_JRPORTAL_GMAPS_DD_YES',"Áno");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Nie");
jr_define('_GOOGLE_ADDRESS',"Adresa");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"PSČ");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"Mesto");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Dosiahnutý maximálny počet 9 trasových bodov");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google nedokázal vypočítať trasu pre túto trasu a vybraté možnosti");
jr_define('_GOOGLE_DIRECTION_PRINT',"Vytlačiť trasu");
jr_define('_GOOGLE_ROUTEPLANNING',"Naplánujte si trasu do ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Vaša poloha (východiskový bod trasy)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Možnosti trasy");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Optimalizovať pre");
jr_define ('_GOOGLE_ROUTEPLANNING_HDRIVING', "Jazda");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Chôdza");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Cyklistika");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Vyhýbajte sa diaľniciam");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Vyhnite sa mýtam");
jr_define('_GOOGLE_SELECT_BUTTON',"Získať trasu");
jr_define('_GOOGLE_SELECT_RESETMAP',"Resetovať mapu");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Váš cieľ (koncový bod trasy) je už vyznačený na mape. Zadajte svoju polohu a vyberte si možnosti trasy, aby ste získali trasu k cieľovému bodu. Môžete tiež kliknúť na mapu a vybrať si až 9 trasové body z vášho východiskového bodu do cieľového bodu. ");