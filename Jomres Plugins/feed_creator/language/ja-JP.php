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
jr_define( '_JRPORTAL_FEED_CREATOR_TITLE', "RSSフィード");
jr_define( '_JRPORTAL_FEED_CREATOR_INSTRUCTIONS', "このプラグインは,すべてのjomresプロパティからフィードを作成します。現在,RSS1.0およびRSS2.0シンジケーション形式がサポートされています。");
jr_define( '_JRPORTAL_FEED_CREATOR_HFEEDNAME', "飼料名");
jr_define( '_JRPORTAL_FEED_CREATOR_HFEEDDESC', "フィードの説明");
jr_define( '_JRPORTAL_FEED_CREATOR_HFEEDFILENAME', "フィードファイル名(スペースなし)");
jr_define( '_JRPORTAL_FEED_CREATOR_HFEEDFORMAT', "シンジケーションフォーマット");
jr_define( '_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME', "キャッシュ時間(秒単位)");
jr_define( '_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL', "フィード画像のURL");
jr_define( '_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC', "プロパティの説明を切り捨てますか？");
jr_define( '_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE', "(chars)の後に切り捨て");
jr_define( '_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE', "フィード画像を表示しますか？");
jr_define( '_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE', "プロパティ画像を表示しますか？");
jr_define( '_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN', "プロパティタウンを表示しますか？");
jr_define( '_JRPORTAL_FEED_CREATOR_HPROPERTYREGION', "プロパティ領域を表示しますか？");
jr_define( '_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY', "プロパティの国を表示しますか？");
jr_define( '_JRPORTAL_FEED_CREATOR_HITEMS', "シンジケートされたプロパティの数をに制限します。");