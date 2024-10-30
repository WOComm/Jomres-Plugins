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

jr_define('STRIPE_TITLE',"条纹");
jr_define('STRIPE_CONNECT_CONFIG_INFO',"此 Stripe 网关专门设计用于允许您作为站点经理在预订时接收部分支付给物业经理的款项。在使用之前，您必须先设置自己与 Stripe 的集成连接。<a href='http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class= 'btn btn-primary'>可以在此处找到此插件的文档。</a><br/>如果您单击此页面上的\"保存\"，则要使此插件无缝运行所有其他网关将被禁用 在开始之前，请确保您已进入 Stripe Connect 页面并表明您正在设置平台。完成后，按照屏幕上的说明设置您的帐户。在经理将他们的帐户与您的帐户连接之前必须访问\"设置\">\"连接设置\"并在\"OAuth 设置\"区域中为标准帐户启用 OAuth然后单击保存(注意，您需要在测试和实时模式下执行此操作)。 ");

jr_define('STRIPE_REGISTER_CONNECT',"联系我们！");
jr_define('STRIPE_REGISTER_CONNECT_BLURB',"您已注册，但连接尚未完成。您需要将您的 Stripe 帐户连接到我们的网站。完成后，您可以将您的所有物业添加到我们的网站并开始接受预订.");

jr_define('STRIPE_REGISTER_WELCOME_EMAIL_TITLE',"欢迎来到");
jr_define('STRIPE_REGISTER_WELCOME_EMAIL_BLURB',"在您开始设置您的财产之前，您需要将我们与您的 Stripe 帐户联系起来。点击链接开始。");

jr_define('STRIPE_SETUP_INFO',"我们现在需要将您的帐户连接到我们的帐户，这将允许我们代表您接受付款，因此请单击连接按钮转到 Stripe，您可以在其中确认连接。");
jr_define('STRIPE_SETUP_DONE',"你已经和我们联系上了，这里没什么可做的！关闭这个窗口，让我们继续做生意。");
jr_define('STRIPE_SETUP_THANKS',"感谢您与我们联系！您现在可以关闭此窗口。");
jr_define('STRIPE_SETUP_DISCONNECT',"断开您的帐户。");
jr_define('STRIPE_SETUP_DISCONNECTED',"账号已断开，您可以立即关闭此窗口。");

jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID',"Stripe Connect 客户端 ID");
jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC',"您可以从 <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>仪表板 > 设置 > 连接中获取您的 Stripe 客户端 ID。API键位于开发人员菜单选项下。</a>");
jr_define('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL',"请确保您在 <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>Connect > Settings</a> 中设置了重定向 URI <br/>");

jr_define('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY',"密钥");
jr_define('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY',"公钥");

jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION',"你的佣金");
jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC',"此佣金取自在预订时发送给物业经理的付款。然后，Stripe 将其存入您的 Stripe 帐户。<br/>这是您将向物业经理收取的佣金百分比他们的预订。您的佣金是根据预订的整个成本而不是存款金额收取的。<br/>无论您将此值设置为什么，我们建议您将站点配置 -> 预订表格 -> 最低存款金额配置为至少是这个数字的两倍，所以如果你想收取 10% 的佣金，那么你应该将最低存款设置为 20%。");

jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO',"Stripe Fee European");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC',"这是 Stripe 向您收取在您的网站上付款的百分比。目前他们对欧洲卡收取 1.4% 的费用，对非欧洲卡收取 2.9%。这个数字是在预订和确定价格时所必需的付款时间。");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO',"条纹费用非欧元");

jr_define('STRIPE_PAYMENT_FORM_CREDITCARD',"卡号");
jr_define('STRIPE_PAYMENT_FORM_EXPIRATION',"到期日(MM/YY)");
jr_define('STRIPE_PAYMENT_FORM_CVC',"CVC");
jr_define('STRIPE_PAYMENT_FORM_ZIP',"账单邮编");

jr_define('STRIPE_PAYMENT_FORM_SECURE',"安全支付表");
jr_define('STRIPE_PAYMENT_FORM_BILLINGDETAILS',"账单明细");
jr_define('STRIPE_PAYMENT_FORM_CARDDETAILS',"卡片详情");
jr_define('STRIPE_PAYMENT_FORM_HOLDER',"持卡人姓名");
jr_define('STRIPE_PAYMENT_FORM_PAYNOW',"立即付款");
jr_define('STRIPE_PAYMENT_FORM_TOPAY',"立即付款");

jr_define('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY','街道必填，不能为空');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH','街道长度必须大于 6 且小于 96 个字符');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY','城市是必填的，不能为空');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY','zip是必填的，不能为空');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH','zip 长度必须大于 3 且小于 12 个字符');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY','邮箱地址为必填项，不能为空');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID','输入的电子邮件地址无效');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH','电子邮件长度必须大于 6 且小于 65 个字符');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY','持卡人姓名为必填项，不能为空');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH','持卡人姓名长度必须大于6且小于70个字符');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY','信用卡号为必填项，不能为空');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID','信用卡号无效');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY','需要到期月份');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS','到期月份只能包含数字');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY','需要到期年份');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS','到期年份只能包含数字');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY','cvv 是必须的，不能为空');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID','该值不是有效的 CVV');

jr_define('STRIPE_PAYMENT_FAILED',"抱歉，我们目前无法处理您的付款。");
jr_define('STRIPE_PAYMENT_TRY_AGAIN',"请再试一次");

jr_define('STRIPE_PAYMENT_ERROR_DECLINED',"付款被拒绝。");
jr_define('STRIPE_PAYMENT_ERROR_RATE_LIMIT',"向 API 发出的请求太多太快");
jr_define('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS',"向 Stripe 的 API 提供了无效参数");
jr_define('STRIPE_PAYMENT_ERROR_AUTH_FAILED',"使用 Stripe 的 API 进行身份验证失败");
jr_define('STRIPE_PAYMENT_ERROR_NETWORK_FAULT',"与 Stripe 的网络通信失败(您的互联网连接是否断开？)");
jr_define('STRIPE_PAYMENT_ERROR_UNCAUGHT',"发生未捕获的错误");