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
	jr_define('CONVERSATIONS',"会話");
	jr_define('CONVERSATION',"あなたが話している相手は");
	jr_define('CONVERASTIONS_GROUPS',"グループ");
	jr_define('CONVERSATIONS_WELCOME_MESSAGE_1',"こんにちは、ようこそ ");
	jr_define('CONVERSATIONS_WELCOME_MESSAGE_2',"何かお手伝いできますか?");
	jr_define('CONVERSATIONS_PLACEHOLDER',"メッセージを入力してください...");
	jr_define('CONVERSATIONS_MEMBERS',"グループ メンバー");
	jr_define('CONVERSATIONS_NO_CONVERSATIONS_MANAGER',"まだメッセージはありません。");
	jr_define('CONVERSATIONS_NO_CONVERSATIONS_GUEST',"ここにはまだメッセージがありません。物件にアクセスしてその物件の連絡先ボタンをクリックすると、新しい会話を開始できます。");
	jr_define('CONVERSATION_NAME',"会話名");
	jr_define('CONVERSATION_GROUP_ID',"グループ ID");
	jr_define('CONVERSATION_UNDREAD_MESSAGES',"未読メッセージ");
	jr_define('CONVERSATION_LAST_MESSAGE',"最後のメッセージ");
	jr_define('CONVERSATION_LEAVE_GROUP',"グループを脱退");
	jr_define('LIST_CONVERSATIONS_INFO',"ここに会話のリストが表示されます。注: 未読メッセージとは、あなたが個人的に読んでいないメッセージを指し、他のグループ メンバーが読んで返信した可能性があります。会話名をクリックします。会話を新しいウィンドウで開きます。");
	jr_define('CONVERSATION_MODAL_TITLE',"会話アラート");
	jr_define('CONVERSATION_MODAL_NUDGE',"新しいメッセージがあります。");
	jr_define('CONVERSATION_MODAL_GO',"会話を見る");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_TAB_TITLE',"メッセージング システム");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_ID',"JoomlaログインモジュールID");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_DESC'," ログイン モジュールの ID。この設定の詳細については、プラグイン情報プラグインを参照してください。 ");
	jr_define('MESSAGING_SYSTEM_SEARCH_FIELD_PLACEHOLDER',"検索");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_REGISTERED',"登録ユーザー");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_PROPERTY_MANAGER',"プロパティマネージャー");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_ADMINISTRATOR',"管理者");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE',"WordPress ログインショートコード");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE_DESC',"ログイン ウィジェットのショートコード。この設定の詳細については、プラグイン情報プラグインを参照してください。");
	jr_define('MESSAGING_SYSTEM_REST_API_LOCATION_WARNING',"現在、Jomres のインストールは /wp-content/plugins/jomres/jomres/ ディレクトリにあるため、メッセージング システムをまだ使用できません。[管理者] > [Jomres] > [ツール] > [Rest API テスト] ページにアクセスしてください。このメッセージを削除するには、そのページの指示に従ってファイルを移動するか、Messaging プラグインをアンインストールしてください。");
	jr_define('MESSAGING_SYSTEM_BSVERSION_WARNING',"申し訳ありませんが、Jomres Messaging System は、Bootstrap 5 をサポートするテーマ/テンプレートを使用し、[サイトの構成] > [その他] タブ > [Bootstrap バージョン] 設定が Bootstrap 5 またはテーマの [No Bootstrap] に設定されているサイトでのみ動作します。") ;