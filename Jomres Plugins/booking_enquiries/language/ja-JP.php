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
jr_define( '_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "メールの件名");
jr_define( '_JOMRES_BOOKING_REJECTION_HCONTENT', "電子メールテキスト(このテキストを編集して,この予約を拒否する理由を入力したり,代替案を提供したりできます)");
jr_define( '_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "この予約の問い合わせは拒否され,キャンセルされます。次の電子メールが顧客に送信されます。");
jr_define( '_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "この予約照会は,すでに拒否または承認されているため,拒否できません。");
jr_define( '_JOMRES_BOOKING_APPROVAL_HCONTENT', "電子メールテキスト(このテキストを編集して,この予約の支払い手順などを入力できます)");
jr_define( '_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "この予約の問い合わせは受け付けられ,カレンダーで空き状況が更新されます。次のメールがお客様に送信されます。");
jr_define( '_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "この予約照会は,すでに拒否または承認されているため,承認できません。");
jr_define( '_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "サイト管理者の新しい問い合わせメール");
jr_define( '_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "予約が最初に承認を必要とし,グローバルペイパルゲートウェイが有効になっている場合,予約時にサイト管理者に電子メールが送信されます");
jr_define( '_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "ホテルの新しいお問い合わせメール");
jr_define( '_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "予約が最初に承認を必要とする場合,予約時にホテルに送信される電子メール");
jr_define( '_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "ゲストの新しい問い合わせメール");
jr_define( '_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "予約が最初に承認を必要とする場合,予約時にゲストに送信される電子メール");
jr_define( '_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "ゲスト問い合わせ承認メール");
jr_define( '_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "問い合わせが可能かどうかを確認するために,プロパティマネージャーからゲストに手動で送信されるメール");
jr_define( '_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "ゲストの問い合わせ拒否メール");
jr_define( '_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "プロパティが問い合わせの詳細に利用できない場合,プロパティマネージャーによってゲストに手動で送信される電子メール");