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

// Because the server may be using a proxy for outgoing calls it's better to call the Jomres App server and ask it to respond with this server's IP address. Once we know that, then we are able to give the documentation the correct IP number to configure in Beds24's API Key N field(s)
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.ipify.org?format=json');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($cURLConnection, CURLOPT_TIMEOUT, 1);

$ip_number_response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($ip_number_response);

if (isset( $jsonArrayResponse->ip)) {
    $this_servers_ip_number = $jsonArrayResponse->ip;
} else {
    $this_servers_ip_number = 'Unknown, ask your server hosts support team';
}

jr_define ('BEDS24V2_CHANNEL_MANAGEMENT', 'إدارة القنوات (Beds24)') ;

jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24') ;
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES' , 'إذا كان لديك حساب Beds24 وترغب في تحديث Beds24 عندما يكون لديك حجز , يرجى تحديد هذا الخيار. قم بتعيين عنوان URL على https://www.beds24.com/api/json/') ;
jr_define ('BEDS24V2_ERROR_USER_NO_KEY' , 'هذا المستخدم ليس لديه مفاتيح API معيَّنة , لذا لا يمكنه المتابعة. يُرجى زيارة صفحته في صفحة إدارة المستخدم> مديرو الممتلكات وإنشاء مفتاح واجهة برمجة تطبيقات جديد لهم باستخدام الرابط المتوفر في تلك الصفحة.') ;
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES' , 'هذا المستخدم ليس لديه خصائص Jomres يمكنه تعيينها إلى خصائص Beds24 , أو العكس') ;
jr_define ('BEDS24V2_NOT_SUBSCRIBED' , "لا يبدو أن المدير الذي قمت بتسجيل الدخول لديه حساب على Beds24 , لذلك ستحتاج أولاً إلى التسجيل في خدمتهم , ثم حفظ مفتاح واجهة برمجة التطبيقات هذا على <a href = 'https: / /www.beds24.com/control2.php؟pagetype=accountpassword' target='_blank'> موقع Beds24 هنا </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY' , "انسخ والصق مفتاح API هذا في حقل LINK في حسابك على Beds24 للمتابعة.") ;
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "عند الانتهاء من ذلك , يرجى النقر فوق الزر أدناه للمتابعة.") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE' , "ربط خاصية Beds24") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO' , "تسمح لك هذه الصفحة بعرض الخصائص التي يمكنك الوصول إليها في هذا النظام , بالإضافة إلى تلك الموجودة في مدير القناة. كما تتيح لك استيراد الخصائص من مدير القناة إلى هذا النظام , أو تصديرها الخصائص الموجودة إلى مدير القناة. <br/> إذا كانت لديك خصائص في كل من هذا النظام و Beds24 وتريد ربطها ببعضها البعض , فيمكنك استخدام واجهة الملكية للقيام بذلك. قم بزيارة Beds24> الإعدادات> الخصائص (تأكد من ذلك الخاصية المحددة في القائمة المنسدلة هي نفسها التي تريد ربطها) ثم في قائمة الارتباط الفرعية , احفظ \"واجهة الملكية\" في حقل \"propKey\" في Beds24. بمجرد القيام بذلك , أعد تحميل الصفحة. سيقوم هذا النظام تأكد من ارتباط الخاصيتين بالمفتاح نفسه وإنشاء الاقترانات المطلوبة. بمجرد ربط الخاصيتين , تذكر زيارة صفحة عرض الخاصية , والعثور على عنوان url للإشعار , ولصقه في حقل \"إعلام عنوان URL\" بصفحة الارتباط. ذلك سوف تأكد من أن Beds24 يستخدم الرابط الصحيح لمزامنة الحجوزات مع تلك الخاصية عند استلامها للحجوزات. ") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "خطأ: لا توجد خصائص يمكنك الارتباط بها في Beds24. قد يكون هذا بسبب أن جميع الخصائص التي لديك حقوق لها قد تم ربطها بالفعل بحساب آخر على هذا النظام.") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "معرف الخاصية") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME' , "اسم الخاصية") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME' , "اسم الخاصية Beds24") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "خاصية apikey") ;
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "استيراد") ;
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "تكوين أنواع الغرف") ;
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC' , "هنا تحتاج إلى ربط أنواع الغرف في حسابك على Beds24 بتلك المخزنة في هذا النظام.") ;
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Beds24 room type") ;

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "لا يمكن استيراد هذه الخاصية حتى الآن لأنك لم تقم بتعيين مفتاح الخاصية في صفحة ارتباط الموقع.") ;
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS' , "لا يمكن استيراد هذه الخاصية حتى الآن لأنها لا تحتوي على أي غرف. يُرجى إنشاء غرفة واحدة أو أكثر (الغرف في Beds24 هي نفس أنواع الغرف في Jomres) ولا تنس تعيين الحد الأدنى للسعر . وبمجرد الانتهاء من ذلك , يمكنك استيراد نوع الغرفة إلى Jomres وربطها بأنواع غرف Jomres الحالية. وبعد ذلك ستتمكن من تعديل التعريفات , ولكن يجب تعيين حد أدنى للسعر. ") ;
jr_define ('_BEDS24_SUGGESTED_KEY', "نقترح عليك استخدام مفتاح واجهة برمجة التطبيقات هذا. عندما تفعل ذلك , أعد تحميل هذه الصفحة.") ;
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "تصدير") ;
jr_define ('BEDS24V2_REST_API_INTRO' , "هنا يمكنك رؤية زوج مفاتيح REST API والمسار إلى واجهة برمجة التطبيقات. إذا قمت بحفظ هذه التفاصيل في حسابك على Beds24 , فسيكون بإمكان Beds24 24 الاتصال بهذا الموقع من خلال API الخاص به.") ;
jr_define ('BEDS24V2_REST_API_CLIENT_ID' , "معرف العميل") ;
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "سر العميل") ;
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (نقطة النهاية)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "عرض الخاصية") ;
jr_define ('BEDS24_ROOM_TYPES_TITLE' , "اقترانات نوع الغرفة") ;
jr_define ('BEDS24V2_CHANNEL_MANAGEMENT', 'إدارة القنوات (Beds24)') ;

jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24') ;
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES' , 'إذا كان لديك حساب Beds24 وترغب في تحديث Beds24 عندما يكون لديك حجز , يرجى تحديد هذا الخيار. قم بتعيين عنوان URL على https://www.beds24.com/api/json/') ;
jr_define ('BEDS24V2_ERROR_USER_NO_KEY' , 'هذا المستخدم ليس لديه مفاتيح API معيَّنة , لذا لا يمكنه المتابعة. يُرجى زيارة صفحته في صفحة إدارة المستخدم> مديرو الممتلكات وإنشاء مفتاح واجهة برمجة تطبيقات جديد لهم باستخدام الرابط المتوفر في تلك الصفحة.') ;
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES' , 'هذا المستخدم ليس لديه خصائص Jomres يمكنه تعيينها إلى خصائص Beds24 , أو العكس') ;
jr_define ('BEDS24V2_NOT_SUBSCRIBED' , "لا يبدو أن المدير الذي قمت بتسجيل الدخول لديه حساب على Beds24 , لذلك ستحتاج أولاً إلى التسجيل في خدمتهم , ثم حفظ مفتاح واجهة برمجة التطبيقات هذا على <a href = 'https: / /www.beds24.com/control2.php؟pagetype=accountpassword' target='_blank'> موقع Beds24 هنا </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY' , "انسخ والصق مفتاح API هذا في حقل LINK في حسابك على Beds24 للمتابعة.") ;
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "عند الانتهاء من ذلك , يرجى النقر فوق الزر أدناه للمتابعة.") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE' , "ربط خاصية Beds24") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO' , "تسمح لك هذه الصفحة بعرض الخصائص التي يمكنك الوصول إليها في هذا النظام , بالإضافة إلى تلك الموجودة في مدير القناة. كما تتيح لك استيراد الخصائص من مدير القناة إلى هذا النظام , أو تصديرها الخصائص الموجودة إلى مدير القناة. <br/> إذا كانت لديك خصائص في كل من هذا النظام و Beds24 وتريد ربطها ببعضها البعض , فيمكنك استخدام واجهة الملكية للقيام بذلك. قم بزيارة Beds24> الإعدادات> الخصائص (تأكد من ذلك الخاصية المحددة في القائمة المنسدلة هي نفسها التي تريد ربطها) ثم في قائمة الارتباط الفرعية , احفظ \"واجهة الملكية\" في حقل \"propKey\" في Beds24. بمجرد القيام بذلك , أعد تحميل الصفحة. سيقوم هذا النظام تأكد من ارتباط الخاصيتين بالمفتاح نفسه وإنشاء الاقترانات المطلوبة. بمجرد ربط الخاصيتين , تذكر زيارة صفحة عرض الخاصية , والعثور على عنوان url للإشعار , ولصقه في حقل \"إعلام عنوان URL\" بصفحة الارتباط. ذلك سوف تأكد من أن Beds24 يستخدم الرابط الصحيح لمزامنة الحجوزات مع تلك الخاصية عند استلامها للحجوزات. ") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "خطأ: لا توجد خصائص يمكنك الارتباط بها في Beds24. قد يكون هذا بسبب أن جميع الخصائص التي لديك حقوق لها قد تم ربطها بالفعل بحساب آخر على هذا النظام.") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "معرف الخاصية") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME' , "اسم الخاصية") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME' , "اسم الخاصية Beds24") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "خاصية apikey") ;
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "استيراد") ;
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "تكوين أنواع الغرف") ;
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC' , "هنا تحتاج إلى ربط أنواع الغرف في حسابك على Beds24 بتلك المخزنة في هذا النظام.") ;
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Beds24 room type") ;

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "لا يمكن استيراد هذه الخاصية حتى الآن لأنك لم تقم بتعيين مفتاح الخاصية في صفحة ارتباط الموقع.") ;
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS' , "لا يمكن استيراد هذه الخاصية حتى الآن لأنها لا تحتوي على أي غرف. يُرجى إنشاء غرفة واحدة أو أكثر (الغرف في Beds24 هي نفس أنواع الغرف في Jomres) ولا تنس تعيين الحد الأدنى للسعر . وبمجرد الانتهاء من ذلك , يمكنك استيراد نوع الغرفة إلى Jomres وربطها بأنواع غرف Jomres الحالية. وبعد ذلك ستتمكن من تعديل التعريفات , ولكن يجب تعيين حد أدنى للسعر. ") ;
jr_define ('_BEDS24_SUGGESTED_KEY', "نقترح عليك استخدام مفتاح واجهة برمجة التطبيقات هذا. عندما تفعل ذلك , أعد تحميل هذه الصفحة.") ;
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "تصدير") ;
jr_define ('BEDS24V2_REST_API_INTRO' , "هنا يمكنك رؤية زوج مفاتيح REST API والمسار إلى واجهة برمجة التطبيقات. إذا قمت بحفظ هذه التفاصيل في حسابك على Beds24 , فسيكون بإمكان Beds24 24 الاتصال بهذا الموقع من خلال API الخاص به.") ;
jr_define ('BEDS24V2_REST_API_CLIENT_ID' , "معرف العميل") ;
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "سر العميل") ;
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (نقطة النهاية)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "عرض الخاصية") ;
jr_define ('BEDS24_ROOM_TYPES_TITLE' , "اقترانات نوع الغرفة") ;

jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS', "هل تريد إخفاء هوية الضيوف؟") ;
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC' , "عند إرسال الحجوزات إلى مدير القناة , نوصيك بإخفاء هوية الضيف. إذا قمت بتعيين هذا الخيار على نعم , عند إرسال معلومات الحجز إلى مدير القناة اسم الضيف , لا يكون عنوان البريد الإلكتروني . سيكون لدى OTAs سجل دقيق لتوافرك دون الحاجة إلى مشاركة المزيد من المعلومات أكثر من اللازم. وهذا يعني أنك متوافق مع اللائحة العامة لحماية البيانات لأنه إذا كان على الضيف أن يختار لاحقًا حذف تفاصيله على هذا النظام (لن يتم إخطارك عند هذا يحدث) , لا يتم ترك تفاصيلها مع مراقبي البيانات الآخرين الذين ليس لديك سيطرة عليهم. إذا لزم الأمر , لا يزال بإمكانك إجراء مرجع تبادلي للحجوزات في هذا النظام مع تلك الموجودة في مدير القناة , وستظهر لك صفحة تفاصيل الحجز رقم الحجز لـ هذا الحجز كما هو مخزّن في مدير القناة. ") ;
jr_define ('BEDS24V2_MASTER_APIKEY' , "الميزة التجريبية - مفتاح واجهة برمجة التطبيقات Master Beds24") ;
jr_define ('BEDS24V2_MASTER_APIKEY_DESC' , "إذا كان لديك بالفعل تثبيت لـ JOMRES مع خصائص مرتبطة بـ BEDS24 , اقرأ الوصف الكامل هنا. بشكل افتراضي , تم تصميم حسابات Jomres لتكون نظامًا أساسيًا للحجز متعدد البائعين. الخصائص من وإلى bed24 بشكل آمن. يسمح لك هذا الإعداد بتجاوز هذه الوظيفة من خلال وجود مفتاح واجهة برمجة تطبيقات واحد لجميع الخصائص. وهذا يعني أنك تحتاج فقط إلى حساب واحد مع Beds24 , ولكن هذا يعني أيضًا أن جميع الرسوم سيتم تراكمها من خلال هذا الحساب الواحد. سيتمكن أي مدير لديه حق الوصول إلى خاصية من إرسال التحديثات إلى الخاصية على خوادم bed24. اتركه فارغًا لتجاهل هذا الإعداد وإجبار مديري الممتلكات على استخدام حساباتهم الخاصة على Beds24. يمكن لمفتاح واجهة برمجة التطبيقات أن يتخذ أي شكل تريده لفترة طويلة حيث أن المفتاح هنا يطابق المفتاح الموجود في <a href='https://www.beds24.com/control2.php؟pagetype=accountpassword' target='_blank'> <em> API Key 1 </em> </ > حقل إذا كان لديك بالفعل INSTALLATI ON OF JOMRES مع خصائص مرتبطة بـ BEDS24: يمكنك التبديل إلى استخدام هذه الميزة , ولكن سيتطلب ذلك أولاً اقتطاع (فارغة) هذه الجداول , وحذف الخصائص الموجودة الموجودة بالفعل في Jomres , ثم إعادة استيراد الخصائص من بيدس 24 إلى جومريس. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> عند تعيين مفتاح API في قسم <em> API Key N </em> في صفحة الوصول إلى الحساب في Beds24 , من الضروري تعيين حقل <em> API Key Access </em> على \" السماح للقائمة البيضاء IP فقط ' وقمت بتعيين رقم IP على <strong> ". $this_servers_ip_number." </strong> ينطبق هذا بشكل متساوٍ على تكوين مفتاح API الرئيسي هنا , وفي الواجهة الأمامية إذا كان مدير الملكية يهيئ واجهة برمجة التطبيقات الفردية الخاصة به مفاتيح. ") ;
jr_define ('BEDS24V2_WHITELIST_WARNING' , "إذا كانت ممتلكاتك متصلة بالفعل بـ Beds24 , فاحذر من أن Beds24 قد أدخلت مؤخرًا سياسة يتم فيها إضافة جميع الخوادم المتصلة بحسابك إلى القائمة البيضاء. يمكنك القيام بذلك في صفحة الوصول إلى الحساب , حيث تم إدخال مفتاح الوصول الخاص بك. حدد القائمة المنسدلة للقائمة البيضاء IP وقم بتعيين رقم IP على ");

jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED' , "ليس لديك حاليًا أي خصائص مرتبطة بخصائص Beds24. يجب إعادة تعيين مفاتيح API الخاصة بمديرك قبل السماح لمديرك بمحاولة الاتصال بـ Beds24. سيضمن هذا امتلاكهم جميعًا مفاتيح فريدة.") ;
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "إعادة تعيين مفاتيح API للمدير الآن") ;
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "تجاهل التحذير") ;