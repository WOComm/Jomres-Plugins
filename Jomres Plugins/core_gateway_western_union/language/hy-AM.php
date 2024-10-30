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
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Western Union-ի կարգավորումներ");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Այստեղ կարող եք սահմանել WU հաշվի մանրամասները, որոնք կօգտագործվեն բոլոր այն հատկությունների համար, որոնցում միացված է WU Gateway-ը: Եթե դուք ընտրում եք վերացնել WU հաշվի մանրամասները, որոնք դրված են առջևում, ապա այստեղ սահմանված մանրամասները կօգտագործվեն: Եթե ​​չընտրեք, ապա կօգտագործվեն WU հաշվի մանրամասները, որոնք սահմանված են frontend gateway-ի կազմաձևում:");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Վերականգնե՞լ բոլոր հատկությունների համար սահմանված WU հաշվի մանրամասները: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Western Union մասնաճյուղ. ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Շահառուի անունը. ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"Շահառուի ID՝ ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Շահառուի հասցեն՝ ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Այլ տեղեկություններ. ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Western Union մասնաճյուղ. ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Շահառուի անունը. ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"Շահառուի ID՝ ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Շահառուի հասցեն՝ ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Այլ տեղեկություններ. ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Western Union մասնաճյուղ. ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Շահառուի անունը. ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"Շահառուի ID՝ ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Շահառուի հասցեն՝ ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Այլ տեղեկություններ. ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Ձեր ամրագրման համար վճարման մանրամասները ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Հարգելի ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Շնորհակալություն ձեր ամրագրման համար");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"Ձեր ամրագրումն ապահովելու համար խնդրում ենք ուղարկել ձեր ավանդը ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," ստորև ներկայացված Western Union հաշվին:");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS',", ստորև ներկայացված Western Union հաշվին: Western Union հաշվի տեղեկատվության պատճենը նույնպես կուղարկվի ձեզ էլփոստով այս ամրագրումը ներկայացնելուց հետո:");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Եթե հարցեր ունեք, խնդրում ենք մի հապաղեք կապվել մեզ հետ: Դուք կարող եք զանգահարել մեզ ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2',"կամ էլ մեզ էլ.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Եթե հարցեր ունեք, խնդրում ենք մի հապաղեք կապվել մեզ հետ:");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Տպել Western Union հաշվի մանրամասները");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Ներկայացնել");

	jr_define('JOMRES_WESTERN_UNION_GATEWAY_WU_CHOSEN',"Հյուրը կվճարի Western Union-ի կողմից");
