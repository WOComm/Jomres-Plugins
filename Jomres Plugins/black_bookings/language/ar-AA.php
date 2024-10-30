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

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE' , "حجز بسيط") ;
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC' , "الحجوزات السوداء هي الحجوزات التي تشغل غرفة أو غرفًا أو خاصية , ولكنها لا تحتوي على أي بيانات فوترة أو فاتورة. وعادة ما يتم استخدامها للإشارة إلى الحجوزات التي تم إجراؤها من خلال وسيلة أخرى (مثل الهاتف). يمكنك إنشاء حجوزات سوداء لضمان عدم إمكانية حجز هذه الموارد عبر الإنترنت , إما عن طريق مدير العقار أو الضيف. ") ;
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM', "يجب تحديد غرفة واحدة على الأقل.") ;
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED', "تم الحجز بنجاح.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED' , "لا يمكن الحجز لأنه يحتوي بالفعل على حجز خلال هذا الإطار الزمني.") ;
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY', "تم حظر الغرفة بواسطة") ;
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP' , "استخدم هذا التقويم لحجز الموارد بسهولة. اختر غرفة أو غرفًا , ثم انقر على التاريخين الأول والأخير للحجز الأسود وستكون الموارد محجوزة. إذا كان الحجز الأسود لشخص واحد فقط التاريخ , ثم انقر فوق ذلك التاريخ مرتين. ") ;
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP' , "استخدم هذا التقويم لحجز الموارد بسهولة. انقر على التواريخ الأولى والأخيرة للحجز الأسود وسيتم حجز الموارد باللون الأسود. إذا كان الحجز الأسود لتاريخ واحد فقط , فانقر على هذا التاريخ مرتين . ") ;

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL', "إضافة الكل") ;
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL', "إزالة الكل") ;
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "العناصر المحددة") ;
