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
jr_define( '_PHPLIST_INSTRUCTIONS', "このプラグインはJomresをPHPListと統合し,予約時に顧客の名前とメールアドレスをメーリングリストに自動的に追加できるようにします。");
jr_define( '_PHPLIST_HSKIPCONFEMAIL', "サブスクリプション確認メールをスキップしますか？");
jr_define( '_PHPLIST_HSENDHTMLEMAILS', "HTMLメールを送信しますか？");
jr_define( '_PHPLIST_HPHPLISTURL', "PHPListフロントページのベースURL");
jr_define( '_PHPLIST_HPHPLISTURL_DESC', "URLには末尾にスラッシュが必要であり,パラメータを使用しないでください");
jr_define( '_PHPLIST_HUSER', "PHPList管理者ユーザー名");
jr_define( '_PHPLIST_HPASS', "PHPList管理者パスワード");
jr_define( '_PHPLIST_HATTRIB1', "attribute1");
jr_define( '_PHPLIST_HATTRIB1_DESC', "ゲストの名を保存するPHPList属性/フィールド名。何もしない場合は空のままにします。");
jr_define( '_PHPLIST_HATTRIB2', "attribute2");
jr_define( '_PHPLIST_HATTRIB2_DESC', "ゲストの名前を保存するPHPList属性/フィールド名。何もしない場合は空のままにします。");
jr_define( '_PHPLIST_HLIST_ID', "メーリングリストID");