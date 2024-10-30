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

jr_define('_SUBSCRIPTIONS_ACTIVE',"活动");
jr_define('_SUBSCRIPTIONS_EXPIRED',"未激活");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"付款状态");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"级别");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"编辑订阅");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"发送订阅到期提醒邮件？");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"发送提醒邮件");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"订阅到期前的天数");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"订阅过期时发送邮件？");
jr_define('_SUBSCRIPTIONS_MY',"我的订阅");
jr_define('_SUBSCRIPTIONS_HRENEW',"续订");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"订阅续订");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"您已经订阅，请重新购买。");
jr_define('_SUBSCRIPTIONS_HEDIT',"编辑订阅包");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"输入用户名的前几个字母，你会看到一个包含用户名的下拉列表。点击一个用户名来选择它。");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"此订阅包不再可用，无法续订，请考虑升级。");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"您尚未订阅此套餐，因此无法续订。");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"此套餐没有续订选项");
jr_define('_SUBSCRIPTIONS_CANCEL',"取消订阅");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"频率(天)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"订阅的天数");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"此包不允许续订。​​");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"续订价格");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"将此设置为 0 以禁用此套餐的续订或输入续订价格");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"包选项");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"包裹详情");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"您的订阅包");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"您的订阅包不包括访问此功能。要使用此功能，您需要升级您的订阅。");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "您的订阅已过期，您的所有房源都已取消发布。房客不再能看到您的房源，您将无法再从我们的网站接收在线预订。要继续使用我们的服务，请发布您的列表并开始接收在线预订，请登录您的帐户并购买续订。");
jr_define('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"您的订阅地址");
jr_define('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"已过期");
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"这是一个通知，让您知道您的订阅即将到期。要继续使用我们的服务，请登录您的帐户并购买续订。");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"订阅包");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"姓名");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"描述");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"已发布");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"频率");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"价格");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"业务限制");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"此订阅包可添加的最大企业数");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"订阅");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "使用订阅处理功能");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"抱歉，无法识别该包 ID。" );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"您似乎还没有填写您的帐户详细信息。要在网站上列出您的财产，我们需要您先填写您的帐户详细信息，然后我们才能进一步操作。");
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"您已使用订阅包中的所有可用属性槽，因此您将无法创建任何新列表。如果您想创建更多列表，请升级您的包。");
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"按年/月计算的收入");
jr_define('_SUBSCRIPTION_WARNING',"您已经启用订阅，但看起来您还没有创建任何订阅包。在创建至少一个订阅包之前，所有者将无法在您的网站上注册属性。");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API 访问");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"您可以通过升级到  来访问此功能");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2',"订阅包。" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', '升级');
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', '已订阅');
jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', '订阅网关设置');
jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', '您目前没有订阅任何订阅套餐。请订阅套餐以继续使用我们的服务。');
