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
jr_define( '_JRPORTAL_WIRE_TRANSFER', "電信送金");
jr_define( '_JRPORTAL_WIRE_TRANSFER_TITLE', "電信送金設定");
jr_define( '_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS', "ここでは,電信送金ゲートウェイが有効になっているすべてのプロパティに使用される銀行口座の詳細を定義できます。フロントエンドで設定された銀行口座の詳細を上書きすることを選択した場合,ここで設定された詳細は次のようになります。使用しないことを選択した場合は,フロントエンドゲートウェイ構成で定義された銀行口座の詳細が使用されます。 ");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE', "すべてのプロパティに設定されている銀行口座の詳細を上書きしますか？");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER', "アカウント所有者：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN', "IBAN：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT', "SWIFTコード：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC', "BICコード：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME', "銀行名：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1', "アカウント所有者：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1', "IBAN：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1', "SWIFTコード：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1', "BICコード：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1', "銀行名：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2', "アカウント所有者：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2', "IBAN：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2', "SWIFTコード：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2', "BICコード：");
jr_define( '_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2', "銀行名：");
jr_define( '_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE', "予約の支払いの詳細");
jr_define( '_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO', "Dear");
jr_define( '_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU', "ご予約ありがとうございます");
jr_define( '_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO', "予約を確保するために,のデポジットを電信送金してください。");
jr_define( '_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL', "以下の銀行口座へ。");
jr_define( '_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS', "を以下の銀行口座に送信します。この予約を送信すると,銀行口座情報のコピーもメールで送信されます。");
jr_define( '_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1', "ご不明な点がございましたら,お気軽にお問い合わせください。までお電話ください。");
jr_define( '_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2', ",またはまでメールでお問い合わせください。");
jr_define( '_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL', "ご不明な点がございましたら,お気軽にお問い合わせください。");
jr_define( '_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT', "銀行口座の詳細を印刷");
jr_define( '_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT', "送信");