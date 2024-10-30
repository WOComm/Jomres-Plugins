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


jr_define('_JRPORTAL_GMAPS_DD_YES',"Da");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Ne");
jr_define('_GOOGLE_ADDRESS',"Adresa");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"Poštanski broj");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"Grad");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Maksimalan broj od 9 putnih tačaka dostignut");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google ne može izračunati rutu na osnovu izabranih opcija");
jr_define('_GOOGLE_DIRECTION_PRINT',"Štampaj rutu");
jr_define('_GOOGLE_ROUTEPLANNING',"Planirajte svoju rutu do ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Vaša lokacija (tačka odakle polazite)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Opcije rute");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Optimizuj za");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Automobil");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Pešačenje");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Bicikl");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Izbegni autoputeve");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Izbegni putarinu");
jr_define('_GOOGLE_SELECT_BUTTON',"Kreni");
jr_define('_GOOGLE_SELECT_RESETMAP',"Resetuj mapu");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Vaše odredište (krajnja tačka rute) je već označeno na mapi. Unesite svoju lokaciju i odaberite opcije rute da biste dobili uputstva do odredišne tačke. Takođe možete kliknuti na mapu da odaberete do 9 putnih tačaka od vaše početne do odredišne tačke.");