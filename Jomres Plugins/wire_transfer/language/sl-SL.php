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



jr_define('_JRPORTAL_WIRE_TRANSFER',"Nakazilo");
jr_define('_JRPORTAL_WIRE_TRANSFER_TITLE',"Nastavitve bančnega nakazila");
jr_define('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS',"Tukaj lahko določite podatke o bančnem računu, ki se bodo uporabljali za vse lastnosti, ki imajo omogočen prehod za bančna nakazila. Če se odločite preglasiti podatke o bančnem računu, nastavljene v vmesniku, bodo podrobnosti, ki so nastavljene tukaj Če se ne odločite, bodo uporabljeni podatki o bančnem računu, določeni v konfiguraciji prehoda frontend.");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE',"Preglasiti nastavljene podrobnosti bančnega računa za vse lastnosti?");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER',"Imetnik računa: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT',"Koda SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC',"BIC koda: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME',"Ime banke: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1',"Imetnik računa: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1',"Koda SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1',"BIC koda: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1',"Ime banke: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2',"Imetnik računa: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2',"Koda SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2',"BIC koda: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2',"Ime banke: ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE',"Podatki o plačilu za vašo rezervacijo na ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO',"Spoštovani");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU',"Hvala za vašo rezervacijo na ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO',"Za zagotovitev rezervacije nakažite polog v višini ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL'," na spodnji bančni račun.");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS'," na spodnji bančni račun. Ko oddate to rezervacijo, vam bomo po e-pošti poslali tudi kopijo podatkov o bančnem računu.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1',"Če imate kakršna koli vprašanja, ne oklevajte in nas kontaktirajte. Pokličete nas lahko na ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2'," ali nam pišite na ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL',"Če imate kakršna koli vprašanja, ne oklevajte in nas kontaktirajte.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT',"Natisni podatke o bančnem računu");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT',"Pošlji");