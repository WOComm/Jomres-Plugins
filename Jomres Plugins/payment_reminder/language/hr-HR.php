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

jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Podsjetnici za plaćanje");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1', "Pošalji podsjetnik za plaćanje e -poštom ..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',".. dana nakon izvršene privremene rezervacije");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Ovaj dodatak radi automatski u pozadini i šalje e-poruku s podsjetnikom na plaćanje gostima da su izvršili privremene rezervacije koje nisu označene kao plaćene unutar intervala po vašem izboru. Ovo je korisno kada prihvaćate plaćene rezervacije korištenjem izvanmrežnih načina plaćanja (bankovna doznaka, ček). Ako se rezervacija ne plati u roku od X dana od trenutka kada je rezervacija napravljena, gostu se šalje e-mail s podsjetnikom na plaćanje. Također ćete dobiti njegovu kopiju . Ako također koristite dodatak za obradu privremenih rezervacija, provjerite je li interval u kojem želite poslati e-poruku s podsjetnikom za plaćanje najmanje 1 dan manji od onog postavljenog za brisanje ili otkazivanje neplaćene rezervacije.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Podsjetnik za plaćanje za vašu rezervaciju u ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Imate neplaćenu rezervaciju na ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Kako biste osigurali svoju rezervaciju, potrebno je uplatiti depozit od ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO', "Broj rezervacije");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Molimo kontaktirajte nas ako želite razgovarati o opcijama plaćanja.<br /><br />Hvala.");