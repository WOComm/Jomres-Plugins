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


jr_define ('_JRPORTAL_PAYMENT_REMINDER_TITLE' , "تذكيرات الدفع") ;
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1', "إرسال بريد إلكتروني لتذكير الدفع ..") ;
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2' , ".. أيام بعد إجراء الحجز المؤقت") ;
jr_define ('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS' , "يعمل هذا المكون الإضافي تلقائيًا في الخلفية ويرسل رسالة تذكير بالدفع عبر البريد الإلكتروني للضيوف الذين أجروا حجوزات مؤقتة لم يتم تمييزها على أنها مدفوعة خلال فترة زمنية من اختيارك. هذا مفيد عندما تقبل الحجوزات المدفوعة باستخدام طرق الدفع غير المتصلة بالإنترنت (حوالة مصرفية , شيك). إذا لم يتم دفع الحجز في غضون X عدد الأيام من وقت إجراء الحجز , فسيتم إرسال بريد إلكتروني لتذكير الدفع إلى الضيف. وستتلقى أيضًا نسخة منه . إذا كنت تستخدم أيضًا المكوّن الإضافي لمعالجة الحجوزات المؤقتة , فتأكد من أن الفاصل الزمني الذي تريد إرسال البريد الإلكتروني للتذكير بالدفع فيه أقل بيوم واحد على الأقل من الفترة المحددة لحذف أو إلغاء الحجز غير المدفوع. ") ;
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE' , "تذكير بالدفع لحجزك في") ;
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1' , "لديك حجز غير مدفوع في") ;
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2' , "لتأمين حجزك , من الضروري إجراء دفعة إيداع بقيمة") ;
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO' , "رقم الحجز") ;
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3' , ". يرجى الاتصال بنا إذا كنت ترغب في مناقشة خيارات الدفع. <br /> <br /> شكرًا لك.") ;