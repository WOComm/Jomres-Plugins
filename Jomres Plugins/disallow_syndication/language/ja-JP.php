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
jr_define( 'DISALLOW_SYNDICATION_TITLE', "シンジケーションを許可しない");
jr_define( 'DISALLOW_SYNDICATION_DESCRIPTION', 'Jomres.netシンジケーション機能は,サイト間でプロパティを共有するように設計された新機能ですが,予約はホームサーバーでのみ行うことができます。');

jr_define( 'DISALLOW_SYNDICATION_DESCRIPTION_MORE', "これの目的は,サイトが検索エンジンとの信頼関係を構築できるようにすることです。これは無料の機能であり,すべてのJomresユーザーが利用できます。アクティブなJomresライセンス所有者は,削除することを選択した場合に利用できます。このページを介してシンジケーションネットワークからサイトを取得します。ローカルホストをネットワークに追加することはできません。何らかの理由で接続に問題がある場合は,サイトをネットワークに追加できません。次の場合は,RESTAPI接続テストページを確認してください。疑わしいです。」");

jr_define( 'DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "このリンクをクリックして,サイトをネットワークから削除します。");
jr_define( 'DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "このリンクをクリックして,サイトをネットワークに追加します。");

jr_define( 'DISALLOW_SYNDICATION_DISALLOW', "このサイトをネットワークから削除します");
jr_define( 'DISALLOW_SYNDICATION_ALLOW', "このサイトをネットワークに追加");

jr_define( 'DISALLOW_SYNDICATION_INVALID_KEY', "申し訳ありませんが,サポートキーが無効であるかアクティブではありません。このインストールのシンジケーションステータスを変更することはできません。");