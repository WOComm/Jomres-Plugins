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
jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Fizetési emlékeztetők");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Fizetési emlékeztető e-mail küldése..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..nappal az ideiglenes foglalás után");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Ez a beépülő modul automatikusan fut a háttérben, és fizetési emlékeztetőt küld azoknak a vendégeknek, akik olyan ideiglenes foglalásokat végeztek, amelyek nincsenek megjelölve fizetettként az Ön által választott időn belül. Ez akkor hasznos, ha fizetett foglalásokat fogad el. offline fizetési módok használatával (átutalás, csekk). Ha a foglalást a foglalástól számított X napon belül nem fizetik ki, akkor fizetési emlékeztető e-mailt küld a vendégnek, amelyről egy másolatot is kap . Ha az ideiglenes foglaláskezelési bővítményt is használja, akkor győződjön meg arról, hogy a fizetési emlékeztető e-mail küldésének időtartama legalább 1 nappal rövidebb, mint a kifizetetlen foglalás törlésére vagy törlésére beállított idő.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Fizetési emlékeztető a következő címen történő foglalásához");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Önnek van egy kifizetetlen foglalása itt: ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Foglalása biztonsága érdekében összegű előleg befizetése szükséges");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Foglalási szám");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Kérjük, lépjen kapcsolatba velünk, ha meg szeretne beszélni a fizetési lehetőségekről.<br /><br />Köszönjük.");