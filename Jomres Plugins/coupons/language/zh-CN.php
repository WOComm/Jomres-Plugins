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

jr_define('JOMRES_COUPONS_SCAN',"将此代码扫描到您的手机并立即预订！");
jr_define('JOMRES_COUPONS_GETADISCOUNT',"获得折扣");
jr_define('JOMRES_COUPONS_PERCENT',"%");
jr_define('JOMRES_COUPONS_OFFACCOMMODATION',"扣除您的住宿费用");
jr_define('JOMRES_COUPONS_IFYOUBOOKBETWEEN',"如果您在两者之间预订");
jr_define('JOMRES_COUPONS_AND'," and ");
jr_define('JOMRES_COUPONS_FORDATESBETWEEN'," 之间的日期");
jr_define('JOMRES_COUPONS_ALTERNATIVELY',"或者，在预订时输入此折扣代码：");
jr_define('JOMRES_COUPONS_PRINT_COUPONS',"打印优惠券");

jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', '预订有效时间');
jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDTO', '预订有效期至');
jr_define('_JRPORTAL_COUPONS_GUESTNAME', '客人姓名');
jr_define('_JRPORTAL_COUPONS_DESC_478', "可以生成折扣代码并将其传递给客人，作为预订的奖励。<br/>
有效起止日期是指可以进行预订的日期，而预订有效起止日期是指预订必须涵盖的日期才能使优惠券有效。如果预订不在该期限内，则该期限以外的天数将适用正常费率。<br/>
如果您希望预订只提供给一位特定客人，请在下拉菜单中选择该客人的姓名以将优惠券仅限于该客人。");
jr_define('_JRPORTAL_COUPONS_DESC_ADMIN', "此处创建的折扣代码将适用于网站上的所有属性。");
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', '使用您的优惠券，此预订已从 ');
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' to ');