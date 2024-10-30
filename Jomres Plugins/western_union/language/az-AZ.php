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
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Western Union Parametrləri");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"Burada siz WU Gateway-in aktiv olduğu bütün xüsusiyyətlər üçün istifadə olunacaq WU hesabı təfərrüatlarını müəyyən edə bilərsiniz. Əgər siz ön hissədə quraşdırılmış WU hesabı təfərrüatlarını ləğv etməyi seçsəniz, burada təyin edilmiş təfərrüatlar istifadə olunacaq. . Əgər etməməyi seçsəniz, o zaman frontend gateway konfiqurasiyasında müəyyən edilmiş WU hesabı təfərrüatları istifadə olunacaq.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Bütün əmlaklar üçün təyin edilmiş WU hesab detalları ləğv edilsin? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Western Union Bölməsi: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Benefisiarın Adı: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"Benefisiar ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Benefisiar Ünvanı: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Digər Məlumat: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Western Union Şöbəsi: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Benefisiar Adı: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"Benefisiar ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Benefisiar Ünvanı: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Digər Məlumat: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Western Union Şöbəsi: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Benefisiarın Adı: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"Benefisiar ID: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Benefisiar Ünvanı: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Digər Məlumat: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"Rezervasyonunuz üçün ödəniş təfərrüatları burada ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Hörmətli");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Rezerv etdiyiniz üçün təşəkkür edirik ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"Rezervasiyanızı təmin etmək üçün depozitinizi göndərin ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," aşağıda Western Union hesabına.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," aşağıda Western Union hesabına. Bu rezervasiyanı təqdim etdikdən sonra Western Union hesab məlumatının surəti də sizə e-poçt vasitəsilə göndəriləcək.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Hər hansı sualınız varsa, bizimlə əlaqə saxlamaqdan çəkinməyin. Bizə zəng edə bilərsiniz ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," və ya bizə e-poçt ünvanına ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Hər hansı sualınız varsa, bizimlə əlaqə saxlamaqdan çəkinməyin.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Western Union hesab məlumatlarını çap edin");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Göndər");