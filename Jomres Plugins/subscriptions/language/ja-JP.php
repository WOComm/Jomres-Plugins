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
jr_define( '_SUBSCRIPTIONS_ACTIVE', "アクティブ");
jr_define( '_SUBSCRIPTIONS_EXPIRED', "非アクティブ");
jr_define( '_SUBSCRIPTIONS_HPAYMENT_STATUS', "支払いステータス");
jr_define( '_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL', "レベル");
jr_define( '_SUBSCRIPTIONS_EDIT_TITLE', "サブスクリプションの編集");
jr_define( '_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE', "サブスクリプションの有効期限のリマインダーメールを送信しますか？");
jr_define( '_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A', "リマインダーメールを送信");
jr_define( '_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B', "サブスクリプションの有効期限が切れる数日前");
jr_define( '_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE', "サブスクリプションの有効期限が切れたときにメールを送信しますか？");
jr_define( '_SUBSCRIPTIONS_MY', "マイサブスクリプション");
jr_define( '_SUBSCRIPTIONS_HRENEW', "更新");
jr_define( '_SUBSCRIPTIONS_HRENEWAL', "サブスクリプションの更新");
jr_define( '_SUBSCRIPTIONS_HALREADY_SUBSCRIBED', "既にサブスクライブしています。代わりに更新を購入してください。");
jr_define( '_SUBSCRIPTIONS_HEDIT', "サブスクリプションパッケージの編集");
jr_define( '_SUBSCRIPTIONS_USERID_DESC', "ユーザー名の最初の数文字を入力すると,ユーザー名のドロップダウンが表示されます。ユーザー名をクリックして選択します。");
jr_define( '_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED', "このサブスクリプションパッケージは利用できなくなったため,更新できません。アップグレードを検討してください。");
jr_define( '_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID', "このパッケージはサブスクライブされていないため,更新できません。");
jr_define( '_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE', "このパッケージの更新オプションはありません");
jr_define( '_SUBSCRIPTIONS_CANCEL', "サブスクリプションのキャンセル");
jr_define( '_SUBSCRIPTIONS_HFREQUENCY_DAYS', "頻度(日)");
jr_define( '_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC', "サブスクリプションの長さ(日数)");
jr_define( '_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED', "このパッケージの更新は許可されていません。");
jr_define( '_SUBSCRIPTIONS_HRENEWAL_PRICE', "更新価格");
jr_define( '_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL', "このパッケージの更新を無効にするか,更新の価格を入力するには,これを0に設定します");
jr_define( '_SUBSCRIPTIONS_HPACKAGE_FEATURES', "パッケージオプション");
jr_define( '_SUBSCRIPTIONS_HPACKAGE_DETAILS', "パッケージの詳細");
jr_define( '_SUBSCRIPTIONS_HPACKAGE_YOUR', "サブスクリプションパッケージ");
jr_define( '_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED', "サブスクリプションパッケージには,この機能へのアクセスは含まれていません。この機能を使用するには,サブスクリプションをアップグレードする必要があります。");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "サブスクリプションの有効期限が切れ,すべてのリストが非公開になりました。リストはゲストに表示されなくなり,当社のWebサイトからオンライン予約を受け取ることができなくなります。当社のサービスを引き続き使用するには,公開してください。あなたのリストとオンライン予約の受け取りを開始するには,あなたのアカウントにログインして更新を購入してください。 ");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1', "サブスクリプションは");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2', "有効期限が切れています");
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1', "これは,サブスクリプションがまもなく期限切れになることを通知する通知です。引き続きサービスを使用するには,アカウントにログインして更新を購入してください。");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', "サブスクリプションパッケージ");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME', "名前");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION', "説明");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED', "公開済み");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY', "頻度");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT', "価格");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT', "ビジネス制限");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC', "このサブスクリプションパッケージで追加できるビジネスの最大数");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE', "購読");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "サブスクリプション処理機能を使用する");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', "申し訳ありませんが,そのパッケージIDは認識されません。");
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', "アカウントの詳細をまだ入力していないようです。サイトにプロパティを一覧表示するには,先に進む前にアカウントの詳細を入力する必要があります。");
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED', "サブスクリプションパッケージで使用可能なすべてのプロパティスロットを使用したため,新しいリストを作成できません。さらにリストを作成する場合は,パッケージをアップグレードしてください。");
jr_define( '_JOMRES_CHART_SUBSCRIPTIONS_DESC', "年/月ごとの収入");
jr_define( '_SUBSCRIPTION_WARNING', "サブスクリプションを有効にしましたが,サブスクリプションパッケージをまだ作成していないようです。所有者は,少なくとも1つのサブスクリプションパッケージが作成されるまで,サイトにプロパティを登録できません。");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS', "APIアクセス");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"この機能にアクセスするには、" );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," サブスクリプション パッケージ。" );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'アップグレード');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', '購読済み');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'サブスクリプションゲートウェイ設定');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', '現在、サブスクリプション パッケージに登録されていません。当社のサービスを引き続き使用するには、パッケージに登録してください。');
