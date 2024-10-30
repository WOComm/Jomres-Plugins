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

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE', "jednoduchá rezervácia");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC', "Čierne rezervácie sú rezervácie, ktoré zaberajú izbu, miestnosti alebo nehnuteľnosť, ale nemajú žiadne fakturačné alebo fakturačné údaje. Obvykle sa používajú na označenie rezervácií uskutočnených prostredníctvom iného média (napr. telefónu). Vytvorili by ste čierne rezervácie, aby ste sa uistili, že tieto zdroje potom nie je možné rezervovať online, a to ani správcom nehnuteľnosti, ani hosťom. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM', "Musíte vybrať aspoň jednu miestnosť.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED', "Úspešne rezervované.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED', "Nedalo sa rezervovať, pretože už má rezerváciu počas tohto časového rámca.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY', "Izba zablokovaná");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP', "Tento kalendár použite na ľahké vyčíslenie zdrojov v čiernej knihe. Vyberte si izbu alebo miestnosti, kliknite na prvý a posledný dátum čiernej rezervácie a zdroje budú čierne. Ak je čierna rezervácia iba na jednu. dátum, potom dvakrát kliknite na tento dátum. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP', "Použite tento kalendár na ľahké zapísanie zdrojov do čiernej knihy. Kliknite na prvý a posledný dátum čiernej rezervácie a zdroje budú čierne. Ak je čierna rezervácia iba na jeden dátum, kliknite na tento dátum dvakrát. . ");

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL', "Pridať všetko");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL', "Odstrániť všetky");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "vybrané položky");