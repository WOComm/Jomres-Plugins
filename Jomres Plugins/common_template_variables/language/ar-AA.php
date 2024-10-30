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


jr_define ('_COMMON_STRINGS_TITLE', "متغيرات القالب الشائعة") ;

jr_define ('_COMMON_STRINGS_INFO' , "أداة المطور. مصممة لإظهار السلاسل المشتركة للمطورين المتوفرة لجميع القوالب دون الحاجة إلى إضافتها إلى البرنامج النصي لاستدعاء النموذج. <br/> على سبيل المثال , في هذه القائمة يوجد التعريف COMMON_NEXT. مطور يمكنك إضافة هذا إلى قالب Jomres دون الحاجة إلى تعريفه في البرنامج النصي للاستدعاء. يمكنك إضافة السلسلة الشائعة إلى القالب تمامًا مثل أي سلسلة أخرى , عن طريق وضع & # 123 ; &#123;COMMON_NEXT &#125 ; في القالب. <br/> في القائمة أدناه سترى الثابت كما هو محدد في ملف اللغة , وبجانبه الناتج الذي سيظهره (بشرط وجود أي تخصيصات لغة معينة). لاحظ , في حالة الثابت 'COMMON_LAST_VIEWED_PROPERTY_UID' , يختلف uid الخاص بالخاصية ولا يظهر في هذه القائمة. ") ;
jr_define ('_COMMON_STRINGS_CONSTANT', "ثابت") ;
jr_define ('_COMMON_STRINGS_VALUE', "Output") ;