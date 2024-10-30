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
jr_define( 'EXTERNAL_FORM', "外部フォーム");
jr_define( 'EXTERNAL_FORM_PLUGIN_SHORTCODE', 'プラグインのショートコード(例： "rsform")');
jr_define( 'EXTERNAL_FORM_PLUGIN_ARG1', '引数1(例： "1")');
jr_define( 'EXTERNAL_FORM_PLUGIN_ARG2', "引数2(オプション)");
jr_define( 'EXTERNAL_FORM_INFO', "外部フォームプラグインのフォームをプロパティの詳細のタブに含めることができます。プラグインのショートコードを 'rsform'のようなものに設定し,必要に応じて引数を追加します。 フォームは,マンボットと呼ばれるものであれば何でもかまいませんが,フォームが一般的な使用法です。 ");