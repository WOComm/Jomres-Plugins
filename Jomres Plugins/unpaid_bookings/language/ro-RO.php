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


jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Gestionarea rezervărilor neplătite");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Anulați sau ștergeți rezervările provizorii (neplătite)? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Alfer câte zile de la momentul rezervării? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Acest plugin rulează automat în fundal și șterge sau anulează toate rezervările provizorii care nu sunt marcate ca plătite într-un interval la alegerea dvs. Acest lucru este util atunci când acceptați rezervări care sunt plătite folosind metode de plată offline (transfer transfer, cec). Dacă o rezervare nu este plătită în termen de X zile de la momentul în care a fost făcută rezervarea, atunci rezervarea este ștearsă sau anulată și calendarul va afișa datele rezervate ca fiind disponibile, astfel încât altcineva să poată rezerva acele zile . Când o rezervare este ștearsă sau anulată, atât dvs., cât și oaspetele veți primi o notificare prin e-mail. Dacă alegeți să anulați o rezervare, atunci rezervarea și factura acesteia vor fi marcate ca anulate și nu vor fi șterse din baza de date , astfel încât să le puteți accesa mai târziu. Dacă alegeți să îl ștergeți, atunci rezervarea și factura acesteia vor fi șterse din baza de date.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Rezervare anulată");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Rezervarea dvs. a fost anulată automat din cauza neplatei avansului necesar. Aceasta nu mai este o rezervare validă. Dacă doriți să rezervați din nou, vă rugăm să vizitați site-ul nostru web și să refaceți rezervarea. Următoarele sunt detalii rezervare anulată.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Dacă considerați că ați primit această notificare din greșeală, vă rugăm să nu ezitați să ne contactați.");