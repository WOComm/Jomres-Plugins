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


jr_define ('_JRPORTAL_NEARBY_PROPERTYS_TITLE', "خصائص قريبة") ;
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_TITLE_FRONTEND', "خصائص قريبة") ;
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_HRADIUS', "Radius") ;
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_HLISTLIMIT' , "الحد الأقصى لعدد الخصائص القريبة المراد عرضها") ;
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_HPTYPE_ENABLED', "إظهار الخصائص التي لها نفس نوع الخاصية مثل الخاصية المعروضة حاليًا؟");
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE', "تقريبًا") ;
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_KM', "km") ;
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_MILES', "أميال") ;
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_INSTRUCTIONS' , "قبل استخدام هذا المكون الإضافي , تحتاج إلى التأكد من إدخال إحداثيات خطوط الطول والعرض الصحيحة لجميع الخصائص. ليس من الضروري تمكين خرائط Google إذا كنت لا تريد ذلك , ولكن فقط أدخل إحداثيات لأنه سيتم استخدامها للبحث عن العقارات القريبة في نصف القطر الذي اخترته وحساب المسافة من الخاصية الحالية (الخاصية التي يتم عرضها حاليًا). ") ;
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY', "لا توجد خصائص أخرى قريبة.");
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY2', "within") ;