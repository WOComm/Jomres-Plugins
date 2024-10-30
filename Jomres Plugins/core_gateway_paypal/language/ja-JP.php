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

jr_define( 'PAYPAL_API_KEY_TITLE', "Paypal APIキー");
jr_define( 'PAYPAL_API_KEY_TITLE_DESC', "ライブアカウントとサンドボックスアカウントの両方のPaypalクライアントIDとシークレットを構成します。構成すると,Paypalを介して予約と請求書の両方の支払いを行うことができます。");

jr_define( 'PAYPAL_API_CLIENTID', "クライアントID");
jr_define( 'PAYPAL_API_SECRET', "Secret");
jr_define( 'PAYPAL_API_CLIENTID_SANDBOX', "サンドボックスクライアントID");
jr_define( 'PAYPAL_API_SECRET_SANDBOX', "サンドボックスシークレット");

jr_define( 'PAYPAL_API_CLIENTID_FINDING', "クライアントIDとシークレットをどのように見つけますか？");

jr_define( 'PAYPAL_API_CLIENTID_STEP1', 'https：//developer.paypal.com/にアクセスしてログインします。');
jr_define( 'PAYPAL_API_CLIENTID_STEP2', "サイドメニューの[マイアプリとクレデンシャルに移動します。");
jr_define( 'PAYPAL_API_CLIENTID_STEP3', "[アプリの作成]をクリックして新しいアプリを作成します");
jr_define( 'PAYPAL_API_CLIENTID_STEP4', "アプリに名前を付けて,[アプリの作成]をクリックします。");
jr_define( 'PAYPAL_API_CLIENTID_STEP5', "このページでは,クライアントIDとシークレットを確認できます。これらのキーをコピーして上記のそれぞれのフィールドに貼り付けてください。");