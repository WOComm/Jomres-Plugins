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

jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Spracovanie nezaplatených rezervácií");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Zrušiť alebo vymazať predbežné (nezaplatené) rezervácie? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Alfer koľko dní od rezervácie? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Tento doplnok sa spúšťa automaticky na pozadí a odstraňuje alebo ruší všetky dočasné rezervácie, ktoré nie sú označené ako zaplatené v intervale podľa vášho výberu. Je to užitočné, keď prijímate rezervácie, ktoré sú platené offline spôsobmi platby prevod, šek). Ak rezervácia nie je zaplatená do X dní od vykonania rezervácie, potom sa rezervácia vymaže alebo zruší a v kalendári sa zobrazia rezervované dátumy ako dostupné, takže si tieto dni môže rezervovať niekto iný . Keď je rezervácia vymazaná alebo zrušená, vy aj hosť dostanete upozornenie e-mailom. Ak sa rozhodnete rezerváciu zrušiť, rezervácia a jej faktúra budú označené ako zrušené a nebudú vymazané z databázy , aby ste k nim mali prístup neskôr. Ak sa rozhodnete ju vymazať, rezervácia a jej faktúra budú vymazané z databázy.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Rezervácia zrušená");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Vaša rezervácia bola automaticky zrušená z dôvodu nezaplatenia požadovanej zálohy. Toto už nie je platná rezervácia. Ak si chcete rezervovať znova, navštívte našu webovú stránku a zopakujte rezerváciu. Nasledujú podrobnosti o zrušenej rezervácii.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Ak si myslíte, že ste toto upozornenie dostali omylom, neváhajte nás kontaktovať.");