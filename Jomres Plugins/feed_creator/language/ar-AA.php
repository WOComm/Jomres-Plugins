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


jr_define ('_JRPORTAL_FEED_CREATOR_TITLE', "موجز RSS") ;
jr_define ('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS', "ينشئ هذا المكون الإضافي موجزًا ​​من جميع خصائص jomres. حاليًا يتم دعم تنسيقات مشاركة RSS 1.0 و RSS 2.0.") ;
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDNAME', "اسم الخلاصة") ;
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDDESC', "وصف الخلاصة") ;
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME', "اسم ملف التغذية (بدون مسافات)") ;
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT', "تنسيق المشاركة") ;
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME', "وقت التخزين المؤقت (بالثواني)") ;
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL', "عنوان URL الخاص بالصورة") ;
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATATESC', "اقتطاع وصف الخاصية؟");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATATESCSIZE', "اقتطاع بعد (حرف)") ;
jr_define ('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE', "إظهار صورة الخلاصة؟") ;
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE', "إظهار صورة الخاصية؟") ;
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN', "إظهار مدينة الملكية؟") ;
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION', "إظهار منطقة الخاصية؟") ;
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY', "إظهار بلد الملكية؟") ;
jr_define ('_JRPORTAL_FEED_CREATOR_HITEMS', "تحديد عدد الخصائص المشتركة على") ;