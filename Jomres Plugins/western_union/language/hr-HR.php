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

jr_define('_JRPORTAL_WESTERN_UNION',"Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Postavke Western Uniona");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Ovdje možete definirati pojedinosti WU računa koji će se koristiti za sva svojstva koja imaju omogućen WU Gateway. Ako odaberete nadjačati pojedinosti WU računa postavljene u prednjem dijelu, tada će se koristiti pojedinosti postavljene ovdje . Ako odaberete ne, tada će se koristiti detalji WU računa definirani u konfiguraciji pristupnika frontend.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Preglasiti pojedinosti WU računa postavljene za sva svojstva? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Western Union podružnica: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Ime korisnika: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"ID korisnika: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Adresa korisnika: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Ostale informacije: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Western Union podružnica: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Ime korisnika: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"ID korisnika: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Adresa korisnika: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Ostale informacije: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Western Union podružnica: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Ime korisnika: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"ID korisnika: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Adresa korisnika: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Ostale informacije: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Podaci o plaćanju za vašu rezervaciju na ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Poštovani ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Hvala na rezervaciji na ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"Kako biste osigurali svoju rezervaciju, pošaljite svoj depozit od ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," na Western Union račun u nastavku.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," na Western Union račun u nastavku. Kopija informacija o Western Union računu također će vam biti poslana e-poštom nakon što pošaljete ovu rezervaciju.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Ako imate bilo kakvih pitanja, ne ustručavajte se kontaktirati nas. Možete nas nazvati na ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," ili nam pošaljite poruku na ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Ako imate bilo kakvih pitanja, ne ustručavajte se kontaktirati nas.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Ispis pojedinosti o Western Union računu");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Pošalji");