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
jr_define( '_JRPORTAL_WESTERN_UNION', "ウエスタンユニオン");
jr_define( '_JRPORTAL_WESTERN_UNION_TITLE', "ウエスタンユニオンの設定");
jr_define( '_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS', "ここでは,WUゲートウェイが有効になっているすべてのプロパティに使用されるWUアカウントの詳細を定義できます。フロントエンドで設定されたWUアカウントの詳細を上書きすることを選択した場合,ここで設定された詳細が使用されます。しないことを選択した場合は,フロントエンドゲートウェイ構成で定義されたWUアカウントの詳細が使用されます。 ");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE', "すべてのプロパティに設定されたWUアカウントの詳細を上書きしますか？");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER', "ウエスタンユニオン支店：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN', "受取人名：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT', "受取人ID：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC', "受取人の住所：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME', "その他の情報：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1', "ウエスタンユニオン支店：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1', "受取人名：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1', "受取人ID：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1', "受取人の住所：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1', "その他の情報：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2', "ウエスタンユニオン支店：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2', "受取人名：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2', "受取人ID：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2', "受取人の住所：");
jr_define( '_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2', "その他の情報：");
jr_define( '_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE', "予約の支払いの詳細");
jr_define( '_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO', "Dear");
jr_define( '_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU', "ご予約ありがとうございます");
jr_define( '_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO', "予約を確保するために,のデポジットを送ってください。");
jr_define( '_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL', "以下のウエスタンユニオンアカウントへ。");
jr_define( '_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS', "を以下のウエスタンユニオンアカウントに送信します。この予約を送信すると,ウエスタンユニオンアカウント情報のコピーもメールで送信されます。");
jr_define( '_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1', "ご不明な点がございましたら,お気軽にお問い合わせくださいまでお電話ください。。");
jr_define( '_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2', ",またはまでメールでお問い合わせください。");
jr_define( '_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL', "ご不明な点がございましたら,お気軽にお問い合わせください。");
jr_define( '_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT', "ウエスタンユニオンのアカウントの詳細を印刷");
jr_define( '_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT', "送信");