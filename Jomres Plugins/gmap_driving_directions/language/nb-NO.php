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
jr_define ('_JRPORTAL_GMAPS_DD_YES', "Ja");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Nei");
jr_define ('_GOOGLE_ADDRESS', "Adresse");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"Postnummer");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"By");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Maksimalt antall 9 veipunkter nådd");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google kunne ikke beregne veibeskrivelse for denne ruten og valgte alternativer");
jr_define('_GOOGLE_DIRECTION_PRINT',"Skriv ut veibeskrivelser");
jr_define('_GOOGLE_ROUTEPLANNING',"Planlegg ruten til ");
jr_define ('_GOOGLE_ROUTEPLANNING_HYOURLOCATION', "Din posisjon (startpunkt for ruten)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Rutealternativer");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Optimaliser for");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Kjøring");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Walking");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Sykling");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Unngå motorveier");
jr_define ('_GOOGLE_ROUTEPLANNING_HTOLLS', "Unngå bompenger");
jr_define('_GOOGLE_SELECT_BUTTON',"Få veibeskrivelse");
jr_define ('_GOOGLE_SELECT_RESETMAP', "Tilbakestill kart");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Destinasjonen din (rutens sluttpunkt) er allerede merket på kartet. Angi posisjonen din og velg rutealternativene dine for å få veibeskrivelse til destinasjonspunktet. Du kan også klikke på kartet for å velge opptil 9 veipunkter fra startpunktet til destinasjonspunktet.");