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


jr_define('_JRPORTAL_GMAPS_DD_YES',"Ja");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Nej");
jr_define('_GOOGLE_ADDRESS',"Adress");
jr_define ('_GOOGLE_INPUT_FIELDSET_POSTALCODE', "Postnummer");
jr_define ('_GOOGLE_INPUT_FIELDSET_TOWN', "Town");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Maximalt antal 9 waypoints nått");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google kunde inte beräkna vägbeskrivningar för denna rutt och valda alternativ");
jr_define('_GOOGLE_DIRECTION_PRINT',"Skriv ut vägbeskrivningar");
jr_define('_GOOGLE_ROUTEPLANNING',"Planera din rutt till ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Din plats (ruttens startpunkt)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Ruttalternativ");
jr_define ('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR', "Optimera för");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Körning");
jr_define ('_GOOGLE_ROUTEPLANNING_HWALKING', "Walking");
jr_define ('_GOOGLE_ROUTEPLANNING_HCYCLING', "Cykling");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Undvik motorvägar");
jr_define ('_GOOGLE_ROUTEPLANNING_HTOLLS', "Undvik vägtullar");
jr_define('_GOOGLE_SELECT_BUTTON',"Få vägbeskrivning");
jr_define ('_GOOGLE_SELECT_RESETMAP', "Återställ karta");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Din destination (ruttens slutpunkt) är redan markerad på kartan. Ange din plats och välj dina ruttalternativ för att få vägbeskrivningar till destinationspunkten. Du kan också klicka på kartan för att välja upp till 9 waypoints från din startpunkt till destinationspunkten.");