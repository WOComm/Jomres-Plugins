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
jr_define('_JRPORTAL_WIRE_TRANSFER',"Məlumat köçürməsi");
jr_define('_JRPORTAL_WIRE_TRANSFER_TITLE',"Məlumat köçürmə Parametrləri");
jr_define('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS',"Burada Pul köçürmə Şlüzünün aktiv olduğu bütün əmlaklar üçün istifadə olunacaq bank hesabı təfərrüatlarını müəyyən edə bilərsiniz. Əgər siz ön hissədə təyin edilmiş bank hesabı detallarını ləğv etməyi seçsəniz, burada təyin edilmiş təfərrüatlar belə olacaq. istifadə edilmişdir. Əgər etməməyi seçsəniz, o zaman frontend gateway konfiqurasiyasında müəyyən edilmiş bank hesabı rekvizitləri istifadə olunacaq.");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE',"Bütün əmlaklar üçün müəyyən edilmiş bank hesabı rekvizitləri ləğv edilsin? ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER',"Hesab sahibi: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT',"SWIFT Kodu: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC',"BIC Kodu: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME',"Bank adı: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1',"Hesab sahibi: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1',"SWIFT Kodu: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1',"BIC Kodu: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1',"Bank adı: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2',"Hesab sahibi: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2',"IBAN: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2',"SWIFT Kodu: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2',"BIC Kodu: ");
jr_define('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2',"Bank adı: ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE',"Rezervasyonunuz üçün ödəniş təfərrüatları burada ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO',"Hörmətli");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU',"Rezerv etdiyiniz üçün təşəkkür edirik ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO',"Rezervasiyanızı təmin etmək üçün lütfən, depozitinizi köçürün ");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL'," aşağıdakı bank hesabına.");
jr_define('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS'," aşağıdakı bank hesabına. Bu rezervasiyanı təqdim etdikdən sonra bank hesabı məlumatının surəti də sizə e-poçt vasitəsilə göndəriləcək.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1',"Hər hansı sualınız varsa, bizimlə əlaqə saxlamaqdan çəkinməyin. Bizə zəng edə bilərsiniz ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2'," və ya bizə e-poçt ünvanına ");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL',"Hər hansı sualınız varsa, bizimlə əlaqə saxlamaqdan çəkinməyin.");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT',"Bank hesabı məlumatlarını çap edin");
jr_define('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT',"Göndər");