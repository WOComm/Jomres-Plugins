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

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"列出 REST API 访问令牌");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"此页面列出了所有客户端以及它们的访问令牌（如果可用）（客户端可能没有请求访问令牌）。如果您想通过 Postman 等客户端发送查询并且需要访问令牌，这将很有用 . 尽管此页面列出了 SYSTEM 访问令牌，但不建议您使用它们。");