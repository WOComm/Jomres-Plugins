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



jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Opomniki za plačila");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Pošlji e-pošto z opomnikom za plačilo..");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2', ".. dni po opravljeni začasni rezervaciji");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Ta vtičnik deluje samodejno v ozadju in pošlje e-poštni opomnik za plačilo gostom, da so opravili začasne rezervacije, ki niso označene kot plačane v intervalu po vaši izbiri. To je uporabno, če sprejemate plačane rezervacije z uporabo načinov plačila brez povezave (bančno nakazilo, ček). Če rezervacija ni plačana v številu X dni od trenutka, ko je bila rezervacija opravljena, se gostu pošlje e-poštni opomnik za plačilo. Prejeli boste tudi kopijo le-tega . Če uporabljate tudi vtičnik za obdelavo začasnih rezervacij, se prepričajte, da je interval, v katerem želite poslati elektronsko sporočilo z opomnikom za plačilo, vsaj 1 dan nižji od tistega, ki je nastavljen za brisanje ali preklic neplačane rezervacije.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Opomnik za plačilo za vašo rezervacijo na ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Imate neplačano rezervacijo v ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Za zagotovitev vaše rezervacije je potrebno plačati depozit v višini ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Številka rezervacije");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Če se želite pogovoriti o možnostih plačila, nas kontaktirajte.<br /><br />Hvala.");