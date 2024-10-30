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



jr_define ('_JRPORTAL_GMAPS_DD_YES', "Da");
jr_define ('_JRPORTAL_GMAPS_DD_NO', "Ne");
jr_define('_GOOGLE_ADDRESS',"Naslov");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"Poštna številka");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"Mesto");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Doseženo je največje število 9 točk poti");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google ni mogel izračunati navodil za to pot in izbrane možnosti");
jr_define('_GOOGLE_DIRECTION_PRINT',"Natisni navodila");
jr_define ('_GOOGLE_ROUTEPLANNING', "Načrtujte pot do");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Vaša lokacija (začetna točka poti)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Možnosti poti");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Optimiziraj za");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Vožnja");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Hoja");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Kolesarjenje");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Izogibajte se avtocestam");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Izogibajte se cestninam");
jr_define('_GOOGLE_SELECT_BUTTON',"Pridobite navodila");
jr_define('_GOOGLE_SELECT_RESETMAP',"Ponastavi zemljevid");
jr_define ('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS', "Vaš cilj (končna točka poti) je že označen na zemljevidu. Vnesite svojo lokacijo in izberite možnosti poti, da dobite navodila do ciljne točke. Če želite izbrati največ 9, kliknite tudi zemljevid točke poti od vaše začetne točke do ciljne točke.");