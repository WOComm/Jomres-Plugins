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
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "チャネルIDが設定されていません");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "マネージャーIDが設定されていません");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_TITLE', "チャネルマネージャーフレームワーク");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "チャネル");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "インストールされたチャネル");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "チャネルを選択");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "辞書タイプを選択してください");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "エラー,チャネルがインストールされていません");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "チャネルマネージャーの健全性チェック");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "チャネルを選択します。それが完了すると,構成を確認し,対処する必要がある可能性のある問題を強調表示します。");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "リソースマッピング");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "さまざまなチャネルには,辞書と呼ばれるものがあります。これらは,部屋のタイプ,部屋の機能,プロパティの機能などのリソースを表す用語です。チャネルを使用する前に,さまざまなJomresリソースを個々のチャネルにマッピングする必要があります。チャネルからインポートおよびチャネルにエクスポートされたプロパティが正しいリソースを持つようにリソース。このページでは,最初にチャネルを選択します。完了すると,マップするリソースタイプを選択できる新しいページに移動します。チャネルのリソース(プロパティ機能など)に移動します。リソースタイプを選択すると,Jomresとチャネルのリソースを相互に選択できるようになります。 ");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "ここでリソース(辞書)を選択する必要があります");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "このディクショナリアイテムのローカルアイテムがないため,マップするものがありません。");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "エラー,チャネルに辞書クラスがありません。");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "このページでは,チャネルマネージャーの辞書アイテムをJomresの辞書アイテムにマップする必要があります。");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "チャネルマネージャーアカウント");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "アカウントを持っている可能性のあるチャネルマネージャーの認証情報を保存してください。");
jr_define( 'FINISH', '編集の終了');
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "エラー,オプションのExtrasプラグインがインストールされていません。");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "チャネル名が指定されていません");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "新しいプロパティオブジェクトが提供されていません");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "thisJRUserオブジェクトが提供されていません");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "プロパティのインポートを開始しています");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "正常にインポートされたプロパティ");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "プロパティのインポートに失敗しました");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "すべてのプロパティをインポート");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "インポートプロパティ");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "リモートサーバーで公開/アクティブ化としてマークされていないプロパティ,または変更ログ項目がないプロパティはインポートできません。");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "料金のインポートを開始しています");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "正常にインポートされた料金");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "料金のインポートに失敗しました");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "プロパティ設定を検証できません。認識されないプロパティ設定をインポートしようとしました");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "インポートされたプロパティ");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "プロパティ名");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "チャネル名");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "ローカルプロパティuid");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "リモートプロパティuid");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "リモート編集");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "ローカル表示");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "ローカルを削除");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "ダッシュボード");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "チャネルアカウント");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "シンチャネルプラグインがインストールされていません。この機能はまだ使用できません。");
jr_define( 'CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "管理する未割り当てのプロパティをチャネルに割り当てることができます。チャネルを変更すると,有効なAPIアクセスを持つチャネルが与えられます");