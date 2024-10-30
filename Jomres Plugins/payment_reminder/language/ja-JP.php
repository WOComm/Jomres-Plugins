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
jr_define( '_JRPORTAL_PAYMENT_REMINDER_TITLE', "支払いリマインダー");
jr_define( '_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1', "支払い通知メールを送信します。");
jr_define( '_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2', "..仮予約が行われてから数日後");
jr_define( '_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS', "このプラグインはバックグラウンドで自動的に実行され,選択した間隔内に支払い済みとしてマークされていない仮予約を行ったゲストに支払い通知メールを送信します。これは,支払い済みの予約を受け入れる場合に便利です。オフライン支払い方法(電信送金,小切手)を使用します。予約が行われてからX日以内に予約が支払われない場合,支払い通知メールがゲストに送信されます。また,そのコピーが送信されます。 。暫定予約処理プラグインも使用する場合は,支払い通知メールを送信する間隔が,未払いの予約を削除またはキャンセルするために設定された間隔よりも少なくとも1日短いことを確認してください。 ");
jr_define( '_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE', "予約の支払いリマインダー");
jr_define( '_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1', "で未払いの予約があります");
jr_define( '_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2', "予約を確保するには,のデポジットを支払う必要があります。");
jr_define( '_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO', "予約番号");
jr_define( '_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3', "。支払いオプションについて話し合いたい場合は,お問い合わせください。<br /> <br />ありがとうございます。");