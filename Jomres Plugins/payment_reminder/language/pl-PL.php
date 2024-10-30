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
jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Przypomnienia o płatnościach");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Wyślij e-mail z przypomnieniem o płatności..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"dni po dokonaniu wstępnej rezerwacji");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Ta wtyczka działa automatycznie w tle i wysyła wiadomość e-mail z przypomnieniem o płatności do gości, którzy dokonali tymczasowych rezerwacji, które nie zostały oznaczone jako opłacone, w wybranym przez Ciebie przedziale. Jest to przydatne, gdy akceptujesz opłacone rezerwacje za pomocą metod płatności offline (przelew, czek). Jeśli rezerwacja nie zostanie opłacona w ciągu X dni od momentu jej dokonania, do gościa zostanie wysłana wiadomość e-mail z przypomnieniem o płatności. Otrzymasz również jego kopię Jeśli korzystasz również z wtyczki Provisional Bookings Handling, upewnij się, że interwał, z jakim chcesz wysyłać e-mail z przypomnieniem o płatności jest co najmniej 1 dzień niższy niż ustawiony na usunięcie lub anulowanie nieopłaconej rezerwacji.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Przypomnienie o płatności za rezerwację w ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Masz nieopłaconą rezerwację w ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"W celu zabezpieczenia rezerwacji konieczne jest wpłacenie zaliczki w wysokości ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Numer rezerwacji");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Jeśli chcesz omówić opcje płatności, skontaktuj się z nami.<br /><br />Dziękujemy.");