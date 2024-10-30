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

jr_define ('_JRPORTAL_PAYMENT_REMINDER_TITLE', "Напоминания о платеже");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1', "Отправить электронное письмо с напоминанием об оплате ..");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2', ".. дней после предварительного бронирования");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS', "Этот плагин автоматически запускается в фоновом режиме и отправляет электронное письмо с напоминанием об оплате гостям, которые сделали предварительные бронирования, которые не помечены как оплаченные в течение выбранного вами интервала. Это полезно, когда вы принимаете оплаченные бронирования с использованием автономных способов оплаты (банковский перевод, чек). Если бронирование не будет оплачено в течение X дней с момента его оформления, гостю будет отправлено электронное письмо с напоминанием об оплате. Вы также получите его копию. .Если вы также используете плагин Provisional Bookings Handling, убедитесь, что интервал, с которым вы хотите отправлять электронное письмо с напоминанием об оплате, как минимум на 1 день меньше, чем интервал, установленный для удаления или отмены неоплаченного бронирования. ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE', "Напоминание об оплате для вашего бронирования в");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1', "У вас есть неоплаченное бронирование в");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2', "Чтобы защитить ваше бронирование, необходимо внести депозит в размере");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO', "Номер бронирования");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3', ". Свяжитесь с нами, если вы хотите обсудить варианты оплаты. <br /> <br /> Спасибо.");