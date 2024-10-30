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
jr_define ('_JRPORTAL_GMAPS_DD_NO', "Ne");
jr_define('_GOOGLE_ADDRESS',"Adresa");
jr_define ('_GOOGLE_INPUT_FIELDSET_POSTALCODE', "Poštanski broj");
jr_define ('_GOOGLE_INPUT_FIELDSET_TOWN', "Grad");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Dostignut maksimalan broj od 9 točaka");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google nije mogao izračunati upute za ovu rutu i odabrane opcije");
jr_define('_GOOGLE_DIRECTION_PRINT',"Ispis uputa");
jr_define('_GOOGLE_ROUTEPLANNING',"Planirajte svoju rutu do ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Vaša lokacija (početna točka rute)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Opcije rute");
jr_define ('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR', "Optimiziraj za");
jr_define ('_GOOGLE_ROUTEPLANNING_HDRIVING', "Vožnja");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Hodanje");
jr_define ('_GOOGLE_ROUTEPLANNING_HCYCLING', "Biciklizam");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Izbjegavajte autoceste");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Izbjegnite cestarine");
jr_define('_GOOGLE_SELECT_BUTTON',"Preuzmi upute");
jr_define('_GOOGLE_SELECT_RESETMAP',"Poništi kartu");
jr_define ('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS', "Vaše odredište (krajnja točka rute) već je označeno na karti. Unesite svoju lokaciju i odaberite opcije rute da biste dobili upute do odredišne ​​točke. Također možete kliknuti na karti da odaberete do 9 putne točke od vaše početne do odredišne ​​točke.");