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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################




jr_define('_JRPORTAL_GMAPS_DD_YES',"Ja");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Nee");
jr_define('_GOOGLE_ADDRESS',"Adres");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"Postcode");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"Stad");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Maximaal aantal van 9 bereikte waypoints");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google kon de routebeschrijving voor deze route en geselecteerde opties niet berekenen");
jr_define('_GOOGLE_DIRECTION_PRINT',"Print routebeschrijving");
jr_define('_GOOGLE_ROUTEPLANNING',"Plan je route naar ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Uw locatie (startpunt route)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Route-opties");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Optimaliseren voor");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Rijden");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Wandelen");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Fietsen");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Vermijd snelwegen");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Vermijd tolgelden");
jr_define('_GOOGLE_SELECT_BUTTON',"Routebeschrijving");
jr_define('_GOOGLE_SELECT_RESETMAP',"Reset kaart");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Uw bestemming (eindpunt van de route) is al gemarkeerd op de kaart. Voer uw locatie in en kies uw route-opties om een ​​routebeschrijving naar het bestemmingspunt te krijgen. U kunt ook op de kaart klikken om maximaal 9 te kiezen tussenpunten van uw startpunt naar het bestemmingspunt.");