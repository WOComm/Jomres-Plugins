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

jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE', "Ajax Search Composite");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "星で検索");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "価格で検索");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "機能で検索");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "国で検索");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "地域で検索");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "町で検索");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "部屋タイプで検索");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "プロパティタイプで検索");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "ゲスト番号で検索");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "日付で検索");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "テンプレートスタイル");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "デフォルト：ブートストラップの場合,ほとんどの場合単純なチェックボックスまたはボタン。モーダル：ユーザーが検索フィルターを選択できるようにボタンが開きます。ページ上部に設計されたアコーディオン,領域が下にスライドしてフィルターが表示されます。複数選択：ボタンのドロップダウンからフィルタを公開します。 ");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "ボタン(垂直方向)");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "モーダル(垂直方向)ブートストラップのみ。");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "アコーディオン(水平方向)ブートストラップのみ。");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "複数選択(水平方向)ブートストラップのみ。");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "フィルターを表示");
jr_define( '_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "フィルターを非表示");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "ajax検索フレームワークを使用します。サイドバーに空室状況,価格帯,機能,物件タイプ,部屋タイプ,ゲスト番号,星,国,地域,町を検索できる検索モジュールを配置できます。またはトップバー。ここに示す例は,一部の引数が互いに打ち消し合うため機能しないことに注意してください。使用可能な引数から必要なものだけを選択してください(必須の引数を除く)。このショートコードは他のほとんどの引数とは少し異なります。ショートコードは,ショートコード宣言の後に,プラグインが返されたプロパティのリストを配置する場所であるasamodule_search_resultsのIDを持つ特別なdivを伴う必要があるためです。 ");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "必須。引数はajax_search_compositeである必要があります");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "検索フィールドスタイル。オプションはボタンモーダルアコーディオンマルチセレクトです。設定されていない場合,プラグインはサイト構成で構成されたオプションを使用します。マルチセレクト/アコーディオンは水平表示に最適です。他の2つのオプションはでの配置に最適です。サイドバー。 ");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "ページタスクがviewpropertyに設定されている場合に検索フォームを表示します(プロパティの詳細ページ)。0はいいえ,1ははい。");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "プレフィルタリングでは,プレフィルタ条件を満たすプロパティのみを選択して検索結果に表示できます。プロパティuidでプレフィルタリングするため,特定のプロパティのみを検索結果に表示できます。引数はaです。プロパティuidのコンマ区切りリスト ");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "プロパティタイプで事前フィルタリングするため,このタイプ/これらのタイプのプロパティのみを検索結果に表示できます。引数はプロパティタイプIDのコンマ区切りリストです。");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "国コードで事前フィルタリングするため,これらの国のプロパティのみを検索結果に表示できます。引数は,ISO国コードのコンマ区切りのリストです。");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "地域名で事前フィルタリングするため,これらの地域のプロパティのみを検索結果に表示できます。引数は地域名のコンマ区切りリストであり,データベースに保存されている地域と一致する必要があります。たとえば,国をドイツ(DE)に設定すると,同様の地域名を持つ他の国のプロパティは表示されません。 ");

jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "フォームのスター入力を有効/無効にします。サイト構成の[Ajax検索コンポジット設定]タブでオプションを[いいえ]に設定した場合,引数リストでasc_by_starsを設定しても効果がないことに注意してください。 ");

jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "フォームのスター入力を有効/無効にします。サイト構成の[Ajax検索コンポジット設定]タブでオプションを[いいえ]に設定した場合,引数リストでasc_by_priceを設定しても効果がないことに注意してください。 ");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "フォームに入力されたプロパティ機能を有効/無効にします。サイト構成の[Ajax検索複合設定]タブでオプションを[いいえ]に設定した場合,引数リストでasc_by_featuresを設定しても効果がないことに注意してください。 。 ");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "フォームでの国の入力を有効/無効にします。サイト構成の[Ajax検索複合設定]タブでオプションを[いいえ]に設定した場合,引数リストでasc_by_countryを設定しても効果がないことに注意してください。 ");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "フォームのリージョン入力を有効/無効にします。サイト構成の[Ajax検索コンポジット設定]タブでオプションを[いいえ]に設定した場合,引数リストでasc_by_regionを設定しても効果がないことに注意してください。 ");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "フォームのタウン入力を有効/無効にします。サイト構成の[Ajax検索コンポジット設定]タブでオプションを[いいえ]に設定した場合,引数リストでasc_by_townを設定しても効果がないことに注意してください。 ");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "フォームの部屋タイプ入力を有効/無効にします。サイト構成の[Ajax検索複合設定]タブでオプションを[いいえ]に設定した場合,引数リストでasc_by_roomtypeを設定しても効果がないことに注意してください。 。 ");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "フォームに入力されたプロパティタイプを有効/無効にします。サイト構成の[Ajax検索複合設定]タブでオプションを[いいえ]に設定した場合,引数リストでasc_by_propertytypeを設定しても効果がないことに注意してください。 。 ");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "フォームに入力されたゲスト番号を有効/無効にします。サイト構成の[Ajax検索複合設定]タブでオプションを[いいえ]に設定した場合,引数リストでasc_by_guestnumberを設定しても効果がないことに注意してください。 。 ");
jr_define( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "フォームの日付入力を有効/無効にします。サイト構成の[Ajax検索複合設定]タブでオプションを[いいえ]に設定した場合,引数リストでasc_by_dateを設定しても効果がないことに注意してください。 ");