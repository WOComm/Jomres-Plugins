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

jr_define( '_DEEPL_TITLE', "DeepL翻訳");
jr_define( '_DEEPL_DESCRIPTION', "DeepLは,Jomres言語文字列を自動的に翻訳するために使用できる手頃な価格のインライン翻訳サービスです。これらの翻訳は,DeepLサービスから受信するとローカルに保存され,ラベル翻訳機能を使用して次のことができます。これにより,ウェブサイトを複数の言語で機能させるプロセスが大幅にスピードアップします。<a href='https://support.deepl.com/hc/en-us/articles/360019925219' target ='_blank'>サポート言語</a> ");
jr_define( '_DEEPL_API_KEY_SETTING', "DeepL認証キー");
jr_define( '_DEEPL_API_KEY_SETTING_DESC', "<a href='https://www.deepl.com/pro?cta=header-prices/' target='_blank'> DeepLからの有効なAPIキーが必要です。</ a >サブスクライブすると,認証キーは<ahref = 'https：//www.deepl.com/en/pro-account/'target='_blank'>アカウント</a>にあります。キーをJomresに保存しました。DeepLサービスから取得する必要のある翻訳が多数あるため,サイトの速度が少し低下する可能性があります。しばらくお待ちください。ページを数回リロードしてください。その後,カスタマイズを微調整できます。ラベル翻訳ページで。 ");