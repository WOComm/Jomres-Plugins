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
jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Připomenutí plateb");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Odeslat email s upomínkou na platbu..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..dny po provedení předběžné rezervace");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Tento plugin se automaticky spouští na pozadí a posílá hostům e-mail s připomenutím platby, že provedli předběžné rezervace, které nejsou označeny jako zaplacené ve vámi zvoleném intervalu. To je užitečné, když přijímáte rezervace, které jsou placené pomocí offline platebních metod (bankovním převodem, šekem). Pokud rezervaci nezaplatíte do X dnů od okamžiku provedení rezervace, bude hostovi zaslán e -mail s připomenutím platby. Obdržíte také jeho kopii . Pokud používáte také plugin Provisional Bookings Handling, pak se ujistěte, že interval, ve kterém chcete odeslat e-mail s upomínkou na platbu, je alespoň o 1 den kratší než interval nastavený pro smazání nebo zrušení nezaplacené rezervace.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Připomenutí platby za vaši rezervaci na ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Máte nezaplacenou rezervaci na ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Aby byla zajištěna rezervace, je nutné provést zálohu ve výši ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO', "číslo rezervace");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Pokud si přejete prodiskutovat možnosti platby, kontaktujte nás.<br /><br />Děkujeme.");