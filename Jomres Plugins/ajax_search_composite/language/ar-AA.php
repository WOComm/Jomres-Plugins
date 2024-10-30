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

jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE', "Ajax Search Composite") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "بحث بالنجوم") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "بحث حسب الأسعار") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "بحث بالميزات") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "بحث حسب البلد") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "بحث حسب المنطقة") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "بحث حسب المدينة") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "بحث حسب نوع الغرفة") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "بحث حسب نوع الخاصية") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "بحث بأرقام المدعوين") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "بحث حسب التواريخ") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "نمط القالب") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "الافتراضي: مربعات اختيار أو أزرار بسيطة في الغالب إذا كانت في Bootstrap. الأشكال: تفتح الأزرار للسماح للمستخدمين بتحديد عوامل تصفية البحث. تم تصميم الأكورديون أعلى الصفحة , وتنزلق المناطق لأسفل للكشف عن المرشحات. التحديد المتعدد: الأزرار القائمة المنسدلة إلى تكشف عن المرشحات. ") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "أزرار (اتجاه عمودي)") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "الوسائط (الاتجاه العمودي) التمهيد فقط.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "الأكورديون (الاتجاه الأفقي) التمهيد فقط.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "التحديد المتعدد (الاتجاه الأفقي) التمهيد فقط.") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "إظهار عوامل التصفية") ;
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "إخفاء المرشحات") ;


jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO' , "يستخدم إطار عمل بحث ajax. يسمح لك بوضع وحدة بحث تقدم البحث عن مدى التوفر , ونطاق السعر , والميزات , ونوع الملكية , ونوع الغرفة , وأرقام الضيوف , والنجوم , والبلد , والمنطقة والبلدة في شريط جانبي أو الشريط العلوي. يرجى ملاحظة أن المثال الموضح هنا لن يعمل لأن بعض الوسائط تلغي بعضها البعض , اختر فقط ما تحتاجه من الوسائط المتاحة (باستثناء الوسيطة المطلوبة). يختلف هذا الرمز القصير قليلاً عن معظم الوسائط الأخرى الرموز القصيرة حيث يجب أن تكون مصحوبة بعلامة div خاصة بعد إعلان الرمز القصير مع معرف asamodule_search_results حيث يضع الملحق قائمة الخصائص التي تم إرجاعها. ") ;

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN',"Required. Argument must be 'ajax_search_composite'");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE',"Search fields style. Options are buttons modals accordion multiselect If not set then the plugin will use the option cofigured in Site Configuration. Multiselect/Accordion are ideal for horizontal display, the other two options are best for placement in a sidebar.");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS',"Show the search form on the if the page task is set to viewproperty ( the property details page ). 0 for No, 1 for Yes.");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS' , "التصفية المسبقة هي المكان الذي تختار فيه فقط تلك الخصائص التي تفي بشرط التصفية المسبقة يمكن عرضها في نتائج البحث. التصفية المسبقة حسب uid للخاصية , لذلك يمكن عرض بعض الخصائص فقط في نتائج البحث. قائمة معرّفات الممتلكات مفصولة بفواصل ") ;
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "تصفية مسبقة حسب نوع الخاصية , لذلك يمكن فقط عرض خصائص هذا / هذه الأنواع في نتائج البحث. الوسائط هي قائمة مفصولة بفاصلة لمعرفات نوع الخاصية.") ;
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "التصفية المسبقة حسب رمز البلد , بحيث يمكن فقط عرض الخصائص في هذه البلدان في نتائج البحث. الوسائط هي قائمة مفصولة بفواصل لرموز الدول ISO.") ;
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION' , "تصفية مسبقة حسب اسم المنطقة , لذلك يمكن فقط عرض الخصائص في هذه المناطق في نتائج البحث. الوسائط هي قائمة مفصولة بفواصل لأسماء المناطق ويجب أن تتطابق مع المناطق المخزنة في قاعدة البيانات. قمت بتعيين البلد على ألمانيا (DE) على سبيل المثال , فلن يتم عرض الخصائص من البلدان الأخرى التي لها أسماء مناطق مماثلة. ") ;

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS',"Enable/Disable the Stars input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_stars' in the arguments list will have no effect.");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE',"Enable/Disable the Stars input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_price' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES',"Enable/Disable the Property features input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_features' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY',"Enable/Disable the Country input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_country' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION',"Enable/Disable the Region input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_region' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN',"Enable/Disable the Town input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_town' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE',"Enable/Disable the Room type input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_roomtype' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE',"Enable/Disable the Property type input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_propertytype' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER',"Enable/Disable the Guest numbers input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_guestnumber' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE',"Enable/Disable the Date input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_date' in the arguments list will have no effect.");