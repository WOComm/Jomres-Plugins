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
jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "E -poçt mövzusu");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "E -poçt mətni (bu rezervasiyanı rədd etmək üçün bir səbəb daxil etmək üçün bu mətni redaktə edə bilərsiniz, alternativlər təklif edə bilərsiniz və s.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Bu sifariş sorğusu rədd ediləcək və ləğv ediləcək. Müştəriyə aşağıdakı e -poçt göndəriləcək");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Bu sifariş sorğusu artıq rədd edilmiş və ya təsdiqləndiyi üçün rədd edilə bilməz");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "E -poçt mətni (bu sifariş üçün ödəniş təlimatlarını doldurmaq üçün bu mətni redaktə edə bilərsiniz və s.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Bu sifariş sorğusu qəbul ediləcək və mövcudluq təqvimdə yenilənəcək. Aşağıdakı e -poçt müştəriyə göndəriləcək.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Bu sifariş sorğusu artıq rədd edilmiş və ya təsdiqləndiyi üçün təsdiq edilə bilməz");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Sayt Admini Yeni Sorğu E -poçtu");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "Rezervasyon əvvəlcə təsdiq tələb edərsə və qlobal paypal şluzu aktivdirsə, saytın admininə sifariş vaxtı göndərilir");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Otel Yeni Sorğu E -poçtu");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "Rezervasyon üçün əvvəlcə təsdiq tələb olunarsa, e -poçt sifariş zamanı otelə göndərilir");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Qonaq Yeni Sorğu E -poçtu");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "Rezervasyonun əvvəlcə təsdiq tələb olunduğu təqdirdə qonağa rezervasyon zamanı göndərilən e -poçt");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "Qonaq Sorğusunun Təsdiq E -poçtu");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "Sorğu üçün əlçatanlığı təsdiqləmək üçün mülkiyyət meneceri tərəfindən qonağa əl ilə göndərilmiş e -poçt");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "Qonaq Sorğusu Rədd E -poçtu");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "Əmlak sorğu detalları üçün mövcud deyilsə, mülkiyyət meneceri tərəfindən qonağa əl ilə göndərilən e -poçt");