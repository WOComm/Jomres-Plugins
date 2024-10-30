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
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Jomres 2 Jomres Integration");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "親サイトのクライアントID");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "親サイトのクライアントID。親サイトでは,すべてのAPI機能プラグインがインストールされ,チャネル管理フレームワークプラグインがインストールされ,クライアントIDを作成/編集するときに一意のクライアントIDとシークレットが必要になります。使用可能なすべてのスコープへのアクセスを許可する必要がある秘密鍵ペア。 ");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "親サイトのクライアントシークレット");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "親サイトのクライアントシークレット");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "親のURL");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "親JomresサイトへのURL。");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "エラー,親サイトのクライアントIDが設定されていません。[サイトの構成]> [チャネルマネージャーアカウント]タブにアクセスして,クライアントIDを保存してください。");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "エラー,親サイトのシークレットが設定されていません。[サイトの構成]> [チャネルマネージャーアカウント]タブにアクセスして,シークレットを保存してください。");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "エラー,親サイトのシークレットURLが設定されていません。[サイトの構成]> [チャネルマネージャーアカウント]タブにアクセスして,親サイトのURLを保存してください。");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "エラー,クライアントIDが設定されていません。[サイトの構成]> [チャネルマネージャーアカウント]タブにアクセスして,ユーザー名を保存してください。");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "エラー,クライアントIDが設定されていません。[サイトの構成]> [チャネルマネージャーアカウント]タブにアクセスしてパスワードを保存してください。");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "チャネル設定");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres：新しいプロパティをインポートします。");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORT");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "プロパティIDが設定されていません");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "マップされた辞書アイテムが設定されていません");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "ローカルプロパティタイプが見つかりません。プロパティタイプが作成されている場合は,リモートサービスのプロパティタイプがローカルプロパティタイプにマップされていることを確認してください。");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "リモートプロパティタイプがチャネルから返されません。");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "ローカルプロパティタイプが渡されていません。");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "予約モデル(mrpまたはsrp)を判別できませんでした。");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "プロパティタイプIDを見つけた後,予約モデル(mrpまたはsrp)を判別できませんでした。");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "国コードを判別できませんでした");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "リージョンIDを判別できませんでした");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "設定配列を適切に検証できませんでした");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "管理者によってマップされていないプロパティタイプ");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "管理者によってマップされていないプロパティ機能");
jr_define( 'CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "管理者によってマップされていない部屋タイプ");