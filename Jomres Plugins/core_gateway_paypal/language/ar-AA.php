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


jr_define ('PAYPAL_API_KEY_TITLE', "Paypal API Key") ;
jr_define ('PAYPAL_API_KEY_TITLE_DESC' , "تكوين معرّف وسر عميل Paypal الخاصين بك لكل من حساباتك الحية وحسابات Sandbox. بمجرد التهيئة , ستتمكن من تلقي مدفوعات الحجز والفواتير من خلال Paypal.") ;

jr_define ('PAYPAL_API_CLIENTID', "معرّف العميل") ;
jr_define ('PAYPAL_API_SECRET', "سري") ;
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "معرّف عميل Sandbox") ;
jr_define ('PAYPAL_API_SECRET_SANDBOX', "Sandbox Secret") ;

jr_define ('PAYPAL_API_CLIENTID_FINDING', "كيف تجد معرّف العميل والسر الخاصين بك؟") ;

jr_define ('PAYPAL_API_CLIENTID_STEP1' , 'اذهب إلى https://developer.paypal.com/ وتسجيل الدخول.') ;
jr_define ('PAYPAL_API_CLIENTID_STEP2', "اذهب إلى تطبيقاتي وبيانات الاعتماد في القائمة الجانبية.") ;
jr_define ('PAYPAL_API_CLIENTID_STEP3' , "انقر فوق إنشاء تطبيق لإنشاء تطبيق جديد") ;
jr_define ('PAYPAL_API_CLIENTID_STEP4', "امنح تطبيقك اسمًا , ثم انقر فوق إنشاء تطبيق.") ;
jr_define ('PAYPAL_API_CLIENTID_STEP5' , "في هذه الصفحة يمكنك رؤية معرف العميل والسرية. انسخ والصق هذين المفتاحين في الحقول المعنية أعلاه.") ;