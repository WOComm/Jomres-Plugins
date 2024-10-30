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

jr_define( '_JOMRES_DATAWIPE_TITLE', "データワイプ");
jr_define( '_JOMRES_DATAWIPE_DESC', "この機能を使用すると,予約時に収集されたデータを削除できます。これは,インストール(テスト予約,サブスクリプションなど)で多くの開発データを作成し,プロパティと料金の情報を維持しながら,システムから情報を消去します。<br/>プラグインは,すべてのcronログ,ユーザーのお気に入り,メモ,予約,請求書,サブスクライバー,サブスクリプション,ゲスト,監査データ,クリック数,レビューを削除します。」 ");
jr_define( '_JOMRES_DATAWIPE_WARNING', "このデータはシステムのバックアップコピーからのみ取得できるため,これは非常に有害なスクリプトであることを理解する必要があります。そのため,一度使用した後は,意図したとおりに使用することをお勧めします。後で再度アンインストールすることを目的としています。 ");
jr_define( '_JOMRES_DATAWIPE_GO', "クリックしてデータをワイプ");
jr_define( '_JOMRES_DATAWIPE_EMPTYING', "空にする");
jr_define( '_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "正常に空になりました。");
jr_define( '_JOMRES_DATAWIPE_EMPTYING_FAILURE', "テーブルを空にできませんでした。");