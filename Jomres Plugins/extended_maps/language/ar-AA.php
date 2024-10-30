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


jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "الخرائط الموسعة") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "عرض الخريطة (بكسل)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "ارتفاع الخريطة (بكسل)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "مستوى تكبير الخريطة") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "تجاوز قائمة خصائص Jomres الافتراضية؟") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "رمز علامة أحداث / مناطق جذب أخرى") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "عرض النوافذ المنبثقة (بكسل)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "عرض الصورة (بكسل)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "ارتفاع الصورة (بكسل)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "عرض وصف الخاصية؟ (للإيجارات المنبثقة فقط)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Trim property description؟ (للإيجارات المنبثقة فقط)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "اقتطاع وصف الخاصية بعد (الأحرف) (للنوافذ المنبثقة للتأجير فقط)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "علامات المجموعة") ;

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "تعرض خريطة بمجموعات من الخصائص والأحداث / مناطق الجذب المحلية.") ;
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS' , "حدد أنواع الخصائص التي تريد إظهارها. مفصولة بفواصل.") ;
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "إظهار الخصائص؟ قم بالتعيين إلى 0 لمنع ظهورها.") ;
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS' , "هل تريد إظهار الأحداث؟ قم بالتعيين على 0 لمنع ظهورها.") ;
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "إظهار المعالم السياحية؟ اضبط على 0 لمنع عرضها.") ;
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY' , "رمز الدولة ISO. استخدم هذا الخيار لقصر الخريطة على بلد واحد.") ;
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION' , "اضبط معرف المنطقة لقصر النتائج على الخصائص في منطقة محددة.") ;
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN' , "قم بتعيين اسم بلدة لقصر النتائج على خصائص مدينة معينة.") ;

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
