<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('JOMRES_COUPONS_SCAN', "Сканируйте этот код в свой телефон и бронируйте сейчас!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Получите скидку в размере");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "от стоимости проживания");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "если вы бронируете между");
jr_define ('JOMRES_COUPONS_AND', "и");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "для дат между");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Или введите этот код скидки при бронировании:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Распечатать купоны");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Бронирование действительно с');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Бронирование действительно до');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Имя гостя');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Можно создавать коды скидок и передавать их гостям в качестве стимула для бронирования. <br/>
Даты действия с и по относятся к датам, в которые можно сделать бронирование, а даты, действительные с / по, относятся к датам, которые должны быть покрыты бронированием, чтобы купон был действителен. Если бронирование выходит за пределы этого периода, то в дни, выходящие за рамки этого периода, будут применяться обычные тарифы. <br/>
Если вы хотите, чтобы бронирование было доступно для одного конкретного гостя, выберите имя этого гостя в раскрывающемся списке, чтобы использовать купон только для этого гостя. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Созданные здесь коды скидок будут применяться ко всем свойствам на веб-сайте.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'С вашим купоном на это бронирование была сделана скидка');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' в ');
