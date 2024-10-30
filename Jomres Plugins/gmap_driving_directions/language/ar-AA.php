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


jr_define ('_JRPORTAL_GMAPS_DD_YES', "نعم") ;
jr_define ('_JRPORTAL_GMAPS_DD_NO', "لا") ;
jr_define ('_GOOGLE_ADDRESS', "العنوان") ;
jr_define ('_GOOGLE_INPUT_FIELDSET_POSTALCODE', "الرمز البريدي") ;
jr_define ('_GOOGLE_INPUT_FIELDSET_TOWN' , "المدينة") ;
jr_define ('_GOOGLE_INITIALIZE_ERROR1' , "تم بلوغ الحد الأقصى لعدد نقاط المسار 9") ;
jr_define ('_GOOGLE_INITIALIZE_ERROR2' , "تعذر على Google حساب الاتجاهات لهذا المسار والخيارات المحددة") ;
jr_define ('_GOOGLE_DIRECTION_PRINT', "طباعة الاتجاهات") ;
jr_define ('_GOOGLE_ROUTEPLANNING', "التخطيط لمسارك إلى") ;
jr_define ('_GOOGLE_ROUTEPLANNING_HYOURLOCATION', "موقعك (نقطة بداية المسار)") ;
jr_define ('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS', "خيارات المسار") ;
jr_define ('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR', "تحسين لـ") ;
jr_define ('_GOOGLE_ROUTEPLANNING_HDRIVING', "القيادة") ;
jr_define ('_GOOGLE_ROUTEPLANNING_HWALKING', "المشي") ;
jr_define ('_GOOGLE_ROUTEPLANNING_HCYCLING', "ركوب الدراجات") ;
jr_define ('_GOOGLE_ROUTEPLANNING_HHIGHWAYS', "تجنب الطرق السريعة") ;
jr_define ('_GOOGLE_ROUTEPLANNING_HTOLLS', "تجنب الرسوم") ;
jr_define ('_GOOGLE_SELECT_BUTTON', "الحصول على الاتجاهات") ;
jr_define ('_GOOGLE_SELECT_RESETMAP', "إعادة تعيين الخريطة") ;
jr_define ('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS' , "وجهتك (نقطة نهاية الطريق) محددة بالفعل على الخريطة. يرجى إدخال موقعك واختيار خيارات المسار للحصول على الاتجاهات إلى نقطة الوجهة. يمكنك أيضًا النقر على الخريطة لاختيار ما يصل إلى 9 نقاط الطريق من نقطة البداية إلى نقطة الوجهة. ") ;