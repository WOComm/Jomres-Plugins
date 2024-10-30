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
jr_define( '_JOMRES_ICAL_EVENT', 'iCalイベント');
jr_define( '_JOMRES_ICAL_FEED', 'iCalフィード');
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCalフィードURL');
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed / s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'iCalフィードは,モバイルデバイス,Googleカレンダー,Appleカレンダー,Thunderbird,Outlookなどを含むリモートカレンダーで今後の予約を表示できます。次のURLを使用して,あなたのカレンダーソフトウェア。 ');
jr_define( '_JOMRES_ICAL_ANON', '匿名のiCalフィードURL');
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'iCalフィードへの匿名アクセスを許可しますか？');
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'このオプションを有効にすると,iCalイベントフィードをすべての人が利用できるようになりますが,予約やゲストの詳細は表示されません。');
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal Import');
jr_define( '_JOMRES_ICAL_SELECT', 'インポートするファイルを選択');
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'エラー,ファイルがアップロードされていません。');
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "iCalファイルをインポートする場合,イベントの終了日はゲストの出発日である必要があります。概要はゲストの名前である必要があります。イベントの説明には他のすべての詳細を含めることができます。");

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'この予約番号はすでにシステムに存在します。');
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', '選択した日付に利用可能な部屋はありません。');
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'icsファイルにイベントが見つかりませんでした。');
jr_define( '_JOMRES_ICAL_SUCCESS', 'イベントが正常にインポートされました');
jr_define( '_JOMRES_ICAL_FAILURE', 'イベントをインポートできませんでした');

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'ゲスト名');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'イベントの説明');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', '開始');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', '終了');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', '結果');
jr_define( '_JOMRES_ICAL_WITHHELD', '保留');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'iCalフィードは,モバイルデバイス,Googleカレンダー,Appleカレンダー,Thunderbird,Outlookなどを含むリモートカレンダーで今後の予約を表示できます。');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'この機能を使用すると,Airbnb,HomewayなどのサイトからJomresに予約を同期できます。同期するサイトごとにプロパティのiCalフィードのURLを入力する必要があります。たとえば,Airbnbでプロパティを予約すると,このJomresサイトでもこれらの日付はブロック(ブラック予約)として表示されるため,ここでこれらの日付を予約することはできません。これにより,サイト間で予約の詳細(ゲストの詳細,価格,請求書など)が,「空室状況だけを同期することで,二重予約を回避するための便利で簡単な方法です。」');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'iCal同期設定');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'iCalフィード設定');
jr_define( '_JOMRES_ICAL_SYNC_URL1', '外部iCalURL');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', '予約の問い合わせも含めますか？');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', '有効にすると,まだ承認されていない予約も含まれます(予約承認機能が有効になっている場合)。このオプションを無効のままにしておくと,カレンダーから予約を非表示にして,確認を待っている可能性があります。未承認/照会ステータス。予約に承認が必要ない場合(予約承認機能が無効になっている場合),すべての予約がエクスポートされます。 ');

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCalリモートフィード');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'リモートURL');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'ルームUID');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', '部屋の名前/番号');
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "このフィードが影響する部屋とリモートサイトのURLを選択します。iCalファイルをインポートする場合,イベントの終了日はゲストの出発日である必要があります。概要はゲストの名前である必要があります。イベント説明には,他のすべての詳細を含めることができます。 ");

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Icalリモートフィードが作成されました');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Icalリモートフィードが削除されました');