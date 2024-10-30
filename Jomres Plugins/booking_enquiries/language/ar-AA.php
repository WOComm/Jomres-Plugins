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


jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "موضوع البريد الإلكتروني") ;
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "نص البريد الإلكتروني (يمكنك تعديل هذا النص لملء سبب رفض هذا الحجز, وتقديم البدائل, وما إلى ذلك)") ;
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "سيتم رفض وإلغاء استعلام الحجز هذا. سيتم إرسال البريد الإلكتروني التالي إلى العميل.") ;
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "لا يمكن رفض استعلام الحجز هذا لأنه تم رفضه أو الموافقة عليه بالفعل.") ;
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "رسالة نصية بالبريد الإلكتروني (يمكنك تعديل هذا النص لملء تعليمات الدفع لهذا الحجز, وما إلى ذلك)") ;
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "سيتم قبول استعلام الحجز هذا وسيتم تحديث التوفر في التقويم. سيتم إرسال البريد الإلكتروني التالي إلى العميل.") ;
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "لا يمكن الموافقة على استعلام الحجز هذا لأنه تم رفضه أو الموافقة عليه بالفعل.") ;
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "البريد الإلكتروني للاستعلام الجديد لمسؤول الموقع") ;
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "تم إرسال البريد الإلكتروني إلى مسؤول الموقع في وقت الحجز إذا كان الحجز يتطلب الموافقة أولاً وتم تمكين بوابة paypal العالمية") ;
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "البريد الإلكتروني لاستعلام الفندق الجديد") ;
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "إرسال بريد إلكتروني إلى الفندق في وقت الحجز إذا كان الحجز يتطلب الموافقة أولاً") ;
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "البريد الإلكتروني لاستعلام الضيف الجديد") ;
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "إرسال بريد إلكتروني إلى الضيف في وقت الحجز إذا كان الحجز يتطلب الموافقة أولاً") ;
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "البريد الإلكتروني للموافقة على استعلام الضيف") ;
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "بريد إلكتروني يتم إرساله يدويًا إلى الضيف من قبل مدير الملكية لتأكيد التوفر للاستعلام") ;
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "البريد الإلكتروني لرفض استعلام الضيف") ;
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "بريد إلكتروني يتم إرساله يدويًا إلى الضيف بواسطة مدير العقار إذا لم يكن العقار متاحًا لتفاصيل الاستفسار") ;