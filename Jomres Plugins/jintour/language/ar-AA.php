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


jr_define ('_JINTOUR_TITLE', "إدارة الجولة / النشاط");

jr_define ('_JINTOUR_PROFILES_TITLE' , "الملفات الشخصية للجولة / النشاط") ;
jr_define ('_JINTOUR_PROFILES_NEW', "ملف تعريف جولة / نشاط جديد") ;
jr_define ('_JINTOUR_PROFILES_DELETE', "حذف الملف الشخصي للجولة / النشاط") ;

jr_define ('_JINTOUR_PROFILE_TITLE', "عنوان الملف الشخصي") ;
jr_define ('_JINTOUR_PROFILE_DESCRIPTION', "الوصف") ;
jr_define ('_JINTOUR_PROFILE_DESCRIPTION_INFO', "أدخل وصفًا لجولتك / نشاطك , بما في ذلك خط سير الرحلة.") ;
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK', "أيام الأسبوع") ;
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO', "") ;
jr_define ('_JINTOUR_PROFILE_PRICE_ADULTS', "سعر الكبار") ;
jr_define ('_JINTOUR_PROFILE_PRICE_KIDS', "سعر الطفل") ;
jr_define ('_JINTOUR_PROFILE_PRICE_KIDS_INFO' , "لاستبعاد خيار من الظهور في نموذج الحجز , اترك السعر على أنه 0 (صفر)") ;
jr_define ('_JINTOUR_PROFILE_SPACES_ADULTS', "مساحات للبالغين") ;
jr_define ('_JINTOUR_PROFILE_SPACES_KIDS' , "المساحات الفرعية") ;
jr_define ('_JINTOUR_PROFILE_SPACES_INFO', "عدد المساحات المتاحة في الجولة / النشاط") ;
jr_define ('_JINTOUR_PROFILE_START_DATE', "بداية الموسم") ;
jr_define ('_JINTOUR_PROFILE_END_DATE', "انتهاء الموسم") ;

jr_define ('_JINTOUR_PROFILE_GENERATE_INFO' , "بمجرد إنشاء ملف تعريف للجولة / النشاط , ستحتاج بعد ذلك إلى إنشاء جولات / أنشطة بناءً على إعدادات هذا الملف الشخصي. قم بإنشاء الجولة / النشاط , ثم انقر فوق رمز السهم الأخضر بجوار هذا الملف الشخصي لإنشاء الجولات / الأنشطة بأنفسهم. بمجرد إنشاء الجولات / الأنشطة , ستتمكن من حذف الجولات / الأنشطة الفردية إذا كنت ترغب في ذلك. ") ;
jr_define ('_JINTOUR_PROFILE_GENERATE', "إنشاء جولات / أنشطة");

jr_define ('_JINTOUR_TOUR_TITLE', "عنوان النشاط") ;
jr_define ('_JINTOUR_TOUR_DATE', "التاريخ") ;
jr_define ('_JINTOUR_TOUR_ADULTS', "الكبار") ;
jr_define ('_JINTOUR_TOUR_KIDS', "أطفال") ;
jr_define ('_JINTOUR_TOUR_ITINERY', "خط سير الرحلة") ;

jr_define ('_JINTOUR_TOUR_SAVE_AUDIT', "جولات جديدة تم إنشاؤها") ;
jr_define ('_JINTOUR_TOUR_CANCEL_AUDIT', "تم إلغاء حجز الرحلة") ;
jr_define ('_JINTOUR_TOUR_SAVE_MESSAGE', "تم إنشاء جولات جديدة") ;
jr_define ('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE', "المساحات المتاحة حاليًا") ;

jr_define ('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT', "حجز جديد للجولة / معرف المورد") ;
jr_define ('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE', "تم إجراء حجز جديد لجولة / مورد مسؤول. يرجى عرض الارتباط التالي لعرض صفحة منطقة مسؤول هذه الجولة") ;

jr_define ('_JINTOUR_TITLE_CONFIG', "تكوين جولات Jomres المتكاملة") ;
jr_define ('_JINTOUR_TITLE_WHOLESITE' , "هل التثبيت بأكمله هو تثبيت Jintour؟") ;
jr_define ('_JINTOUR_TITLE_WHOLESITE_DESC' , "إذا قمت بتعيين هذا إلى نعم , فستكون جميع الخصائص هي خصائص جولة. إذا قمت بتعيينها إلى لا , فعند إنشاء خصائص جديدة , ستتمكن من الحصول على خصائص نوع الجولة والفندق / الشقة. ") ;

jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS', "جولات") ;
jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC' , "اختر خيار الجولات إذا كنت تقدم حجوزات للعناصر المتوفرة في تواريخ معينة (على سبيل المثال , الجولات وتذاكر حفلة موسيقية.)") ;
jr_define ('_JINTOUR_SHOWDEPARTURE', "إظهار حقل إدخال المغادرة؟") ;
jr_define ('_JINTOUR_SHOWDEPARTURE_DESC' , "اضبط هذا على نعم إذا كنت تريد إظهار تاريخ الوصول والمغادرة. سيكون هذا مفيدًا إذا كنت تقدم رحلات بالحافلة , وتذاكر طيران , وما إلى ذلك , حيث تحتاج إلى معرفة تواريخ الوصول والمغادرة , يتيح لك إظهار تاريخ المغادرة عرض الموارد على مدار تواريخ متعددة , بينما مع ضبط الإعداد على لا , يمكن قبول الحجوزات لتاريخ واحد فقط. ") ;

jr_define ('_JINTOUR_PROFILES_TITLE_LIST', "قائمة الجولات") ;