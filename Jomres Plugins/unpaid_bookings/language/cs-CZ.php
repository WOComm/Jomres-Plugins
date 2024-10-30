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
jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Zpracování nezaplacených rezervací");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Zrušit nebo smazat prozatímní (nezaplacené) rezervace? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Alfer kolik dní od rezervace? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Tento plugin se automaticky spouští na pozadí a maže nebo ruší všechny dočasné rezervace, které nejsou označeny jako zaplacené ve vámi zvoleném intervalu. To je užitečné, když přijímáte rezervace, které jsou placeny pomocí offline platebních metod (tj. převodem, šekem). Pokud není rezervace uhrazena do X dnů od doby, kdy byla provedena rezervace, bude rezervace smazána nebo zrušena a v kalendáři se rezervovaná data zobrazí jako dostupná, takže si tyto dny může zarezervovat někdo jiný . Když je rezervace smazána nebo zrušena, vy i host obdržíte upozornění e-mailem. Pokud se rozhodnete rezervaci zrušit, bude rezervace a její faktura označeny jako zrušené a nebudou smazány z databáze , takže k nim budete mít přístup později. Pokud se rozhodnete ji smazat, rezervace a její faktura budou smazány z databáze.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Rezervace zrušena");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Vaše rezervace byla automaticky zrušena z důvodu nezaplacení požadované zálohy. Toto již není platná rezervace. Pokud byste chtěli provést rezervaci znovu, navštivte prosím naše webové stránky a zopakujte rezervaci. Následují podrobnosti o zrušené rezervaci.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Pokud se domníváte, že jste toto upozornění obdrželi omylem, neváhejte nás kontaktovat.");