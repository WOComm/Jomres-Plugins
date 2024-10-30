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

jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Maksājumu atgādinājumi");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Nosūtīt maksājuma atgādinājuma e-pastu..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..dienas pēc provizoriskās rezervācijas veikšanas");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Šis spraudnis darbojas automātiski fonā un nosūta maksājuma atgādinājuma e-pasta ziņojumu viesiem, kuri ir veikuši provizoriskas rezervācijas, kas nav atzīmētas kā apmaksātas jūsu izvēlētā intervālā. Tas ir noderīgi, ja pieņemat apmaksātas rezervācijas. izmantojot bezsaistes maksājumu veidus (pārskaitījums, čeks). Ja rezervācija netiek apmaksāta X dienu laikā no rezervācijas veikšanas brīža, viesim tiek nosūtīts atgādinājuma e -pasts par maksājumu. Jūs saņemsiet arī tā kopiju . Ja izmantojat arī spraudni Provisional Bookings Handling, tad pārliecinieties, vai intervāls, ar kādu vēlaties nosūtīt maksājuma atgādinājuma e-pasta ziņojumu, ir vismaz par 1 dienu mazāks nekā iestatītais neapmaksātās rezervācijas dzēšanai vai atcelšanai.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Maksājuma atgādinājums par jūsu rezervāciju vietnē ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Jums ir neapmaksāta rezervācija vietnē ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Lai nodrošinātu rezervāciju, ir jāveic depozīta maksājums ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO', "Rezervācijas numurs");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Lūdzu, sazinieties ar mums, ja vēlaties apspriest maksājuma iespējas.<br /><br />Paldies.");