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

jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Обробка неоплачених бронювань");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Скасувати чи видалити тимчасові (неоплачені) бронювання? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Зазначити, скільки днів від часу бронювання? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Цей плагін працює автоматично у фоновому режимі та видаляє або скасовує всі попередні бронювання, які не позначені як оплачені, протягом інтервалу за вашим вибором. Це корисно, якщо ви приймаєте бронювання, оплачені за допомогою офлайнових методів оплати (банківські переказ, чек). Якщо бронювання не оплачено протягом X днів з моменту здійснення бронювання, бронювання видаляється або скасовується, а в календарі відображатимуться заброньовані дати як доступні, тому хтось інший може забронювати ці дні . Коли бронювання буде видалено або скасовано, і ви, і гість отримаєте сповіщення електронною поштою. Якщо ви вирішите скасувати бронювання, бронювання та його рахунок-фактуру будуть позначені як скасовані і не будуть видалені з бази даних , щоб ви могли отримати до них доступ пізніше. Якщо ви вирішите видалити його, бронювання та його рахунок-фактуру буде видалено з бази даних.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Бронювання скасовано");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Ваше бронювання було автоматично скасовано через несплату необхідної застави. Це більше не є дійсним бронюванням. Якщо ви хочете забронювати знову, відвідайте наш веб-сайт і повторіть бронювання. Нижче наведено деталі скасованого бронювання.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Якщо ви вважаєте, що отримали це сповіщення помилково, не соромтеся зв'язатися з нами.");