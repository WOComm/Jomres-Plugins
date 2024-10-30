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


jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET' , "معرف القناة غير محدد") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET' , "لم يتم تعيين معرف المدير") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Channel Manager Framework") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "القنوات") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "القنوات المثبتة") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "حدد قناة") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE' , "اختر نوع القاموس") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "خطأ , لا توجد قنوات مثبتة") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE' , "فحوصات سلامة مدير القناة") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC' , "حدد قناة. بمجرد الانتهاء من ذلك , سنتحقق من التكوين الخاص بك ونبرز أي مشكلات محتملة قد تحتاج إلى معالجتها.") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE' , "تعيين الموارد") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC' , "تحتوي القنوات المختلفة على ما يعرف بالقواميس. هذه مصطلحات لوصف الموارد مثل أنواع الغرف , وميزات الغرفة , وميزات الملكية وما إلى ذلك. قبل أن تتمكن من استخدام القناة , تحتاج إلى تعيين موارد Jomres مختلفة مع قنوات فردية الموارد بحيث تحتوي الخصائص التي يتم استيرادها من القنوات وتصديرها إليها على الموارد الصحيحة. في هذه الصفحة , ستحدد أولاً قناة. وبمجرد الانتهاء , سيتم نقلك إلى صفحة جديدة حيث يمكنك تحديد أنواع الموارد التي تريد تعيينها إلى موارد القناة (على سبيل المثال , ميزات الملكية). بمجرد تحديد نوع المورد , ستتمكن من اختيار موارد Jomres والقناة مع بعضها البعض. ") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE' , "هنا تحتاج إلى تحديد المورد (القاموس)") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "لا توجد عناصر محلية لعنصر القاموس هذا , لذلك لا يوجد شيء يمكن تعيينه مقابل.") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "خطأ , لا تحتوي القناة على فئة قاموس.") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS' , "في هذه الصفحة ستحتاج إلى تعيين عناصر قاموس مدير القناة مع تلك الموجودة في Jomres.") ;

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "حسابات مدير القناة") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "يرجى حفظ معلومات الترخيص لأي مديري قنوات قد يكون لديك حسابات معهم.") ;
jr_define ("إنهاء" , "إنهاء التحرير") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "خطأ , لم يتم تثبيت المكون الإضافي الاختياري Extras.") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED' , "اسم القناة غير مزود") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED' , "كائن خاصية جديد غير مزود") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES' , "كائن JRUser غير مزود") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "بدء استيراد الخاصية") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "تم استيراد الخاصية بنجاح") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "فشل استيراد الخاصية") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "استيراد كافة الخصائص") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "استيراد خاصية") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT' , "لا يمكن استيراد الخصائص التي لم يتم تمييزها على أنها منشورة / نشطة على الخادم البعيد , أو الخصائص التي لا تحتوي على أي عناصر سجل التغيير.") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "بدء استيراد التعريفة") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "تم استيراد التعريفة بنجاح") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "فشل استيراد التعريفة") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION' , "تعذر التحقق من إعدادات الخاصية , تمت محاولة استيراد إعداد خاصية غير معروف") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "الخصائص المستوردة") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME' , "اسم الخاصية") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME' , "اسم القناة") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "معرف الخاصية المحلية") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "معرف الخاصية عن بُعد") ;
jr_define ("CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY" , "تعديل عن بُعد") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "عرض محلي") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "حذف محلي") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "لوحة التحكم") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "حسابات القناة") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED' , "لا توجد مكونات إضافية لقناة رقيقة مثبتة , لا يمكنك استخدام هذه الميزة حتى الآن.") ;
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO' , "يمكن تخصيص الخصائص غير المعينة التي تديرها إلى قناة. إذا قمت بتغيير القناة , فإنك تمنح أي قناة لها وصول صالح إلى واجهة برمجة التطبيقات") ;

