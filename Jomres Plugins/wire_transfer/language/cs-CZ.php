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
jr_define('_JRPORTAL_WIRE_TRANSFER',"Wire Transfer");
jr_define('_JRPORTAL_WIRE_TRANSFER_TITLE',"Nastavení bezdrátového přenosu");
jr_define('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS',"Zde můžete definovat podrobnosti o bankovním účtu, které budou použity pro všechny služby, které mají povolenou bránu pro bankovní převody. Pokud se rozhodnete přepsat údaje o bankovním účtu nastavené v rozhraní frontend, budou zde nastavené údaje used. Pokud se rozhodnete ne, budou použity údaje o bankovním účtu definované v konfiguraci frontend brány.");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE',"Přepsat údaje o bankovním účtu nastavené pro všechny vlastnosti? ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER',"Držitel účtu: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT',"Kód SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC',"Kód BIC: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME',"Název banky: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1',"Držitel účtu: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1',"Kód SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1',"Kód BIC: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1',"Název banky: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2',"Držitel účtu: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2',"Kód SWIFT: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2',"Kód BIC: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2',"Název banky: ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE',"Platební údaje pro vaši rezervaci na ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO',"Vážený ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU',"Děkujeme za Vaši rezervaci na ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO',"Aby byla zajištěna rezervace, převeďte prosím svůj vklad ve výši ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL'," na níže uvedený bankovní účet.");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS'," na níže uvedený bankovní účet. Kopie informací o bankovním účtu vám bude také zaslána e-mailem po odeslání této rezervace.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1',"Pokud máte nějaké dotazy, neváhejte nás kontaktovat. Můžete nám zavolat na ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2'," nebo nám napište na adresu ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL',"Pokud máte nějaké dotazy, neváhejte nás kontaktovat.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT',"Vytisknout podrobnosti o bankovním účtu");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT',"Odeslat");