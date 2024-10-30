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
jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Betalingspåminnelser");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Send betalingspåminnelse på e-post..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..dager etter at den foreløpige bestillingen ble gjort");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS', "Dette programtillegget kjøres automatisk i bakgrunnen og sender en betalingspåminnelses -e -post til gjester som foretok foreløpige bestillinger som ikke er merket som betalte innen et intervall du velger. Dette er nyttig når du godtar bestillinger som er betalt bruke offline betalingsmetoder (bankoverføring, sjekk). Hvis en bestilling ikke er betalt innen X antall dager fra tidspunktet da bestillingen ble foretatt, sendes en betalingspåminnelse på e-post til gjesten. Du vil også motta en kopi av den . Hvis du også bruker programtillegget Provisional Bookings Handling, så sørg for at intervallet du vil sende e-posten om betalingspåminnelse med er minst 1 dag lavere enn det som er satt for å slette eller kansellere den ubetalte bestillingen.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Betalingspåminnelse for bestillingen din på ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1', "Du har en ubetalt booking på");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"For å sikre bestillingen din, er det nødvendig å foreta et depositum på ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Bestillingsnummer");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3', ". Ta kontakt med oss ​​hvis du vil diskutere betalingsalternativer. <br /> <br /> Takk.");