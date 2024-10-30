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


jr_define ('_SUBSCRIPTIONS_ACTIVE', "نشطة") ;
jr_define ('_SUBSCRIPTIONS_EXPIRED', "غير نشط") ;
jr_define ('_SUBSCRIPTIONS_HPAYMENT_STATUS' , "حالة الدفع") ;
jr_define ('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL', "المستوى") ;
jr_define ('_SUBSCRIPTIONS_EDIT_TITLE', "تحرير الاشتراك") ;
jr_define ('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE' , "هل تريد إرسال رسالة بريد إلكتروني للتذكير بانتهاء صلاحية الاشتراك؟") ;
jr_define ('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A', "إرسال بريد إلكتروني للتذكير") ;
jr_define ('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B' , "أيام قبل انتهاء صلاحية الاشتراك") ;
jr_define ('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE' , "إرسال بريد إلكتروني عند انتهاء صلاحية الاشتراك؟") ;
jr_define ('_SUBSCRIPTIONS_MY', "اشتراكاتي") ;
jr_define ('_SUBSCRIPTIONS_HRENEW', "تجديد") ;
jr_define ('_SUBSCRIPTIONS_HRENEWAL', "تجديد الاشتراك") ;
jr_define ('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED' , "لقد اشتركت بالفعل , يرجى شراء تجديد بدلاً من ذلك.") ;
jr_define ('_SUBSCRIPTIONS_HEDIT', "تحرير حزمة الاشتراك") ;
jr_define ('_SUBSCRIPTIONS_USERID_DESC', "اكتب الأحرف الأولى من اسم المستخدم وسترى قائمة منسدلة بأسماء المستخدمين. انقر فوق اسم مستخدم لتحديده.") ;
jr_define ('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED', "حزمة الاشتراك هذه لم تعد متوفرة لذا لا يمكن تجديدها , يرجى التفكير في ترقيتها.") ;
jr_define ('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID' , "أنت غير مشترك في هذه الحزمة لذا لا يمكنك تجديدها.") ;
jr_define ('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE', "لا توجد خيارات تجديد لهذه الحزمة") ;
jr_define ('_SUBSCRIPTIONS_CANCEL', "إلغاء الاشتراك") ;
jr_define ('_SUBSCRIPTIONS_HFREQUENCY_DAYS', "التكرار (بالأيام)") ;
jr_define ('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC', "مدة الاشتراك بالأيام") ;
jr_define ('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED', "التجديدات غير مسموح بها لهذه الحزمة.") ;
jr_define ('_SUBSCRIPTIONS_HRENEWAL_PRICE', "سعر التجديد") ;
jr_define ('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL', "اضبط هذا على 0 لتعطيل التجديدات لهذه الحزمة أو أدخل سعرًا للتجديد") ;
jr_define ('_SUBSCRIPTIONS_HPACKAGE_FEATURES', "خيارات الحزمة") ;
jr_define ('_SUBSCRIPTIONS_HPACKAGE_DETAILS', "تفاصيل الحزمة") ;
jr_define ('_SUBSCRIPTIONS_HPACKAGE_YOUR', "حزمة اشتراكك") ;
jr_define ('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED' , "لا تتضمن حزمة الاشتراك الخاصة بك الوصول إلى هذه الميزة. لاستخدام هذه الميزة , ستحتاج إلى ترقية اشتراكك.") ;
jr_define ('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1' , "انتهى اشتراكك ولم يتم نشر جميع قوائمك. لم تعد قوائمك مرئية للضيوف ولن تتمكن من تلقي الحجوزات عبر الإنترنت من موقعنا بعد الآن. لمواصلة استخدام خدماتنا , انشر القوائم الخاصة بك والبدء في تلقي الحجوزات عبر الإنترنت , يرجى تسجيل الدخول إلى حسابك وشراء تجديد. ") ;
jr_define ('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1' , "اشتراكك في") ;
jr_define ('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2', "انتهت صلاحيته") ;
jr_define ('_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1' , "هذا إشعار لإعلامك بأن اشتراكك سينتهي قريبًا. لمتابعة استخدام خدماتنا , يرجى تسجيل الدخول إلى حسابك وشراء تجديد.") ;
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', "حزم الاشتراك") ;
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME' , "الاسم") ;
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION', "الوصف") ;
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED', "منشور") ;
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY', "التردد") ;
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT', "السعر") ;
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT', "حد العمل") ;
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC' , "الحد الأقصى لعدد الشركات التي يمكن إضافتها مع حزمة الاشتراك هذه") ;
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE', "اشتراك") ;
jr_define ('_JRPORTAL_SUBSCRIPTIONS_USE', "استخدام وظيفة معالجة الاشتراك") ;
jr_define ('_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', "عذرًا , ولكن لم يتم التعرف على معرف الحزمة.") ;
jr_define ('_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL' , "لا يبدو أنك ملأت تفاصيل حسابك حتى الآن. لإدراج الممتلكات الخاصة بك على الموقع , نحتاج منك إكمال تفاصيل حسابك قبل أن نتمكن من المضي قدمًا.") ;
jr_define ('_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED', "لقد استخدمت كل خانات الملكية المتاحة في حزمة الاشتراك الخاصة بك , لذلك لن تتمكن من إنشاء أي قوائم جديدة. يرجى ترقية الحزمة الخاصة بك إذا كنت ترغب في إنشاء المزيد من القوائم.") ;
jr_define ('_JOMRES_CHART_SUBSCRIPTIONS_DESC', "الدخل حسب السنة / الشهر") ;
jr_define ('_SUBSCRIPTION_WARNING', "لقد قمت بتمكين الاشتراكات ولكن يبدو أنك لم تقم بإنشاء أي حزم اشتراك حتى الآن. لن يتمكن المالكون من تسجيل العقارات على موقعك حتى يتم إنشاء حزمة اشتراك واحدة على الأقل.") ;
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS', "وصول API") ;

	jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1' , "يمكنك الوصول إلى هذه الميزة بالترقية إلى") ;
jr_define ('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2', "حزمة الاشتراك.") ;
jr_define ('_ JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'ترقية') ;
jr_define ('_ JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED' , 'مشترك') ;
jr_define ('_ JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'إعدادات بوابة الاشتراك') ;
jr_define ('_ JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'أنت غير مشترك حاليًا في أي باقات اشتراك. يرجى الاشتراك في حزمة لمتابعة استخدام خدماتنا.') ;