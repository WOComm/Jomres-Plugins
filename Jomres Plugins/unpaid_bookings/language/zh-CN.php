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

jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"未付预订处理");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"取消或删除临时(未付款)预订？");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"从预订时间算起还有多少天？");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"此插件在后台自动运行并删除或取消所有在您选择的时间间隔内未标记为已付款的临时预订。当您接受使用离线支付方式(电汇)支付的预订时，这很有用转账,支票)。如果在预订后的 X 天内未支付预订费用，则预订将被删除或取消，日历将显示预订日期可用，以便其他人可以预订这些日期. 当预订被删除或取消时，您和客人都会收到一封电子邮件通知。如果您选择取消预订，那么该预订及其发票将被标记为已取消且不会从数据库中删除，以便您稍后访问它们。如果您选择删除它，那么预订及其发票将从数据库中删除。");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"预订取消");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"由于未支付所需押金，您的预订已被自动取消。这不再是有效预订。如果您想再次预订，请访问我们的网站并重新预订。以下是取消的预订详情。");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"如果您认为误收到此通知，请不要犹豫与我们联系。");