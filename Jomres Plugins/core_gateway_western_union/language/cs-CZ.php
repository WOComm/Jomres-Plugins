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
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Nastavení Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Zde můžete definovat podrobnosti účtu WU, které budou použity pro všechny služby, které mají povolenou bránu WU. Pokud se rozhodnete přepsat podrobnosti účtu WU nastavené v rozhraní frontend, budou použity zde nastavené podrobnosti Pokud se rozhodnete ne, budou použity podrobnosti účtu WU definované v konfiguraci brány frontend.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Přepsat podrobnosti účtu WU nastavené pro všechny vlastnosti? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Pobočka Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Jméno příjemce: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"ID příjemce: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Adresa příjemce: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Další informace: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Pobočka Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Jméno příjemce: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"ID příjemce: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Adresa příjemce: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Další informace: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Pobočka Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Jméno příjemce: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"ID příjemce: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Adresa příjemce: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Další informace: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Platební údaje pro vaši rezervaci na ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Vážený ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Děkujeme za Vaši rezervaci na ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"Aby byla zajištěna rezervace, zašlete prosím zálohu ve výši ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," na níže uvedený účet Western Union.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," na níže uvedený účet Western Union. Kopie informací o účtu Western Union vám bude také zaslána e-mailem po odeslání této rezervace.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Pokud máte nějaké dotazy, neváhejte nás kontaktovat. Můžete nám zavolat na ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," nebo nám napište na adresu ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Pokud máte nějaké dotazy, neváhejte nás kontaktovat.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Vytisknout podrobnosti o účtu Western Union");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Odeslat");

	jr_define('JOMRES_WESTERN_UNION_GATEWAY_WU_CHOSEN',"Host bude platit prostřednictvím Western Union");
