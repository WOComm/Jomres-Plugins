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
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Nastavenia Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Tu môžete definovať podrobnosti účtu WU, ktoré sa použijú pre všetky vlastníctva, ktoré majú povolenú bránu WU. Ak sa rozhodnete prepísať podrobnosti účtu WU nastavené v klientskom rozhraní, použijú sa tu nastavené podrobnosti . Ak nechcete, použijú sa podrobnosti účtu WU definované v konfigurácii brány frontend.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Prepísať detaily účtu WU nastavené pre všetky vlastnosti? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Pobočka Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Meno príjemcu: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"ID príjemcu: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Adresa príjemcu: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Ďalšie informácie: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Pobočka Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Meno príjemcu: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"ID príjemcu: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Adresa príjemcu: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Ďalšie informácie: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Pobočka Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Meno príjemcu: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"ID príjemcu: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Adresa príjemcu: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Ďalšie informácie: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Platobné údaje za vašu rezerváciu na ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Vážený ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Ďakujeme za Vašu rezerváciu na ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"Za účelom zabezpečenia rezervácie pošlite prosím zálohu vo výške ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," na účet Western Union nižšie.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," na účet Western Union nižšie. Kópia informácií o účte Western Union vám bude zaslaná aj e-mailom po odoslaní tejto rezervácie.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Ak máte nejaké otázky, neváhajte nás kontaktovať. Môžete nám zavolať na ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," alebo nám pošlite e-mail na adresu ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Ak máte nejaké otázky, neváhajte nás kontaktovať.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Vytlačiť podrobnosti o účte Western Union");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Odoslať");