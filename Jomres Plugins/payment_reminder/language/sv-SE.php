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


jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Betalningspåminnelser");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1', "Skicka e -post med betalningspåminnelse ..");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2', ".. dagar efter att den preliminära bokningen gjordes");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Detta plugin körs automatiskt i bakgrunden och skickar ett e-postmeddelande om betalningspåminnelse till gäster som har gjort preliminära bokningar som inte markerats som betalda inom ett intervall som du väljer. Detta är användbart när du accepterar bokningar som är betalda använder offline betalningsmetoder (banköverföring, check). Om en bokning inte betalas inom X antal dagar från det att bokningen gjordes, skickas en betalningspåminnelse via e-post till gästen. Du kommer också att få en kopia av den . Om du också använder plugin-programmet för provisorisk bokningshantering, se till att intervallet då du vill skicka e-postmeddelandet om betalningspåminnelse är minst 1 dag lägre än det som ställts in för att ta bort eller avbryta den obetalda bokningen.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Betalningspåminnelse för din bokning på ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1', "Du har en obetald bokning på");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2', "För att säkra din bokning är det nödvändigt att göra en deposition på");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO', "Bokningsnummer");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3', ". Kontakta oss om du vill diskutera betalningsalternativ. <br /> <br /> Tack.");