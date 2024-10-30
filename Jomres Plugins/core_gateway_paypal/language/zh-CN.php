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

jr_define('PAYPAL_API_KEY_TITLE',"Paypal API 密钥");
jr_define('PAYPAL_API_KEY_TITLE_DESC',"为您的真实账户和沙盒账户配置您的 Paypal 客户端 ID 和密钥。配置后，您将能够通过 Paypal 进行预订和发票付款。");

jr_define('PAYPAL_API_CLIENTID',"客户端 ID");
jr_define('PAYPAL_API_SECRET',"秘密");
jr_define('PAYPAL_API_CLIENTID_SANDBOX',"沙盒客户端 ID");
jr_define('PAYPAL_API_SECRET_SANDBOX',"沙盒秘密");

jr_define('PAYPAL_API_CLIENTID_FINDING',"你如何找到你的客户端 ID 和密码？");

jr_define('PAYPAL_API_CLIENTID_STEP1','转到 https://developer.paypal.com/ 并登录。');
jr_define('PAYPAL_API_CLIENTID_STEP2',"转到我的应用程序和侧面菜单中的凭据。");
jr_define('PAYPAL_API_CLIENTID_STEP3',"点击创建应用程序创建一个新的应用程序");
jr_define('PAYPAL_API_CLIENTID_STEP4',"为你的应用程序命名，然后点击创建应用程序。");
jr_define('PAYPAL_API_CLIENTID_STEP5',"在此页面上，您可以看到您的客户端 ID 和密钥。将这些密钥复制并粘贴到上面的相应字段中。");