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

jr_define ('JOMRES_COUPONS_SCAN' , "امسح هذا الرمز في هاتفك واحجز الآن!") ;
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "احصل على خصم") ;
jr_define ('JOMRES_COUPONS_PERCENT', "٪");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION' , "خصم من تكلفة إقامتك") ;
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN' , "إذا حجزت بين") ;
jr_define ('JOMRES_COUPONS_AND', "و") ;
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN' , "للتواريخ الواقعة بين") ;
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "بدلاً من ذلك , أدخل رمز الخصم هذا عند إجراء الحجز:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "طباعة كوبونات") ;

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'الحجز صالح من') ;
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO' , 'الحجز صالح لـ') ;
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'اسم الضيف') ;
jr_define ('_JRPORTAL_COUPONS_DESC_478' , "يمكن إنشاء رموز الخصم وتمريرها إلى الضيوف كحافز لإجراء الحجوزات. <br/>
تشير التواريخ الصالحة من وإلى التواريخ التي يمكن إجراء الحجز فيها , بينما يشير الحجز صالح من / إلى التواريخ التي يجب أن يغطيها الحجز حتى تكون القسيمة صالحة. إذا كان الحجز خارج تلك الفترة , فسيتم تطبيق الأسعار العادية على الأيام التي تقع خارج تلك الفترة. <br/>
إذا كنت تريد أن يكون الحجز متاحًا لضيف واحد محدد , فاختر اسم ذلك الضيف في القائمة المنسدلة لقصر القسيمة على ذلك الضيف فقط. ") ;
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN' , "رموز الخصم التي تم إنشاؤها هنا ستكون قابلة للتطبيق على جميع الخصائص على موقع الويب.") ;
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'مع قسيمتك , تم خصم هذا الحجز من') ;
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' to ');
