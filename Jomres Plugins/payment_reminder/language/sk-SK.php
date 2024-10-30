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

jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Pripomenutia platieb");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Odoslať e-mail s pripomenutím platby..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..dni po vykonaní predbežnej rezervácie");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS', "Tento doplnok sa spustí automaticky na pozadí a odošle hosťom e -mail s upozornením na predbežné rezervácie, ktoré nie sú označené ako zaplatené v intervale, ktorý si vyberiete. Je to užitočné, ak prijímate platby, ktoré sú zaplatené. pomocou offline spôsobov platby (bankovým prevodom, šekom). Ak rezervácia nie je zaplatená do X dní od vykonania rezervácie, hosťovi sa odošle e-mail s pripomenutím platby. Dostanete aj jej kópiu . Ak používate aj doplnok Provisional Bookings Handling, potom sa uistite, že interval, v ktorom chcete poslať e-mail s pripomenutím platby, je aspoň o 1 deň kratší ako interval nastavený na vymazanie alebo zrušenie nezaplatenej rezervácie.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Pripomienka platby za vašu rezerváciu na ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Máte nezaplatenú rezerváciu v ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Na zabezpečenie vašej rezervácie je potrebné uhradiť zálohu vo výške ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO', "číslo rezervácie");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Ak chcete prediskutovať možnosti platby, kontaktujte nás.<br /><br />Ďakujeme.");