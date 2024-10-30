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
jr_define( '_JINTOUR_TITLE', "ツアー/アクティビティ管理");

jr_define( '_JINTOUR_PROFILES_TITLE', "ツアー/アクティビティプロファイル");
jr_define( '_JINTOUR_PROFILES_NEW', "新しいツアー/アクティビティプロファイル");
jr_define( '_JINTOUR_PROFILES_DELETE', "ツアー/アクティビティプロファイルを削除");

jr_define( '_JINTOUR_PROFILE_TITLE', "プロファイルタイトル");
jr_define( '_JINTOUR_PROFILE_DESCRIPTION', "説明");
jr_define( '_JINTOUR_PROFILE_DESCRIPTION_INFO', "旅程を含むツアー/アクティビティの説明を入力してください。");
jr_define( '_JINTOUR_PROFILE_DAYS_OF_WEEK', "曜日");
jr_define( '_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO', "");
jr_define( '_JINTOUR_PROFILE_PRICE_ADULTS', "大人の価格");
jr_define( '_JINTOUR_PROFILE_PRICE_KIDS', "子価格");
jr_define( '_JINTOUR_PROFILE_PRICE_KIDS_INFO', "オプションを予約フォームに表示しないようにするには,価格を0(ゼロ)のままにします");
jr_define( '_JINTOUR_PROFILE_SPACES_ADULTS', "アダルトスペース");
jr_define( '_JINTOUR_PROFILE_SPACES_KIDS', "子スペース");
jr_define( '_JINTOUR_PROFILE_SPACES_INFO', "ツアー/アクティビティで利用可能なスペースの数");
jr_define( '_JINTOUR_PROFILE_START_DATE', "シーズン開始");
jr_define( '_JINTOUR_PROFILE_END_DATE', "シーズン終了");

jr_define( '_JINTOUR_PROFILE_GENERATE_INFO', "ツアー/アクティビティプロファイルを作成したら,そのプロファイルの設定に基づいてツアー/アクティビティを生成する必要があります。ツアー/アクティビティを作成し,そのプロファイルの横にある緑色の矢印アイコンをクリックして,ツアー/アクティビティ自体。ツアー/アクティビティが作成されると,必要に応じて個々のツアー/アクティビティを削除できるようになります。 ");
jr_define( '_JINTOUR_PROFILE_GENERATE', "ツアー/アクティビティを生成する");

jr_define( '_JINTOUR_TOUR_TITLE', "アクティビティタイトル");
jr_define( '_JINTOUR_TOUR_DATE', "日付");
jr_define( '_JINTOUR_TOUR_ADULTS', "Adults");
jr_define( '_JINTOUR_TOUR_KIDS', "Children");
jr_define( '_JINTOUR_TOUR_ITINERY', "旅程");

jr_define( '_JINTOUR_TOUR_SAVE_AUDIT', "生成された新しいツアー");
jr_define( '_JINTOUR_TOUR_CANCEL_AUDIT', "ツアーの予約がキャンセルされました");
jr_define( '_JINTOUR_TOUR_SAVE_MESSAGE', "新しいツアーが生成されました");
jr_define( '_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE', "現在利用可能なスペース");

jr_define( '_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT', "ツアー/リソースIDの新規予約");
jr_define( '_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE', "管理者ツアー/リソースの新しい予約が行われました。そのツアーの管理者エリアページを表示するには,次のリンクを参照してください");

jr_define( '_JINTOUR_TITLE_CONFIG', "Jomres統合ツアー構成");
jr_define( '_JINTOUR_TITLE_WHOLESITE', "インストール全体がJintourインストールですか？");
jr_define( '_JINTOUR_TITLE_WHOLESITE_DESC', "これを[はい]に設定すると,すべてのプロパティがツアープロパティになります。[いいえ]に設定すると,新しいプロパティが作成されるときに,ツアータイプとホテル/アパートメントタイプの両方のプロパティを持つことができます。 ");

jr_define( '_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS', "ツアー");
jr_define( '_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC', "特定の日に利用可能なアイテム(ツアー,コンサートのチケットなど)の予約を提供する場合は,ツアーオプションを選択してください。");
jr_define( '_JINTOUR_SHOWDEPARTURE', "出発入力フィールドを表示しますか？");
jr_define( '_JINTOUR_SHOWDEPARTURE_DESC', "到着日と出発日の両方を表示する場合は,これを[はい]に設定します。これは,バス旅行や飛行機のチケットなど,到着日と出発日の両方を知る必要がある場合に役立ちます。出発日を表示すると,複数の日付にわたってリソースを提供できますが,[いいえ]に設定すると,1つの日付の予約のみを受け入れることができます。 ");

jr_define( '_JINTOUR_PROFILES_TITLE_LIST', "ツアーリスト");