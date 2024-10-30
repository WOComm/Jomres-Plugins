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


jr_define ('_JOMRES_ICAL_EVENT', 'iCal Event') ;
jr_define ('_JOMRES_ICAL_FEED', 'iCal Feed') ;
jr_define ('_JOMRES_ICAL_FEED_LINK', 'iCal Feed URL') ;
jr_define ('_JOMRES_ICAL_FEEDS', 'iCal Feed / s') ;
jr_define ('_JOMRES_ICAL_FEEDS_DESC' , 'يمكن لخلاصات iCal أن تعرض الحجوزات القادمة في تقويم بعيد بما في ذلك جهازك المحمول وتقويم Google وتقويم Apple و Thunderbird و Outlook والمزيد. استخدم عناوين URL التالية للاشتراك في الخلاصات في برنامج التقويم الخاص بك. ') ;
jr_define ('_JOMRES_ICAL_ANON', 'عنوان URL لموجز iCal مجهول الهوية') ;
jr_define ('_JOMRES_ICAL_ALLOW_ANON', 'السماح بالوصول المجهول إلى خلاصات iCal؟');
jr_define ("_JOMRES_ICAL_ALLOW_ANON_DESC" , "إذا تم تمكين هذا الخيار , فسيكون موجز أحداث iCal متاحًا للجميع , ولكن بدون تفاصيل الحجز أو الضيف.") ;
jr_define ('_JOMRES_ICAL_IMPORT', 'iCal Import') ;
jr_define ('_JOMRES_ICAL_SELECT', 'حدد ملفًا للاستيراد') ;
jr_define ('_JOMRES_ICAL_NO_FILE_UPLOADED', 'خطأ , لم يتم تحميل أي ملف.') ;
jr_define ('_JOMRES_ICAL_IMPORT_INFO', "عند استيراد ملف iCal , يجب أن يكون تاريخ انتهاء الحدث هو تاريخ مغادرة الضيف. يجب أن يكون الملخص اسم الضيف. يمكن أن يحتوي وصف الحدث على كافة التفاصيل الأخرى.");

jr_define ('_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'رقم الحجز هذا موجود بالفعل في النظام.') ;
jr_define ('_JOMRES_ICAL_ERROR_NO_ROOMS', 'لا توجد غرف متاحة في التواريخ المحددة.') ;
jr_define ('_JOMRES_ICAL_ERROR_NO_EVENTS', 'لم يتم العثور على أحداث في ملف ics.') ;
jr_define ('_JOMRES_ICAL_SUCCESS', 'تم استيراد الحدث بنجاح') ;
jr_define ('_JOMRES_ICAL_FAILURE', 'تعذر استيراد الحدث') ;

jr_define ('_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'اسم الضيف') ;
jr_define ("_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION", "وصف الحدث") ;
jr_define ('_JOMRES_ICAL_RESULT_HEADER_START', 'Start') ;
jr_define ('_JOMRES_ICAL_RESULT_HEADER_END', 'End') ;
jr_define ('_JOMRES_ICAL_RESULT_HEADER_RESULT', 'النتيجة') ;
jr_define ('_JOMRES_ICAL_WITHHELD', 'حجب') ;
jr_define ("_JOMRES_ICAL_FEED_SETTINGS_DESC" , "يمكن لخلاصات iCal الخاصة بك عرض الحجوزات القادمة في تقويم بعيد بما في ذلك جهازك المحمول وتقويم Google وتقويم Apple و Thunderbird و Outlook والمزيد.") ;
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS_DESC' , 'تسمح لك هذه الميزة بمزامنة الحجوزات من مواقع مثل Airbnb و Homeway وغيرها إلى Jomres. سيتعين عليك إدخال عنوان url لموجز iCal الخاص بملكيتك لكل موقع تريد مزامنته. حجز مكان الإقامة الخاص بك على Airbnb على سبيل المثال , سيتم عرض هذه التواريخ على أنها محظورة (الحجوزات السوداء) على موقع Jomres هذا أيضًا , لذلك لا يمكن لأي شخص حجز هذه التواريخ هنا أيضًا. لن يؤدي هذا إلى مزامنة تفاصيل الحجز بين المواقع (مثل تفاصيل الضيف والأسعار , الفواتير , وما إلى ذلك) ولكنها طريقة لطيفة وسهلة لتجنب الحجوزات المزدوجة عن طريق مزامنة التوافر فقط. ') ;
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS', 'iCal Sync Settings') ;
jr_define ('_JOMRES_ICAL_FEED_SETTINGS', 'iCal Feed Settings') ;
jr_define ('_JOMRES_ICAL_SYNC_URL1', 'عنوان URL خارجي iCal') ;
jr_define ("_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES" , "تضمين استفسارات الحجز أيضًا؟") ;
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC' , 'إذا تم تمكينه , فإنه سيتضمن أيضًا الحجوزات التي لم تتم الموافقة عليها بعد (إذا تم تمكين ميزة الموافقة على الحجوزات). يعد الإبقاء على هذا الخيار معطلاً طريقة رائعة لإخفاء الحجوزات من التقويم التي ربما تنتظر التأكيد في حالة غير موافق عليها / استفسار. إذا كانت الحجوزات لا تتطلب الموافقة (ميزة الموافقة على الحجوزات معطلة) , فسيتم تصدير جميع الحجوزات. ') ;

jr_define ('_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds') ;
jr_define ('_JOMRES_ICAL_REMOTE_FEED_URL', 'عنوان URL بعيد') ;
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'Room UID') ;
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'اسم / رقم الغرفة') ;
jr_define ('_JOMRES_ICAL_REMOTE_INFO', "حدد الغرفة التي سيؤثر عليها هذا الموجز وعنوان url الخاص بالموقع البعيد. عند استيراد ملف iCal , يجب أن يكون تاريخ انتهاء الحدث هو تاريخ مغادرة الضيف. يجب أن يكون الملخص هو اسم الضيف. الحدث يمكن أن يحتوي الوصف على جميع التفاصيل الأخرى. ") ;

jr_define ('_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical remote feed created');
jr_define ("_JOMRES_ICAL_REMOTE_FEED_DELETED", "تم حذف تغذية Ical عن بُعد") ;