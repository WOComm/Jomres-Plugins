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
jr_define( '_JRPORTAL_GMAPS_DD_YES', "はい");
jr_define( '_JRPORTAL_GMAPS_DD_NO', "No");
jr_define( '_GOOGLE_ADDRESS', "アドレス");
jr_define( '_GOOGLE_INPUT_FIELDSET_POSTALCODE', "郵便番号");
jr_define( '_GOOGLE_INPUT_FIELDSET_TOWN', "Town");
jr_define( '_GOOGLE_INITIALIZE_ERROR1', "到達した9つのウェイポイントの最大数");
jr_define( '_GOOGLE_INITIALIZE_ERROR2', "Googleはこのルートと選択したオプションのルートを計算できませんでした");
jr_define( '_GOOGLE_DIRECTION_PRINT', "印刷方向");
jr_define( '_GOOGLE_ROUTEPLANNING', "へのルートを計画する");
jr_define( '_GOOGLE_ROUTEPLANNING_HYOURLOCATION', "あなたの場所(ルートの出発点)");
jr_define( '_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS', "ルートオプション");
jr_define( '_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR', "最適化");
jr_define( '_GOOGLE_ROUTEPLANNING_HDRIVING', "運転");
jr_define( '_GOOGLE_ROUTEPLANNING_HWALKING', "ウォーキング");
jr_define( '_GOOGLE_ROUTEPLANNING_HCYCLING', "サイクリング");
jr_define( '_GOOGLE_ROUTEPLANNING_HHIGHWAYS', "高速道路を避ける");
jr_define( '_GOOGLE_ROUTEPLANNING_HTOLLS', "通行料を避ける");
jr_define( '_GOOGLE_SELECT_BUTTON', "道順を取得");
jr_define( '_GOOGLE_SELECT_RESETMAP', "マップをリセット");
jr_define( '_GOOGLE_ROUTEPLANNING_INSTRUCTIONS', "目的地(ルートの終点)はすでに地図上にマークされています。目的地を入力し,ルートオプションを選択して,目的地までの道順を取得してください。地図をクリックして最大9つを選択することもできます。出発地から目的地までのウェイポイント。 ");