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


jr_define('_JRPORTAL_GMAPS_DD_YES',"Ja");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Nej");
jr_define('_GOOGLE_ADDRESS',"Adresse");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"Postnummer");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"By");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Maksimalt antal af 9 waypoints nået");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google kunne ikke beregne rutevejledning for denne rute og valgte muligheder");
jr_define ('_GOOGLE_DIRECTION_PRINT', "Udskriv rutevejledning");
jr_define('_GOOGLE_ROUTEPLANNING',"Planlæg din rute til ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Din placering (rutens startpunkt)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Ruteindstillinger");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Optimer til");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Kørsel");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Gående");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Cykling");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Undgå motorveje");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Undgå vejafgifter");
jr_define ('_GOOGLE_SELECT_BUTTON', "Få rutevejledning");
jr_define('_GOOGLE_SELECT_RESETMAP',"Nulstil kort");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Din destination (rutens slutpunkt) er allerede markeret på kortet. Indtast venligst din placering og vælg dine ruteindstillinger for at få rutevejledning til destinationspunktet. Du kan også klikke på kortet for at vælge op til 9 waypoints fra dit startpunkt til destinationen. ");