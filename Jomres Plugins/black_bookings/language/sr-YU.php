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

jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE',"Crne rezervacije 2");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC',"Crne rezervacije su rezervacije koje zauzimaju sobu, sobe ili nekretninu, ali nemaju podatke o obračunu ili fakturisanju. Obično se koriste za označavanje rezervacija koje su napravljene preko drugog medija (npr. telefona, zatim gosti koji su se javili preko oglasa ili drugog sajta...). Napravite crne rezervacije kako biste osigurali da ti resursi ne mogu biti rezervisani preko našeg portala za određene datume, bilo od strane menadžera objekta ili gosta.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM',"Morate izabrati najmanje jednu sobu.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED'," Uspešna rezervacija.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED',"  Nije moguće napraviti crnu rezervaciju jer već ima rezervacija ovom vremenskom periodu.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY',"Sobu je blokirao ");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP',"Koristite ovaj kalendar da lako označite crne rezervacije. Izaberite sobu ili sobe, a zatim kliknite na prvi i poslednji datum crne rezervacije i resursi će biti rezervisani odnosno neće biti dostupni za rezervisanje putem sajta pakujse.rs. Ako je crna rezervacija za samo jedan datum, kliknite na taj datum dva puta.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP',"Koristite ovaj kalendar da lako označite crne rezervacije. Kliknite na prvi i poslednji datum crne rezervacije i resursi će biti rezervisani odnosno neće biti dostupni za rezervisanje putem sajta pakujse.rs. Ako je crna rezervacija za samo jedan datum, kliknite na taj datum dva puta.");

jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL',"Dodaj sve");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL',"Ukloni sve");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED'," izabrano stavki");
