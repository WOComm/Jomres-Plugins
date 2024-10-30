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


jr_define ('_JOMRES_PROPERTY_IMPORT_TITLE', "استيراد خاصية") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_DESC' , "تسمح لك هذه الميزة باستيراد الخصائص عبر ملف CSV. بسبب عمليات التحقق المختلفة المطلوبة , نوصيك بتحديد عدد الخصائص التي تم إنشاؤها على دفعات لا تزيد عن 50 خاصية في المرة الواحدة.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_SELECT', "الرجاء اختيار الملف الذي ترغب في تحميله.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS', "يجب أن يحتوي ملف csv على 11 عمودًا , ويجب ألا تحتوي الحقول على أي html. جميع الحقول مطلوبة.") ;

jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME', "اسم الخاصية") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE', "نص") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS' , "عدد الغرف (إذا كانت فيلا / كوخ ريفي , فبغض النظر عن عدد الغرف في العقار الفعلي , يجب أن يكون هذا 1. فقط الفنادق / فنادق المبيت والإفطار وما إلى ذلك يجب أن تحتوي على أكثر من غرفة واحدة). عدد صحيح . ") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE', "عدد صحيح") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE', "سعر الليلة بدون رموز العملات.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE', "Float") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS' , "عنوان البريد الإلكتروني") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE' , "نص") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET', "شارع") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE', "نص") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN', "بلدة") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE', "نص") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION', "المنطقة. يجب أن يتوافق هذا مع معرفات المناطق المخزنة في جدول المناطق") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE', "عدد صحيح") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY' , "بلد الملكية. رمز قصير , مثل GB أو DE , وليس اسم الدولة بالكامل") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE', "نص") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE' , "الرمز البريدي") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE' , "نص") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE', "رقم الهاتف") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE' , "نص") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION' , "الوصف الكامل للخاصية. بحد أقصى 500 حرف") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE' , "نص") ;

jr_define ('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT', "خطأ , لم يتم تعيين نوع الخاصية.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE' , "خطأ , ليس لدينا أي أنواع غرف لهذا النوع من الممتلكات. يمكنك تصحيح ذلك من خلال زيارة بنية الموقع في منطقة المسؤول.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_FILE', "عفوًا , هل نسيت تحميل ملف؟") ;

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS' , "تم العثور على عدد كبير جدًا من الأعمدة , إما أن الملف مشوه أو لم يتم إنشاء بيانات csv بشكل صحيح.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET' , "لم يتم تعيين اسم الخاصية.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT' , "لم يتم تعيين عدد الغرف.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET' , "لم يتم تحديد السعر لكل ليلة.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS', "تعذر التحقق من صحة عنوان البريد الإلكتروني.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET' , "لم يتم تعيين الشارع.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN' , "لم يتم تعيين المدينة.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION' , "لم يتم تعيين المنطقة.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY' , "لم يتم تعيين البلد.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE' , "لم يتم تعيين الرمز البريدي.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE' , "لم يتم تعيين الهاتف.") ;
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION' , "لم يتم تعيين الوصف.") ;

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS', "تم استيراد الخاصية بنجاح!") ;

jr_define ('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES' , "نظرًا لأن لديك خاصية واحدة أو أكثر فشلت في الاستيراد , فقد قمنا بتصدير تلك الخصائص فقط إلى الحقل أدناه. يمكنك نسخ هذه الخصائص إلى حساب ممتاز / مفتوح / اختيارك لمعالج ملف CSV وإصلاحه المشكلات دون الحاجة إلى إعادة استيراد كافة الخصائص مرة أخرى. ") ;