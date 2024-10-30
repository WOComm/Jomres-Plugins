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
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"Western Union Ayarları");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"WU Ağ Geçidi etkinleştirilmiş tüm mülkler için kullanılacak WU hesap ayrıntılarını burada tanımlayabilirsiniz. Ön uçta ayarlanan WU hesap ayrıntılarını geçersiz kılmayı seçerseniz, burada ayarlanan ayrıntılar kullanılacaktır. . Bunu yapmamayı seçerseniz, ön uç ağ geçidi yapılandırmasında tanımlanan WU hesap ayrıntıları kullanılacaktır.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"Tüm mülkler için ayarlanan WU hesap ayrıntıları geçersiz kılınsın mı? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"Western Union Şubesi: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"Alıcı Adı: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"Yararlanıcı Kimliği: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"Lehdar Adresi: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"Diğer Bilgiler: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Western Union Şubesi: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"Alıcı Adı: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"Yararlanıcı Kimliği: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"Lehdar Adresi: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"Diğer Bilgiler: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"Western Union Şubesi: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"Alıcı Adı: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"Yararlanıcı Kimliği: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"Lehdar Adresi: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"Diğer Bilgiler: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE'," Rezervasyonunuz için ödeme ayrıntıları ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"Sevgili ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"Rezervasyonunuz için teşekkür ederiz ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"Rezervasyonunuzu garanti altına almak için lütfen depozitonuzu gönderin ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," aşağıdaki Western Union hesabına.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," aşağıdaki Western Union hesabına. Bu rezervasyonu gönderdikten sonra Western Union hesap bilgilerinin bir kopyası da size e-posta ile gönderilecektir.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"Herhangi bir sorunuz varsa, lütfen bizimle iletişime geçmekten çekinmeyin. Bizi arayabilirsiniz ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," veya bize e-posta ile ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"Herhangi bir sorunuz varsa, lütfen bizimle iletişime geçmekten çekinmeyin.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"Western Union hesap ayrıntılarını yazdırın");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Gönder");

	jr_define('JOMRES_WESTERN_UNION_GATEWAY_WU_CHOSEN',"Konuk ödemeyi Western Union ile yapacak");
