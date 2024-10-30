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


jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Mementouri de plată");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1', "Trimiteți e-mail de reamintire a plății ..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..zile după efectuarea rezervării provizorii");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Acest plugin rulează automat în fundal și trimite un e-mail de memento de plată oaspeților care au făcut rezervări provizorii care nu sunt marcate ca plătite într-un interval la alegerea dvs. Acest lucru este util atunci când acceptați rezervări plătite. folosind metode de plată offline (transfer bancar, cec). Dacă o rezervare nu este plătită în termen de X zile de la momentul rezervării, atunci oaspetelui îi este trimis un e-mail de reamintire a plății. Veți primi și o copie a acesteia . Dacă utilizați și plugin-ul Provisional Bookings Handling, atunci asigurați-vă că intervalul la care doriți să trimiteți e-mailul de memento de plată este cu cel puțin 1 zi mai mic decât cel setat pentru ștergerea sau anularea rezervării neplătite.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Memento de plată pentru rezervarea dvs. la ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Aveți o rezervare neplătită la ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2', "Pentru a vă asigura rezervarea, este necesar să efectuați o depunere a plății");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO', "Număr rezervare");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Vă rugăm să ne contactați dacă doriți să discutați despre opțiunile de plată.<br /><br />Vă mulțumim.");