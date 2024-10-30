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
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW', "単一のレビューを表示");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_PROPERTY_UID', "プロパティuid");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_SCORE_THREASHOLD', "スコアのしきい値。スコア>=しきい値のレビューのみを表示します。");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_IS_SNIPPET', "(オプション)1または0。1の場合はテキストの小さなセクションを表示し,0の場合はテキストのセクション全体を表示します。デフォルトは0です。");
jr_define('_JOMRES_SHORTCODES_0600SHOW_SINGLE_REVIEW_ARG_ALT_REVIEW_ID', "(オプション)レビューID。設定されていない場合,ランダムなレビューが表示されます)");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_PATH', "(オプション)テンプレートパス。componentArgs変数によって渡された場合にのみ使用できます");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_NAME', "(オプション)テンプレート名");