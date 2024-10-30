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
jr_define( '_JRPORTAL_LOCAL_EVENTS_TITLE', "何が起こっているのですか？");
jr_define( '_JRPORTAL_LOCAL_EVENTS_NOTES', "");
jr_define( '_JRPORTAL_LOCAL_EVENTS_EVENT_TITLE', "イベント名");
jr_define( '_JRPORTAL_LOCAL_EVENTS_STARTDATE', "開始日");
jr_define( '_JRPORTAL_LOCAL_EVENTS_ENDDATE', "終了日");
jr_define( '_JRPORTAL_LOCAL_EVENTS_LATITUDE', "緯度");
jr_define( '_JRPORTAL_LOCAL_EVENTS_LONGITUDE', "経度");
jr_define( '_JRPORTAL_LOCAL_EVENTS_WEBSITEURL', "サイトのURL");
jr_define( '_JRPORTAL_LOCAL_EVENTS_EVENTLOGORELPATH', "イベントのロゴへの相対パス(利用可能な場合)。例：www.event.com/logo.png(https：//なし)");
jr_define( '_JRPORTAL_LOCAL_ATTRACTIONS_TITLE', "ローカルで行うこと");
jr_define( '_JRPORTAL_LOCAL_ATTRACTIONS_NOTES', "");
jr_define( '_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTION_TITLE', "アトラクション名");
jr_define( '_JRPORTAL_LOCAL_ATTRACTIONS_ICON', "アイコン");
jr_define( '_JRPORTAL_LOCAL_ATTRACTIONS_LATITUDE', "Latitude");
jr_define( '_JRPORTAL_LOCAL_ATTRACTIONS_LONGITUDE', "経度");
jr_define( '_JRPORTAL_LOCAL_ATTRACTIONS_WEBSITEURL', "サイトのURL");
jr_define( '_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTIONLOGORELPATH', "アトラクションのロゴへの相対パス(利用可能な場合)。例：www.attraction.com/logo.png(https：//なし)");
jr_define( '_JRPORTAL_LOCAL_EVENTS_EDIT', "ローカルイベントの編集");
jr_define( '_JRPORTAL_LOCAL_ATTRACTIONS_EDIT', "ローカルアトラクションの編集");

jr_define( '_JRPORTAL_LOCAL_EVENTS_SETTINGS_TITLE', "ローカルイベントとアトラクション");
jr_define( '_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS', "半径の制限(キロメートル単位)");
jr_define( '_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS_DESC', "ローカルイベントとアトラクションはプロパティの詳細の下に表示されます。ここで半径を定義して,表示されるイベントを特定の範囲内のものに制限します。");