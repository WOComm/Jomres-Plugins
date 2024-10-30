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

jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Upravljanje neplaćenim rezervacijama");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Otkazati ili izbrisati privremene (neplaćene) rezervacije? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Odgovorite koliko dana od vremena rezervacije?");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Ovaj dodatak radi automatski u pozadini i briše ili poništava sve privremene rezervacije koje nisu označene kao plaćene unutar intervala po vašem izboru. Ovo je korisno kada prihvaćate rezervacije koje se plaćaju izvanmrežnim načinima plaćanja (bankovno transfer, ček). Ako se rezervacija ne plati u roku od X dana od trenutka kada je rezervacija napravljena, tada se rezervacija briše ili poništava i kalendar će prikazati rezervirane datume kao dostupne, tako da netko drugi može rezervirati te dane . Kada je rezervacija izbrisana ili otkazana, i vi i gost dobit ćete obavijest e-poštom. Ako odaberete otkazati rezervaciju, tada će rezervacija i njezin račun biti označeni kao otkazani i neće biti izbrisani iz baze podataka , tako da im kasnije možete pristupiti. Ako odaberete brisanje, rezervacija i njezin račun bit će izbrisani iz baze podataka.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Rezervacija je otkazana");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Vaša je rezervacija automatski otkazana zbog neplaćanja potrebnog depozita. Ovo više nije važeća rezervacija. Ako želite ponovno rezervirati, posjetite našu web stranicu i ponovite rezervaciju. Slijede detalji otkazane rezervacije.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Ako smatrate da ste ovu obavijest primili greškom, ne ustručavajte se kontaktirati nas.");