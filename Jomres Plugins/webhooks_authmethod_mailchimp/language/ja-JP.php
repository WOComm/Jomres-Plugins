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
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'この統合メソッドは,システムにゲストを追加するとMailchimpリストを更新します。<br/>
このWebhookのURL入力を設定する必要はありません。APIに基づいて設定します。<br/>
このWebhookを構成するには,APIキーとリストIDの2つの情報が必要です。 <br/>
APIキーを見つけるには,Mailchimpアカウントにアクセスして：<br/>
<ol>
  <li>プロファイル名をクリックして[アカウント]パネルを展開し,[アカウント]を選択します。</ li>
  <li> [Extras]ドロップダウンメニューをクリックして,APIキーを選択します。</ li>
  <li>既存のAPIキーをコピーするか,[キーの作成]ボタンをクリックします。</ li>
  <li>キーにわかりやすい名前を付けて,どのアプリケーションがそのキーを使用しているかがわかるようにします。</ li>
</ ol>
次に,Mailchimpのリストにアクセスして見つけることができるリストIDが必要になります。 [リスト]メニューリンクをクリックし,右の行の最後にあるドロップダウンをクリックして,[設定]を選択します。そのページの一番下までスクロールすると,「blahblahlistのリストID」のように表示されます。これは,使用する必要のあるリストのIDです。
    ');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'APIキー');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'リストID');