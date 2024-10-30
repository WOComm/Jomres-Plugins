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

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE', "Jednostavna rezervacija");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC', "Crne rezervacije su rezervacije koje zauzimaju sobu, sobe ili nekretninu, ali nemaju podatke o naplati ili fakturi. Obično se koriste za označavanje rezervacija izvršenih putem drugog medija (npr. telefona). Izradili biste crne rezervacije kako biste osigurali da se ti resursi tada ne mogu rezervirati na mreži, bilo od strane upravitelja nekretnine ili gosta. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM', "Morate odabrati barem jednu sobu.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED', "Uspješno rezervirano.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED', "Nije moguće rezervirati jer već ima rezervaciju u tom vremenskom okviru.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY', "Sobu blokira");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP', "Pomoću ovog kalendara lako zacrnite izvore knjiga. Odaberite sobu ili sobe, a zatim kliknite prvi i zadnji datum crne rezervacije i izvori će biti rezervirani u crnoj boji. Ako je crna rezervacija samo za jednu datum, a zatim dvaput kliknite na taj datum. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP', "Koristite ovaj kalendar za jednostavno crno knjiženje resursa. Kliknite na prvi i zadnji datum crne rezervacije i izvori će biti rezervirani crno. Ako je crna rezervacija samo za jedan datum, kliknite dvaput na taj datum . ");

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL', "Dodaj sve");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL', "Ukloni sve");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "stavke odabrane");
