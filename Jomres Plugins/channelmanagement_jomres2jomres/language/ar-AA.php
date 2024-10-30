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

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "تكامل Jomres 2 Jomres") ;

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "معرف عميل الموقع الأصل") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC' , "معرف عميل الموقع الأصلي. ستحتاج في الموقع الأصلي إلى معرف عميل فريد وسر مع تثبيت جميع المكونات الإضافية لميزة واجهة برمجة التطبيقات , وتثبيت المكون الإضافي لـ Channel Management Framework , وعند إنشاء / تحرير معرف العميل / زوج المفاتيح السري الذي ستحتاجه لمنحه حق الوصول إلى جميع النطاقات المتاحة. ") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "سر عميل الموقع الأصل") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "سر عميل الموقع الأصل") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "عنوان url الرئيسي") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "عنوان url لموقع Jomres الرئيسي.") ;

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET' , "خطأ , لم يتم تعيين معرّف عميل الموقع الأصلي. انتقل إلى علامة التبويب تكوين الموقع  حسابات مدير القناة لحفظ معرف العميل الخاص بك.") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "خطأ , لم يتم تعيين سر الموقع الرئيسي الخاص بك. قم بزيارة تكوين الموقع> علامة التبويب حسابات مدير القناة لحفظ سرك.") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "خطأ , لم يتم تعيين عنوان url السري لموقعك الأصلي. انتقل إلى علامة التبويب تكوين الموقع> حسابات مدير القناة لحفظ عنوان url للموقع الأصلي.") ;

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE' , "خطأ , لم يتم تعيين معرف العميل الخاص بك. قم بزيارة تكوين الموقع  علامة التبويب حسابات مدير القناة لحفظ اسم المستخدم الخاص بك.") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE' , "خطأ , لم يتم تعيين معرف العميل الخاص بك. قم بزيارة تكوين الموقع  علامة التبويب حسابات مدير القناة لحفظ كلمة مرورك.") ;

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "إعداد القناة") ;

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: استيراد خصائص جديدة.") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET' , "لم يتم تعيين معرف الخاصية") ;

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET' , "لم يتم تعيين عناصر القاموس المعينة") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND' , "نوع الخاصية المحلية غير موجود. إذا تم إنشاء نوع الخاصية , يرجى التأكد من أنك قمت بتعيين نوع خاصية الخدمة البعيدة لنوع الخاصية المحلية.") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND' , "لم يتم إرجاع نوع الخاصية البعيدة بواسطة القناة.") ;

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND' , "لم يتم تمرير نوع الخاصية المحلية.") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "تعذر تحديد نموذج الحجز (mrp أو srp).") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE' , "تعذر تحديد نموذج الحجز (mrp أو srp) بعد العثور على معرف نوع الخاصية.") ;

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "تعذر تحديد رمز البلد") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "تعذر تحديد معرف المنطقة") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "تعذر التحقق من مجموعة الإعدادات بشكل صحيح") ;

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "أنواع الخصائص التي لم يتم تعيينها بواسطة المسؤول") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "ميزات الخاصية لم يتم تعيينها بواسطة المسؤول") ;
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES' , "أنواع الغرف التي لم يتم تعيينها بواسطة المسؤول") ;
