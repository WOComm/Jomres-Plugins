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

jr_define('_JOMRES_DATAWIPE_TITLE',"数据擦除");
jr_define('_JOMRES_DATAWIPE_DESC',"此功能允许您删除预订时收集的数据。它旨在供在其安装(例如测试预订,订阅)上创建了大量开发数据并希望清除系统中的信息，同时保留财产和关税信息。<br/>该插件将删除所有 cron 日志,用户收藏夹,注释,预订,发票,订阅者,订阅,访客,审计数据,点击计数和评论。" );
jr_define('_JOMRES_DATAWIPE_WARNING',"此数据只能从您系统的备份副本中检索，因此您需要了解这是一个非常具有破坏性的脚本。因此，建议您一旦使用它目的是你之后再次卸载它。");
jr_define('_JOMRES_DATAWIPE_GO',"点击擦除数据");
jr_define('_JOMRES_DATAWIPE_EMPTYING',"清空");
jr_define('_JOMRES_DATAWIPE_EMPTYING_SUCCESS',"清空成功。");
jr_define('_JOMRES_DATAWIPE_EMPTYING_FAILURE',"清空表失败。");