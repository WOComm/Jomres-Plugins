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

jr_define('_PHPLIST_INSTRUCTIONS',"此插件将 Jomres 与 PHPList 集成在一起，允许您在预订时自动将客户姓名和电子邮件添加到邮件列表中。");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"跳过订阅确认邮件？");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"发送 HTML 邮件？");
jr_define('_PHPLIST_HPHPLISTURL',"PHPList 首页基本 URL");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"url 需要有一个斜杠并且不要在其中使用任何参数");
jr_define('_PHPLIST_HUSER',"PHPList 管理员用户名");
jr_define('_PHPLIST_HPASS',"PHPList 管理员密码");
jr_define('_PHPLIST_HATTRIB1',"attribute1");
jr_define('_PHPLIST_HATTRIB1_DESC',"PHPList 属性/字段名称要存储来宾名字的位置。空为无。");
jr_define('_PHPLIST_HATTRIB2',"attribute2");
jr_define('_PHPLIST_HATTRIB2_DESC',"PHPList 属性/字段名称要存储来宾姓氏的位置。留空表示无。");
jr_define('_PHPLIST_HLIST_ID',"邮件列表ID");