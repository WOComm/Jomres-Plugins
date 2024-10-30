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

jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Neapmaksātu rezervāciju apstrāde");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Atcelt vai dzēst provizoriskās (neapmaksātās) rezervācijas? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Vai vēl cik dienas pēc rezervācijas laika? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Šis spraudnis darbojas automātiski fonā un dzēš vai atceļ visas provizoriskās rezervācijas, kas nav atzīmētas kā apmaksātas jūsu izvēlētā intervālā. Tas ir noderīgi, ja pieņemat rezervācijas, kas tiek apmaksātas, izmantojot bezsaistes maksājuma veidus (pārskaitījumu). pārskaitījums, čeks). Ja rezervācija netiek apmaksāta X dienu laikā no rezervācijas veikšanas brīža, tad rezervācija tiek dzēsta vai atcelta un kalendārā būs redzami rezervētie datumi kā pieejami, lai kāds cits varētu rezervēt šīs dienas. . Kad rezervācija tiek dzēsta vai atcelta, gan jūs, gan viesis saņemsit paziņojumu pa e-pastu. Ja izvēlēsieties atcelt rezervāciju, tad rezervācija un tās rēķins tiks atzīmēti kā atcelti un netiks dzēsti no datu bāzes , lai vēlāk varētu tiem piekļūt. Ja izvēlēsieties to dzēst, tad rezervācija un tās rēķins tiks dzēsti no datu bāzes.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Rezervācija atcelta");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Jūsu rezervācija tika automātiski atcelta, jo nav samaksāta nepieciešamā depozīta summa. Šī vairs nav derīga rezervācija. Ja vēlaties rezervēt vēlreiz, lūdzu, apmeklējiet mūsu vietni un atkārtojiet rezervāciju. Tālāk ir norādītas informācija par atcelto rezervāciju.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Ja uzskatāt, ka šo paziņojumu saņēmāt kļūdas dēļ, lūdzu, nevilcinieties sazināties ar mums.");