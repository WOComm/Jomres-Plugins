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
jr_define( '_PAGEVIEW_RECORDER_ENABLED', "すべてのページビューをdbに記録しますか？");
jr_define( '_PAGEVIEW_RECORDER_DESC', "有効にすると,すべてのページビューがデータベースに記録されます。警告！データベースのページビューテーブルは,非常に短時間で非常に大きくなる可能性があります。注意して使用してください。");