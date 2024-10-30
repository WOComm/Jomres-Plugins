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
jr_define ('_JRPORTAL_WIRE_TRANSFER', "Մարտական ​​փոխանցում");
jr_define ('_JRPORTAL_WIRE_TRANSFER_TITLE', "Մետաղական փոխանցման կարգավորումներ");
jr_define('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS',"Այստեղ կարող եք սահմանել բանկային հաշվի մանրամասները, որոնք կօգտագործվեն բոլոր այն գույքի համար, որոնցում միացված է Wire Transfer Gateway-ը: օգտագործված: Եթե չընտրեք, ապա կօգտագործվեն բանկային հաշվի տվյալները, որոնք սահմանված են frontend gateway config-ում:");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE',"Չեղարկել բոլոր գույքի համար սահմանված բանկային հաշվի տվյալները: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER',"Հաշվի սեփականատեր. ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT',"SWIFT կոդը՝ ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC',"BIC կոդը՝ ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME',"Բանկի անունը. ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1',"Հաշվի սեփականատեր. ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1',"SWIFT կոդը՝ ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1',"BIC կոդը՝ ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1',"Բանկի անունը. ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2',"Հաշվի սեփականատեր. ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2',"SWIFT կոդը՝ ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2',"BIC կոդը՝ ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2',"Բանկի անունը. ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE',"Ձեր ամրագրման համար վճարման մանրամասները ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO',"Հարգելի ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU',"Շնորհակալություն ձեր ամրագրման համար");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO',"Ձեր ամրագրումն ապահովելու համար խնդրում ենք փոխանցել ձեր ավանդը ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL'," ստորև բերված բանկային հաշվին:");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS'," ստորև բերված բանկային հաշվին: Բանկային հաշվի տեղեկատվության պատճենը նույնպես կուղարկվի ձեզ էլփոստով այս ամրագրումը ներկայացնելուց հետո:");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1',"Եթե հարցեր ունեք, խնդրում ենք մի հապաղեք կապվել մեզ հետ: Կարող եք զանգահարել մեզ ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2',"կամ էլփոստով մեզ ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL',"Եթե հարցեր ունեք, մի հապաղեք կապվել մեզ հետ:");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT',"Տպել բանկային հաշվի տվյալները");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT',"Ներկայացնել");