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

jr_define ('_JRPORTAL_PAYMENT_REMINDER_TITLE', "Нагадування про платежі");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Надіслати електронною поштою нагадування про платіж..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..днів після попереднього бронювання");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Цей плагін працює автоматично у фоновому режимі та надсилає гостям нагадування про оплату електронною поштою, які зробили попередні бронювання, які не позначені як оплачені протягом інтервалу за вашим вибором. Це корисно, коли ви приймаєте оплачені бронювання з використанням способів оплати в автономному режимі (банківський переказ, чек). Якщо бронювання не оплачено протягом X днів від моменту здійснення бронювання, гостю буде надіслано електронний лист із нагадуванням про оплату. Ви також отримаєте його копію . Якщо ви також використовуєте плагін обробки попереднього бронювання, переконайтеся, що інтервал, через який ви хочете надіслати електронний лист із нагадуванням про оплату, принаймні на 1 день менший, ніж той, який встановлений для видалення або скасування неоплаченого бронювання.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Нагадування про оплату за бронювання в ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"У вас є неоплачене бронювання на ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Щоб захистити ваше бронювання, необхідно внести депозит у розмірі ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO', "Номер бронювання");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Будь ласка, зв'яжіться з нами, якщо ви хочете обговорити варіанти оплати.<br /><br />Дякуємо.");