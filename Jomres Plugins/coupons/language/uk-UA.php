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

jr_define ('JOMRES_COUPONS_SCAN', "Відскануйте цей код у свій телефон і забронюйте зараз!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Отримайте знижку на");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "від вартості вашого проживання");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "якщо ви бронюєте між");
jr_define ('JOMRES_COUPONS_AND', "і");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "для дат між");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Крім того, введіть цей код знижки під час бронювання:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Друк купонів");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Бронювання дійсне з');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Бронювання дійсне до');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Ім\'я гостя');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Коди знижок можна генерувати та передавати гостям як стимул для бронювання. <br/>
Дійсні дати та дати стосуються дат, на які можна здійснити бронювання, тоді як бронювання, дійсне з/до дат, відноситься до дат, які бронювання повинно охоплювати, щоб купон був дійсним. Якщо бронювання виходить за межі зазначеного періоду, до днів поза цим періодом застосовуватимуться звичайні тарифи. <br/>
Якщо ви хочете, щоб бронювання було доступне одному конкретному гостю, виберіть ім’я цього гостя у спадному меню, щоб обмежити купон лише цим гостем. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Коди знижок, створені тут, застосовуватимуться до всіх об’єктів веб -сайту.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'З вашим купоном це бронювання знижено');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' to ');