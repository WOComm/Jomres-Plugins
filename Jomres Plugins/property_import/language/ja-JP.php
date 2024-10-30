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
jr_define( '_JOMRES_PROPERTY_IMPORT_TITLE', "プロパティのインポート");
jr_define( '_JOMRES_PROPERTY_IMPORT_DESC', "この機能を使用すると,CSVファイルを介してプロパティをインポートできます。さまざまなチェックが必要なため,作成するプロパティの数を一度に50以下のバッチに制限することをお勧めします。");
jr_define( '_JOMRES_PROPERTY_IMPORT_SELECT', "アップロードするファイルを選択してください。");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELDS', "csvファイルには11列が必要であり,フィールドにはhtmlが含まれていてはなりません。すべてのフィールドが必須です。");

jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME', "プロパティ名");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE', "テキスト");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS', "部屋の数(これが別荘/コテージの場合,実際のプロパティの部屋の数に関係なく,これは1になります。ホテル/ B＆Bなどにのみ複数の部屋が必要です)。整数。 ");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE', "整数");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE', "通貨コードなしの1泊あたりの価格。");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE', "Float");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS', "メールアドレス");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE', "テキスト");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET', "Street");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE', "テキスト");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN', "Town");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE', "テキスト");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION', "Region。これは,Regionsテーブルに格納されているリージョンのIDに対応している必要があります");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE', "整数");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY', "プロパティの国。短いコード(完全な国名ではなく,GBまたはDEなど)");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE', "テキスト");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE', "郵便番号");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE', "テキスト");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE', "電話番号");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE', "テキスト");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION', "プロパティの完全な説明。最大500文字");
jr_define( '_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE', "テキスト");

jr_define( '_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT', "エラー,プロパティタイプが設定されていません。");
jr_define( '_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE', "エラー,そのプロパティタイプの部屋タイプがありません。管理者エリアのサイト構造にアクセスして修正できます。");
jr_define( '_JOMRES_PROPERTY_IMPORT_NO_FILE', "おっと,ファイルをアップロードするのを忘れましたか？");

jr_define( '_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS', "見つかった列が多すぎます。ファイルの形式が正しくないか,csvデータが正しく作成されていません。");
jr_define( '_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET', "プロパティ名が設定されていません。");
jr_define( '_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT', "部屋の数が設定されていません。");
jr_define( '_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET', "1泊あたりの料金が設定されていません。");
jr_define( '_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS', "メールアドレスを検証できませんでした。");
jr_define( '_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET', "通りが設定されていません。");
jr_define( '_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN', "町が設定されていません。");
jr_define( '_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION', "地域が設定されていません。");
jr_define( '_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY', "国が設定されていません。");
jr_define( '_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE', "郵便番号が設定されていません。");
jr_define( '_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE', "電話が設定されていません。");
jr_define( '_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION', "説明が設定されていません。");

jr_define( '_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS', "プロパティは正常にインポートされました！");

jr_define( '_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES', "インポートに失敗したプロパティが1つ以上あるため,それらのプロパティのみを下のフィールドにエクスポートしました。これらのプロパティをexcell / open office calc /選択したCSVファイルハンドラーにコピーして修正できます。すべてのプロパティを再度インポートする必要なしに問題が発生します。 ");