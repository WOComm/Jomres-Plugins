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

jr_define( 'STRIPE_TITLE', "Stripe");
jr_define( 'STRIPE_CONNECT_CONFIG_INFO', "このStripeゲートウェイは,サイトマネージャーとして,予約時にプロパティマネージャーへの支払いの一部を受け取ることができるように特別に設計されています。使用する前に,まずStripeとの独自の統合をセットアップする必要があります。接続します。<a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'> このプラグインのドキュメントはここにあります。</a> <br/>このページで[保存]をクリックすると,このプラグインがシームレスに機能するようになります他のすべてのゲートウェイが無効になります</強力>開始する前に,Stripe Connectページに移動し,プラットフォームをセットアップしていることを示してください。それが完了したら,画面の指示に従ってアカウントをセットアップしてください。マネージャーがアカウントをあなたのアカウントに接続する前に[設定]> [接続設定]にアクセスし,[OAuth設定]領域で標準アカウントのOAuthを有効にする必要があります次に,[保存]をクリックします(テストモードとライブモードの両方でこれを行う必要があることに注意してください)。 ");

jr_define( 'STRIPE_REGISTER_CONNECT', "Connect with us！");
jr_define( 'STRIPE_REGISTER_CONNECT_BLURB', "登録しましたが,接続はまだ完了していません。Stripeアカウントを当社のWebサイトに接続する必要があります。接続が完了したら,すべてのプロパティを当社のサイトに追加して予約を開始できます。 。 ");

jr_define( 'STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "ようこそ");
jr_define( 'STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "プロパティの設定を開始する前に,Stripeアカウントに接続する必要があります。リンクをクリックして開始してください。");

jr_define( 'STRIPE_SETUP_INFO', "アカウントをアカウントに接続する必要があります。これにより,お客様に代わって支払いを行うことができるため,[接続]ボタンをクリックして,接続を確認できるStripeに移動します。");
jr_define( 'STRIPE_SETUP_DONE', "あなたはすでに私たちとつながっています。ここでは何もする必要はありません！このウィンドウを閉じて,ビジネスを始めましょう。");
jr_define( 'STRIPE_SETUP_THANKS', "ご接続いただきありがとうございます。今すぐこのウィンドウを閉じることができます。");
jr_define( 'STRIPE_SETUP_DISCONNECT', "アカウントを切断します。");
jr_define( 'STRIPE_SETUP_DISCONNECTED', "アカウントが切断されました。今すぐこのウィンドウを閉じることができます。");

jr_define( 'STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Stripe ConnectクライアントID");
jr_define( 'STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "StripeクライアントIDは<ahref = 'https：//dashboard.stripe.com/account/applications/settings' target = '_blank'>ダッシュボード>設定>接続から取得できます。APIキーは[開発者]メニューオプションの下にあります。</a> ");
jr_define( 'STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "リダイレクトURIは<ahref = 'https：//dashboard.stripe.com/account/applications/settings' target = '_blank'>接続>設定</a>で設定してください。 to <br/> ");

jr_define( 'STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "秘密鍵");
jr_define( 'STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "公開鍵");

jr_define( 'STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "あなたのコミッション");
jr_define( 'STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "この手数料は,予約時にプロパティマネージャーに送信された支払いから取得され,StripeによってStripeアカウントに配置されます。<br/>これは,プロパティマネージャーに請求する手数料の割合です。手数料は,デポジット額ではなく,予約の全費用に基づいて請求されます。<br/>この値をどのように設定しても,[サイトの構成]-> [予約フォーム]-> [最低デポジット額]を構成することをお勧めします。この数字の少なくとも2倍なので,10％の手数料を請求する場合は,最低預金額を20％にする必要があります。 ");

jr_define( 'STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define( 'STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "これは,Stripeがサイトでの支払いに対して請求する割合です。現在,ヨーロッパのカードでは1.4％,ヨーロッパ以外のカードでは2.9％です。この数値は,予約時の価格を決定するために必要です。支払い時間。 ");
jr_define( 'STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Stripe Fee non-euro");

jr_define( 'STRIPE_PAYMENT_FORM_CREDITCARD', "カード番号");
jr_define( 'STRIPE_PAYMENT_FORM_EXPIRATION', "有効期限(MM / YY)");
jr_define( 'STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define( 'STRIPE_PAYMENT_FORM_ZIP', "請求先郵便番号");

jr_define( 'STRIPE_PAYMENT_FORM_SECURE', "安全な支払いフォーム");
jr_define( 'STRIPE_PAYMENT_FORM_BILLINGDETAILS', "請求の詳細");
jr_define( 'STRIPE_PAYMENT_FORM_CARDDETAILS', "カードの詳細");
jr_define( 'STRIPE_PAYMENT_FORM_HOLDER', "カード所有者の名前");
jr_define( 'STRIPE_PAYMENT_FORM_PAYNOW', "今すぐ支払う");
jr_define( 'STRIPE_PAYMENT_FORM_TOPAY', "今すぐ支払う");

jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', '通りは必須であり,空にすることはできません');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', '通りの長さは6文字以上96文字未満である必要があります');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', '都市は必須であり,空にすることはできません');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'zipは必須であり,空にすることはできません');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'zipは3文字以上12文字未満である必要があります');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'メールアドレスは必須であり,空にすることはできません');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', '入力は有効な電子メールアドレスではありません');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'メールの長さは6文字以上65文字未満である必要があります');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'カード所有者名は必須であり,空にすることはできません');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'カード所有者名は6文字以上70文字未満である必要があります');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'クレジットカード番号は必須であり,空にすることはできません');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'クレジットカード番号が無効です');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', '有効期限が必要です');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', '有効期限月には数字のみを含めることができます');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', '有効期限が必要です');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', '有効期限には数字のみを含めることができます');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'cvvは必須であり,空にすることはできません');
jr_define( 'STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', '値は有効なCVVではありません');

jr_define( 'STRIPE_PAYMENT_FAILED', "申し訳ありませんが,現時点ではお支払いを処理できませんでした。");
jr_define( 'STRIPE_PAYMENT_TRY_AGAIN', "もう一度やり直してください");

jr_define( 'STRIPE_PAYMENT_ERROR_DECLINED', "支払いが拒否されました。");
jr_define( 'STRIPE_PAYMENT_ERROR_RATE_LIMIT', "APIに対して行われたリクエストが多すぎます");
jr_define( 'STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "無効なパラメーターがStripeのAPIに提供されました");
jr_define( 'STRIPE_PAYMENT_ERROR_AUTH_FAILED', "StripeのAPIによる認証に失敗しました");
jr_define( 'STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Stripeとのネットワーク通信に失敗しました(インターネット接続が切断されましたか？)");
jr_define( 'STRIPE_PAYMENT_ERROR_UNCAUGHT', "キャッチされないエラーが発生しました");