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


jr_define ('STRIPE_TITLE', "Stripe") ;
jr_define ('STRIPE_CONNECT_CONFIG_INFO' , "تم تصميم بوابة Stripe هذه خصيصًا للسماح لك كمدير للموقع بتلقي جزء من المدفوعات التي يتم إجراؤها لمديري العقارات في وقت الحجز. قبل أن يمكن استخدامها , يجب عليك أولاً إعداد تكاملك الخاص مع Stripe الاتصال. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  يمكن العثور على وثائق هذا المكون الإضافي هنا. </a> <br/> إذا نقرت على حفظ في هذه الصفحة , لتمكين هذا المكون الإضافي من العمل بسلاسة  سيتم تعطيل جميع البوابات الأخرى </ قوي> قبل البدء , تأكد من أنك انتقلت إلى صفحة Stripe Connect الخاصة بك وأشرت إلى أنك تقوم بإعداد نظام أساسي. وبمجرد الانتهاء من ذلك , اتبع التعليمات التي تظهر على الشاشة لإعداد حسابك. قبل أن يتمكن المديرون من ربط حساباتهم بحسابك. يجب زيارة الإعدادات> إعدادات الاتصال وفي منطقة إعدادات OAuth  التي تم تمكين OAuth للحسابات القياسية ثم انقر فوق حفظ (ملاحظة , ستحتاج إلى القيام بذلك في وضعي الاختبار والعيش). ") ;

jr_define ('STRIPE_REGISTER_CONNECT', "تواصل معنا!") ;
jr_define ('STRIPE_REGISTER_CONNECT_BLURB' , "لقد قمت بالتسجيل , لكن الاتصال لم يكتمل بعد. تحتاج إلى ربط حسابك على Stripe بموقعنا على الويب. بمجرد الانتهاء من ذلك , يمكنك إضافة جميع ممتلكاتك إلى موقعنا والبدء في إجراء الحجوزات . ") ;

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE' , "مرحبًا بك في") ;
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB' , "قبل أن تتمكن من البدء في إعداد الممتلكات الخاصة بك , تحتاج إلى ربطنا بحساب Stripe الخاص بك. انقر فوق الارتباط للبدء.") ;

jr_define ('STRIPE_SETUP_INFO', "نحتاج الآن إلى ربط حسابك بحسابنا , وهذا سيسمح لنا بتحصيل المدفوعات نيابة عنك , لذا انقر فوق الزر اتصال ليتم نقلك إلى Stripe حيث يمكنك تأكيد الاتصال.") ;
jr_define ('STRIPE_SETUP_DONE', "أنت متصل بالفعل معنا , ليس هناك المزيد للقيام به هنا! أغلق هذه النافذة ودعنا نبدأ أعمال ممارسة الأعمال التجارية.") ;
jr_define ('STRIPE_SETUP_THANKS', "شكرًا لك على التواصل معنا! يمكنك إغلاق هذه النافذة الآن.") ;
jr_define ('STRIPE_SETUP_DISCONNECT', "افصل حسابك.") ;
jr_define ('STRIPE_SETUP_DISCONNECTED', "الحساب غير متصل , يمكنك إغلاق هذه النافذة الآن.") ;

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "معرف عميل Stripe Connect") ;
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC' , "يمكنك الحصول على معرف عميل Stripe من <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> لوحة التحكم> الإعدادات> الاتصال بواجهة برمجة التطبيقات المفاتيح موجودة ضمن خيار قائمة المطورين. </a> ") ;
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "يُرجى التأكد من تعيين عنوان URI لإعادة التوجيه في <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> الاتصال> الإعدادات </a> إلى <br/> ") ;

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "المفتاح السري") ;
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "المفتاح العام") ;

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION' , "عمولتك") ;
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC' , "يتم اقتطاع هذه العمولة من الدفعة المرسلة إلى مدير الممتلكات في وقت الحجز. ثم يتم وضعها في حسابك على Stripe بواسطة Stripe. <br/> هذه هي النسبة المئوية للعمولة التي ستفرضها على مديري العقارات حجوزاتهم. يتم تحصيل عمولتك بناءً على التكلفة الكاملة للحجز , وليس قيمة الإيداع. <br/> مهما قمت بتعيين هذه القيمة , نوصيك بتهيئة تكوين الموقع -> نموذج الحجز -> الحد الأدنى للإيداع ليكون ضعف هذا الرقم على الأقل , لذلك إذا كنت تريد تحصيل عمولة بنسبة 10٪ , فيجب أن يكون الحد الأدنى للإيداع 20٪. ") ;

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "رسوم الشريط الأوروبية") ;
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC' , "هذه هي النسبة المئوية التي يفرضها Stripe عليك مقابل إجراء دفعات على موقعك. حاليًا يتقاضون 1.4٪ للبطاقات الأوروبية , و 2.9٪ للبطاقات غير الأوروبية. هذا الرقم مطلوب لتحديد الأسعار عند الحجز و وقت الدفع.");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "رسوم الشريط بغير اليورو") ;

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD' , "رقم البطاقة") ;
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "انتهاء الصلاحية (MM / YY)") ;
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Billing Zip") ;

