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
jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Kifizetetlen foglalások kezelése");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Az ideiglenes (ki nem fizetett) foglalás törlése vagy törlése? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Még hány nap van a foglalástól számítva? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Ez a beépülő modul automatikusan fut a háttérben, és törli vagy törli az összes olyan ideiglenes foglalást, amely nincs megjelölve fizetettként az Ön által választott időn belül. Ez akkor hasznos, ha offline fizetési módokkal (átutalással) fizetett foglalásokat fogad el. átutalás, csekk). Ha a foglalást a foglalás időpontjától számított X napon belül nem fizetik ki, akkor a foglalás törlődik vagy törlődik, és a naptár a lefoglalt dátumokat szabadként jeleníti meg, így valaki más lefoglalhatja azokat a napokat. . A foglalás törlése vagy törlése esetén Ön és a vendég is e-mailben értesítést kap. Ha a foglalás törlését választja, a foglalás és a számlája töröltként lesz megjelölve, és nem törlődik az adatbázisból , így később elérheti őket. Ha a törlés mellett dönt, akkor a foglalás és a számlája is törlődik az adatbázisból.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"A foglalás törölve");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"A foglalását automatikusan töröltük a szükséges előleg befizetésének hiánya miatt. Ez már nem érvényes foglalás. Ha újra szeretne foglalni, kérjük, látogasson el weboldalunkra, és ismételje meg a foglalást. Az alábbiakban a törölt foglalás adatai.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Ha úgy érzi, hogy ezt az értesítést tévedésből kapta, kérjük, ne habozzon kapcsolatba lépni velünk.");