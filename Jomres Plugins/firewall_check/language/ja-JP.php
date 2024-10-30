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
jr_define( 'FIREWALL_CHECK', 'ファイアウォールチェック');
jr_define( 'FIREWALL_CHECK_DESC', 'このプラグインは,このサーバーがリモートサービスに接続できるかどうかを確認する簡単なチェックです。接続できない場合は,2台のマシンが相互に通信できないようにファイアウォールルールが設定されていることを示している可能性があります。 その場合,ファイアウォールルールの調整についてWebサーバーホストと話し合う必要があるかもしれません。リモートサービスから応答を取得しているため,404および403応答は問題ないと見なすことができます。');
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'リモートサービス');
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'ステータスコード');
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'IP番号');