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

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE', "Egyszerű foglalás");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC', "A fekete foglalások olyan foglalások, amelyek egy szobát, szobát vagy ingatlant foglalnak el, de nem tartalmaznak számlázási vagy számlázási adatokat. Általában más adathordozón (pl. telefonon) keresztül történő foglalások jelzésére szolgálnak. Fekete foglalásokat hoz létre annak biztosítása érdekében, hogy ezeket az erőforrásokat ne foglalhassa le online sem az ingatlankezelő, sem a vendég. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM', "Legalább egy szobát ki kell választania.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED', "Sikeresen lefoglalt.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED', "Nem lehetett lefoglalni, mert az adott időszakban már van foglalása.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY', "A szobát blokkolta");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP', "Használja ezt a naptárat az erőforrások egyszerű befeketítésére. Válasszon egy szobát vagy szobákat, majd kattintson a fekete foglalás első és utolsó dátumára, és az erőforrások feketén foglaltak lesznek. Ha a fekete foglalás csak egyre vonatkozik dátumot, majd kattintson kétszer erre a dátumra. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP', "Használja ezt a naptárat a könyvek egyszerű befeketítésére. Kattintson a fekete foglalás első és utolsó dátumára, és az erőforrások feketén foglaltak lesznek. Ha a fekete foglalás csak egy dátumra vonatkozik, kattintson kétszer erre a dátumra . ");

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL', "Összes hozzáadása");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL', "Összes eltávolítása");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "elemek kiválasztva");
