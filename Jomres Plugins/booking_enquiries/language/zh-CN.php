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

jr_define('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE',"邮件主题");
jr_define('_JOMRES_BOOKING_REJECTION_HCONTENT',"电子邮件文本(您可以编辑此文本以填写拒绝此预订的原因,提供替代方案等)");
jr_define('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS',"此预订查询将被拒绝并取消。以下电子邮件将发送给客户。");
jr_define('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE',"无法拒绝此预订查询，因为它已被拒绝或批准。");
jr_define('_JOMRES_BOOKING_APPROVAL_HCONTENT',"电子邮件文本(您可以编辑此文本以填写此预订的付款说明等)");
jr_define('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS',"此预订查询将被接受，并将在日历中更新可用性。以下电子邮件将发送给客户。");
jr_define('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE',"此预订查询无法通过，因为它已被拒绝或批准。");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME',"站点管理员新查询邮件");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC',"如果预订需要先获得批准并启用全球贝宝网关，则在预订时发送给站点管理员的电子邮件");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME',"酒店新查询邮件");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC',"如果预订需要先获得批准，则在预订时发送给酒店的电子邮件");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME',"客人新查询邮件");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC',"如果预订需要先获得批准，在预订时发送给客人的电子邮件");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME',"客人查询批准邮件");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC',"由物业经理手动发送给客人的电子邮件，以确认询问的可用性");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME',"客人询问拒绝邮件");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC',"如果该物业无法查询详细信息，则由物业经理手动发送给客人的电子邮件");