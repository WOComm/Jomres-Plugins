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
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE', "Vienkārša rezervācija");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC', "Melnās rezervācijas ir rezervācijas, kas aizņem telpu, istabas vai īpašumu, bet tām nav nekādu norēķinu vai rēķinu datu. Parasti tās tiek izmantotas, lai norādītu rezervācijas, kas veiktas, izmantojot citu datu nesēju (piemēram, tālruni). Jūs izveidojat melnas rezervācijas, lai nodrošinātu, ka pēc tam šos resursus nevar rezervēt tiešsaistē ne īpašuma pārvaldnieks, ne viesis. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM', "Jums jāizvēlas vismaz viena istaba.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED', "Veiksmīgi rezervēts.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED', "Nevarēja rezervēt, jo tajā jau ir rezervācija.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY', "Istabu bloķēja");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP', "Izmantojiet šo kalendāru, lai ērti rezervētu resursus. Izvēlieties istabu vai istabas, pēc tam noklikšķiniet uz melnās rezervācijas pirmā un pēdējā datuma, un resursi tiks rezervēti melnā krāsā. Ja melnā rezervācija paredzēta tikai vienam datumu, pēc tam divreiz noklikšķiniet uz šī datuma. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP', "Izmantojiet šo kalendāru, lai ērti iegrāmatotu resursus. Noklikšķiniet uz melnās rezervācijas pirmā un pēdējā datuma, un resursi tiks rezervēti melnā krāsā. Ja melnā rezervācija paredzēta tikai vienam datumam, tad noklikšķiniet uz šī datuma divreiz . ");

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL', "Pievienot visu");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL', "Noņemt visu");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "atlasīti vienumi");