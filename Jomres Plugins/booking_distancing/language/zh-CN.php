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

jr_define('_JOMRES_QBLOCK_TITLE',"预订距离");
jr_define('_JOMRES_QBLOCK_SETTING',"启用预订距离？");
jr_define('_JOMRES_QBLOCK_DESCRIPTION',"此设置允许您启用预订距离。启用后，每次预订前后都会创建一个黑色预订 N 天，让您有时间确保在下一位客人之前对酒店进行深度清洁 到了。");
jr_define('_JOMRES_QBLOCK_BLACKBOOKING_NOTE',"预订ID的预订距离");
jr_define('_JOMRES_QBLOCK_DAYS',"阻止天数");
jr_define('_JOMRES_QBLOCK_DAYS_DESC',"房间/物业应该被封锁多少天？");
