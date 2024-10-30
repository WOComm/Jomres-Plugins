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

jr_define('_JRPORTAL_WESTERN_UNION',"Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Настройки на Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Тук можете да дефинирате подробностите за акаунта в WU, които ще се използват за всички свойства, които имат активиран WU шлюз. Ако изберете да замените данните за WU акаунта, зададени във интерфейса, тогава ще се използват данните, зададени тук . Ако сте избрали да не го правите, тогава ще бъдат използвани данните за акаунта на WU, дефинирани в конфигурацията на интерфейсния шлюз.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Да се ​​отменят данните за акаунта в WU, зададени за всички свойства? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Клон на Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Име на бенефициента: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"Идент. № на бенефициента: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Адрес на бенефициента: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Друга информация: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Клон на Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Име на бенефициента: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"Идент. № на бенефициента: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Адрес на бенефициента: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Друга информация: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Клон на Western Union: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Име на бенефициента: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"Идент. № на бенефициента: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Адрес на бенефициента: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Друга информация: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Данни за плащане за вашата резервация на ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Уважаеми ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Благодарим ви за резервацията на ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"За да подсигурите резервацията си, моля, изпратете своя депозит от ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," към акаунта в Western Union по-долу.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," към акаунта в Western Union по-долу. Копие от информацията за акаунта в Western Union също ще ви бъде изпратено по имейл, след като изпратите тази резервация.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Ако имате въпроси, моля не се колебайте да се свържете с нас. Можете да ни се обадите на ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," или ни изпратете имейл на ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Ако имате някакви въпроси, моля, не се колебайте да се свържете с нас.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Печатайте подробности за акаунта в Western Union");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Изпращане");

	jr_define('JOMRES_WESTERN_UNION_GATEWAY_WU_CHOSEN',"Гостът ще плати чрез Western Union");
