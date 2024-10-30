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

jr_define ('JOMRES_COUPONS_SCAN', "Bu kodu telefonunuza tarayın və indi sifariş edin!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Endirim əldə edin");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "yaşayış qiymətinizdən kənarda");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "əgər aranızda rezervasyon etsəniz");
jr_define ('JOMRES_COUPONS_AND', "və");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "arasındakı tarixlər üçün");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Alternativ olaraq, sifariş edərkən bu endirim kodunu daxil edin:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Çap Kuponları");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Rezervasyon etibarlıdır');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Rezervasyon keçərlidir');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Qonaq adı');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Endirim kodları sifariş etmək üçün təşviq olaraq qonaqlara ötürülə bilər. <br/>
Tarixdən etibarən etibarlıdır, rezervasiyanın edilə biləcəyi tarixlərə aiddir, halbuki tarixdən etibarən qüvvədə olan Rezervasiya, kuponun etibarlı olması üçün rezervasyonun əhatə etməli olduğu tarixlərə aiddir. Rezervasyon bu müddət xaricində olarsa, həmin müddətdən kənar günlər üçün normal qiymətlər tətbiq ediləcək. <br/>
Rezervasyonun müəyyən bir qonaq üçün əlçatan olmasını istəyirsinizsə, kuponu yalnız həmin qonaqla məhdudlaşdırmaq üçün açılan menyudan həmin qonağın adını seçin. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Burada yaradılan endirim kodları veb saytdakı bütün mülklərə şamil ediləcək.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'Kuponunuzla bu rezervasiya endirim edildi');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' to ');