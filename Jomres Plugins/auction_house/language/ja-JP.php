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

jr_define( '_JOMRES_AUCTIONHOUSE_TITLE', "オークションハウス");
jr_define( '_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "購入");
jr_define( '_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "販売");

jr_define( '_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "オークションホーム");
jr_define( '_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "入札したアイテム");

jr_define( '_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "オークションのリスト");

jr_define( '_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "プロパティダッシュボード");
jr_define( '_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "オークションを一覧表示");
jr_define( '_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "新しいオークション");
jr_define( '_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "オークションの編集");
jr_define( '_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "オークションのキャンセル");
jr_define( '_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "オークションを早期に終了");

jr_define( '_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "このオークションに関連付けるプロパティを選択してください。");
jr_define( '_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "このオークションに部屋/物件を含めていますか？");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "このオークションに含める部屋を選択してください。最初に予約の日付を選択してから,部屋を選択できます。");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "オークションの一環として物件を予約する日付を選択してください。");
jr_define( '_JOMRES_AUCTIONHOUSE_TERMS_LINK', "利用規約");
jr_define( '_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "利用規約");

jr_define( '_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "詳細な利用規約。");

jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "オークションタイトル");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "説明");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "このオークションの価値");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "提供しているパッケージの値を入力してください。購入者には表示されません。");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "予約");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "予約が満たされていません");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "今すぐ購入");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "このオークションは何日間実行する必要がありますか？");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "オークションのオークションハウス予約(キャンセルしないでください)：");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "入札時に請求書に追加の税金が含まれることに注意してください");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "[入札]または[今すぐ購入]ボタンをクリックすると,販売者からアイテムまたはパッケージを購入する法的拘束力のある契約を締結します。このサイトは,販売者がリストしたコンテンツについて責任を負いません。");


jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "エラー,タイトルを含める必要があります。");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "エラー,説明を含める必要があります。");

jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "アクティブなオークション");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "終了したオークション");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "最高入札額");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "入札なし");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "残り時間");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_BID', "入札する");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "入札が行われました！");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "あなたはこのオークションに勝っています！");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "あなたは高値を付けられました！");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "おめでとうございます,このオークションに勝ちました！");
jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "申し訳ありませんが,このオークションに負けました。");

jr_define( '_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "オークションが終了しました");

jr_define( '_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "申し訳ありませんが,ログインしていないため,このオークションに入札することはできません。");
jr_define( '_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "申し訳ありませんが,このオークションは終了したため,入札できません。");
jr_define( '_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "申し訳ありませんが,このオークションに入札できません。そのオークションIDが見つかりません。");
jr_define( '_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "申し訳ありませんが,入札単価が低すぎました。");
jr_define( '_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "自分のオークションに入札することはできません。");
jr_define( '_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "詳細を入力していないため,このオークションにはまだ入札できません。最初に[アカウントの編集]の上にあるリンクをクリックして,アカウントの詳細を入力してください。");

jr_define( '_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "申し訳ありませんが,ログインしていないため,このオークションをキャンセルすることはできません。");
jr_define( '_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "申し訳ありませんが,このオークションはすでに入札されているためキャンセルできません。入札されていないオークションのみキャンセルできます。");
jr_define( '_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "申し訳ありませんが,このオークションはすでに終了しているためキャンセルできません。");
jr_define( '_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "申し訳ありませんが,このオークションへのアクセス権がないため,このオークションをキャンセルすることはできません。");

jr_define( '_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define( '_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define( '_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define( '_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define( '_JOMRES_AUCTIONHOUSE_LISTS', "あなたのウォッチリスト");
jr_define( '_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "リスト内の番号");
jr_define( '_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "ウォッチリスト");
jr_define( '_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "ウォッチリストに追加");
jr_define( '_JOMRES_AUCTIONHOUSE_LISTS_ADD', "ウォッチリストの追加");
jr_define( '_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "新しいリスト名を入力してください");
jr_define( '_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "新しいウォッチリストを保存");
jr_define( '_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "オークションがリストに追加されました");
jr_define( '_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "ウォッチリストはまだありません。オークションをウォッチリストに追加して最初のリストを作成するか,メニューの[ウォッチリストの追加]オプションを使用して手動でリストを追加できます。");
jr_define( '_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "エラー,そのウォッチリストは存在しません。");

jr_define( '_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "このプロパティはオークションプログラムに参加しており,オークション用に1つ以上のパッケージを提供しています。以下のリストを参照してください。");
jr_define( '_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "情報");

jr_define( '_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "オークション手数料");
jr_define( '_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "オークション：");

jr_define( '_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "オークションに入札しました：");
jr_define( '_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "オークションに入札しました。次のリンクにアクセスすると,オークションを確認できます：");
jr_define( '_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "あなたは高値を付けられました！オークション：");
jr_define( '_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "オークションで高値を付けられました。次のリンクにアクセスすると,オークションを確認できます：");
jr_define( '_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "オークションに勝ちました！オークション：");
jr_define( '_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "オークションに勝ちました。次のリンクにアクセスすると,オークションを確認できます：");
jr_define( '_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "販売者への支払いは迅速に行ってください。請求書はこちら：");
jr_define( '_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "オークションは終了しました。オークション：");
jr_define( '_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "このオークションは終了しました。オークションはこちらでご覧いただけます：");

jr_define( '_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "オークションが完了しました。勝者の詳細は次のとおりです：");

jr_define( '_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "オークションハウスのページを表示します。");