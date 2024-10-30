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

jr_define ('JOMRES_COUPONS_SCAN', "Сканирайте този код в телефона си и резервирайте сега!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Получете отстъпка от");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "извън цената на вашето настаняване");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "ако резервирате между");
jr_define ('JOMRES_COUPONS_AND', "и");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "за дати между");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Алтернативно въведете този код за отстъпка, когато правите резервацията си:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Печат на купони");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Резервация валидна от');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Резервация валидна до');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Име на гост');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Кодовете за отстъпки могат да бъдат генерирани и предадени на гостите като стимул за извършване на резервации. <br/>
Валидни от и до дати се отнасят до датите, на които може да се направи резервация, докато резервацията, валидна от/до дати, се отнася до датите, които резервацията трябва да покрие, за да бъде валиден купонът. Ако една резервация е извън този период, тогава за дните извън този период ще се прилагат нормални тарифи. <br/>
Ако искате резервацията да бъде достъпна за един конкретен гост, изберете името на този гост в падащото меню, за да ограничите купона само до този гост. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Кодовете за отстъпки, създадени тук, ще бъдат приложими за всички имоти на уебсайта.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'С вашия купон тази резервация е намалена от');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' до ');