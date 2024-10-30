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



jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Obravnava neplačanih rezervacij");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Preklicati ali izbrisati začasne (neplačane) rezervacije? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Povedajte, koliko dni od časa rezervacije? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Ta vtičnik se samodejno izvaja v ozadju in izbriše ali prekliče vse začasne rezervacije, ki niso označene kot plačane v intervalu po vaši izbiri. To je uporabno, če sprejemate rezervacije, ki so plačane z načini plačila brez povezave (bančno nakazilo, ček). Če rezervacija ni plačana v številu X dni od trenutka, ko je bila rezervacija opravljena, se rezervacija izbriše ali prekine in koledar bo prikazal rezervirane datume kot na voljo, tako da lahko nekdo drug rezervira te dneve . Ko je rezervacija izbrisana ali preklicana, boste vi in ​​gost prejeli obvestilo po e-pošti. Če se odločite za preklic rezervacije, bosta rezervacija in njen račun označena kot preklicana in ne bosta izbrisana iz baze podatkov , tako da lahko do njih dostopate pozneje. Če se odločite za brisanje, bosta rezervacija in njen račun izbrisana iz baze podatkov.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Rezervacija preklicana");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Vaša rezervacija je bila samodejno preklicana zaradi neplačila zahtevanega pologa. To ni več veljavna rezervacija. Če želite ponovno rezervirati, obiščite naše spletno mesto in ponovite rezervacijo. Spodaj so podrobnosti preklicane rezervacije.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Če menite, da ste to obvestilo prejeli pomotoma, ne oklevajte in nas kontaktirajte.");