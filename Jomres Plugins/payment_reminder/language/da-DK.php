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


jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Betalingspåmindelser");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1', "Send betalingspåmindelses -e -mail ..");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2', ".. dage efter den midlertidige reservation blev foretaget");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Dette plugin kører automatisk i baggrunden og sender en betalingspåmindelses-e-mail til gæster, der har foretaget foreløbige reservationer, der ikke er markeret som betalte inden for et interval efter eget valg. Dette er nyttigt, når du accepterer bookinger, der er betalt ved brug af offline betalingsmetoder (bankoverførsel, check). Hvis en reservation ikke betales inden for X antal dage fra det tidspunkt, hvor reservationen blev foretaget, sendes en betalingspåmindelse til gæsten. Du vil også modtage en kopi af den . Hvis du også bruger plugin'et Provisional Bookings Handling, så sørg for, at det interval, hvormed du vil sende betalingspåmindelses-e-mailen, er mindst 1 dag lavere end det, der er angivet til at slette eller annullere den ubetalte reservation.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Betalingspåmindelse for din reservation på ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1', "Du har en ubetalt reservation på");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"For at sikre din reservation, er det nødvendigt at foretage et depositum på ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Booking nummer");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Kontakt os venligst, hvis du ønsker at diskutere betalingsmuligheder.<br /><br />Tak.");