jr_define ('STRIPE_PAYMENT_FORM_SECURE' , "نموذج الدفع الآمن") ;
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "تفاصيل الفواتير") ;
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "تفاصيل البطاقة") ;
jr_define ('STRIPE_PAYMENT_FORM_HOLDER' , "اسم حامل البطاقة") ;
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "ادفع الآن") ;
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "للدفع الآن") ;

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY' , 'الشارع مطلوب ولا يمكن أن يكون فارغًا') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH' , 'يجب أن يكون طول الشارع أكثر من 6 وأقل من 96 حرفًا') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY' , 'المدينة مطلوبة ولا يمكن أن تكون فارغة') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY' , 'الرمز البريدي مطلوب ولا يمكن أن يكون فارغًا') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH' , 'يجب أن يكون الرمز البريدي أكثر من 3 وأقل من 12 حرفًا') ;
jr_define ("STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY" , "عنوان البريد الإلكتروني مطلوب ولا يمكن أن يكون فارغًا") ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID' , 'الإدخال ليس عنوان بريد إلكتروني صالحًا') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH' , 'يجب أن يكون البريد الإلكتروني أكثر من 6 وأقل من 65 حرفًا') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY' , 'اسم حامل البطاقة مطلوب ولا يمكن أن يكون فارغًا') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH' , 'يجب أن يكون اسم حامل البطاقة أكثر من 6 وأقل من 70 حرفًا') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY' , 'رقم بطاقة الائتمان مطلوب ولا يمكن أن يكون فارغًا') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID' , 'رقم بطاقة الائتمان غير صالح') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY' , 'شهر انتهاء الصلاحية مطلوب') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS' , 'يمكن أن يحتوي شهر انتهاء الصلاحية على أرقام فقط') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY' , 'سنة انتهاء الصلاحية مطلوبة') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS' , 'يمكن أن تحتوي سنة انتهاء الصلاحية على أرقام فقط') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'السيرة الذاتية مطلوبة ولا يمكن أن تكون فارغة') ;
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID' , 'القيمة ليست CVV صالحة') ;

jr_define ('STRIPE_PAYMENT_FAILED', "عذرًا , لم نتمكن من معالجة دفعتك في هذا الوقت.") ;
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "الرجاء المحاولة مرة أخرى") ;

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "تم رفض الدفع.") ;
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "عدد كبير جدًا من الطلبات المقدمة إلى API بسرعة كبيرة جدًا") ;
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS' , "تم توفير معلمات غير صالحة لواجهة برمجة تطبيقات Stripe") ;
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED' , "فشلت المصادقة مع Stripe's API") ;
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "فشل اتصال الشبكة مع Stripe (هل انقطع اتصالك بالإنترنت؟)") ;
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT' , "حدث خطأ لم يتم تسجيله") ;