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
jr_define( '_JRPORTAL_UNPAID_BOOKINGS_TITLE', "未払いの予約処理");
jr_define( '_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL', "暫定(未払い)予約をキャンセルまたは削除しますか？");
jr_define( '_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE', "予約時間から何日後ですか？");
jr_define( '_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS', "このプラグインはバックグラウンドで自動的に実行され,選択した間隔内に支払い済みとしてマークされていないすべての暫定予約を削除またはキャンセルします。これは,オフライン支払い方法を使用して支払いが行われる予約を受け入れる場合に便利です(電信送金予約が行われてからX日以内に予約が支払われない場合,予約は削除またはキャンセルされ,カレンダーには予約された日付が表示されるため,他の誰かがそれらの日を予約できます。 。予約が削除またはキャンセルされると,あなたとゲストの両方に電子メールで通知が届きます。予約をキャンセルすることを選択した場合,予約とその請求書はキャンセル済みとしてマークされ,データベースから削除されません。 ,後でアクセスできるようにします。削除することを選択した場合,予約とその請求書はデータベースから削除されます。 ");
jr_define( '_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE', "予約がキャンセルされました");
jr_define( '_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1', "必要なデポジットの未払いにより,予約は自動的にキャンセルされました。これは無効な予約です。再度予約する場合は,当社のWebサイトにアクセスして予約をやり直してください。以下は予約の詳細をキャンセルしました。 ");
jr_define( '_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2', "この通知を誤って受け取ったと思われる場合は,遠慮なくご連絡ください。");