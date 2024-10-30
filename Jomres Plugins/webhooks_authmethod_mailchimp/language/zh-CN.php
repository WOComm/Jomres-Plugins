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


jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', '当您向系统添加来宾时，此集成方法会更新 Mailchimp 列表。<br/>
您不需要为此 webhook 设置 URL 输入，我们将根据您的 API 计算。<br/>
要配置此 webhook，您需要两项信息，一个 API 密钥和列表 ID。 <br/>
要找到您的 API 密钥，请转到您的 Mailchimp 帐户，然后：<br/>
<ol>
  <li>点击您的个人资料名称以展开帐户面板，然后选择帐户。</li>
  <li>点击 Extras 下拉菜单并选择 API 密钥。</li>
  <li>复制现有的 API 密钥或点击“创建密钥”按钮。</li>
  <li>描述性地命名您的密钥，以便您知道哪个应用程序使用该密钥。</li>
</ol>
接下来，您将需要列表 ID，您可以通过访问 Mailchimp 中的列表来找到该 ID。单击“列表”菜单链接，然后在右侧行的末尾单击下拉列表，然后选择“设置”。滚动到该页面的底部，它会显示类似“列表 ID 为 blahblah 列表”之类的内容。这是您需要使用的列表的 ID。
    ');

jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API 密钥');
jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', '列表ID');