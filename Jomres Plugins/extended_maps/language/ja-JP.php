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
jr_define( '_JRPORTAL_EXTENDED_MAPS_TITLE', "拡張マップ");
jr_define( '_JRPORTAL_EXTENDED_MAPS_HWIDTH', "マップ幅(px)");
jr_define( '_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "マップの高さ(px)");
jr_define( '_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "マップズームレベル");
jr_define( '_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "デフォルトのJomresプロパティリストをオーバーライドしますか？");
jr_define( '_JRPORTAL_EXTENDED_MAPS_HINFOICON', "その他のイベント/アトラクションマーカーアイコン");
jr_define( '_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "ポップアップ幅(px)");
jr_define( '_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "画像の幅(px)");
jr_define( '_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "画像の高さ(px)");
jr_define( '_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "プロパティの説明を表示しますか？(レンタルポップアップのみ)");
jr_define( '_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "トリムプロパティの説明？(レンタルポップアップのみ)");
jr_define( '_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "(chars)の後のプロパティの説明をトリムします(レンタルポップアップのみ)");
jr_define( '_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "グループマーカー");

jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "プロパティとローカルイベント/アトラクションのコレクションを含むマップを表示します。");
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "表示するプロパティタイプを指定します。カンマ区切り。");
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "プロパティを表示しますか？表示されないようにするには0に設定してください。");
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "イベントを表示しますか？表示されないようにするには0に設定してください。");
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "アトラクションを表示しますか？表示されないようにするには0に設定してください。");
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO国コード。このオプションを使用して,マップを1つの国に制限します。");
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "リージョンIDを設定して,結果を特定のリージョンのプロパティに制限します。");
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "町の名前を設定して,結果を特定の町のプロパティに制限します。");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
