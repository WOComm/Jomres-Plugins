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

jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"付款提醒");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"发送付款提醒邮件..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..临时预订后的天数");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"此插件在后台自动运行，并向在您选择的时间间隔内未标记为已付款的临时预订的客人发送付款提醒电子邮件。这在您接受已付款的预订时很有用使用离线支付方式(电汇,支票)。如果在预订后的 X 天内未支付预订费用，则会向客人发送付款提醒电子邮件。您还将收到一份副本. 如果您还使用临时预订处理插件，那么请确保您要发送付款提醒电子邮件的时间间隔比删除或取消未付款预订的时间间隔至少小1天。");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"您在预订的付款提醒");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"您在有一个未付款的预订");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"为了确保您的预订，有必要支付押金");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"预订号");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',"。如果您想讨论付款方式，请联系我们。<br /><br />谢谢。");