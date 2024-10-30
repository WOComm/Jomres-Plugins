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
jr_define('_JRPORTAL_WESTERN_UNION',"Związek Zachodni");
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Ustawienia Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Tutaj możesz zdefiniować szczegóły konta WU, które będą używane dla wszystkich usług, które mają włączoną bramę WU. Jeśli zdecydujesz się zastąpić szczegóły konta WU ustawione w interfejsie, zostaną użyte szczegóły ustawione tutaj. Jeśli zdecydujesz się tego nie robić, zostaną użyte szczegóły konta WU zdefiniowane w konfiguracji bramy frontonu.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Zastąpić szczegóły konta WU ustawione dla wszystkich usług? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Oddział Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Nazwa beneficjenta: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"Identyfikator beneficjenta: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Adres beneficjenta: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Inne informacje: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Oddział Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Nazwa beneficjenta: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"Identyfikator beneficjenta: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Adres beneficjenta: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Inne informacje: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Oddział Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Nazwa beneficjenta: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"Identyfikator beneficjenta: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Adres beneficjenta: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Inne informacje: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Szczegóły płatności dotyczące Twojej rezerwacji w ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Szanowni Państwo");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Dziękujemy za rezerwację w ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"Aby zabezpieczyć rezerwację, wyślij depozyt w wysokości ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," na poniższe konto Western Union.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," na poniższe konto Western Union. Kopia informacji o koncie Western Union zostanie również wysłana e-mailem po przesłaniu tej rezerwacji.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Jeśli masz jakieś pytania, nie wahaj się z nami skontaktować. Możesz zadzwonić pod numer ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," lub napisz do nas na ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Jeśli masz jakieś pytania, nie wahaj się z nami skontaktować.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Drukuj szczegóły konta Western Union");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Prześlij");