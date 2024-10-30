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

jr_define('_DEEPL_TITLE',"DeepL 翻译");
jr_define('_DEEPL_DESCRIPTION',"DeepL 是一种价格合理的在线翻译服务，您可以使用它来自动翻译 Jomres 语言字符串。这些翻译一旦从 DeepL 服务收到，就会存储在本地，您可以使用标签翻译功能来优化它们。这显着加快了使您的网站支持多种语言的过程。<a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'>支持语言</a>");
jr_define('_DEEPL_API_KEY_SETTING',"DeepL 身份验证密钥");
jr_define('_DEEPL_API_KEY_SETTING_DESC',"您需要一个来自 <a href='https://www.deepl.com/pro?cta=header-prices/' target='_blank'>DeepL 的有效 API 密钥。</a > 订阅后，您将在<a href='https://www.deepl.com/en/pro-account/' target='_blank'>您的帐户中找到身份验证密钥。</a>之后已将密钥保存在 Jomres 中，您的站点可能会变慢一段时间，因为需要从 DeepL 服务中提取大量翻译。请耐心等待并重新加载页面几次。然后您可以微调自定义在标签翻译页面中。");