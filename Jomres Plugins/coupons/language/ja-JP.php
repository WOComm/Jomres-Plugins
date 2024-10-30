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

jr_define( 'JOMRES_COUPONS_SCAN', "このコードを携帯電話にスキャンして今すぐ予約してください！");
jr_define( 'JOMRES_COUPONS_GETADISCOUNT', "割引を受ける");
jr_define( 'JOMRES_COUPONS_PERCENT', "％");
jr_define( 'JOMRES_COUPONS_OFFACCOMMODATION', "宿泊費をオフ");
jr_define( 'JOMRES_COUPONS_IFYOUBOOKBETWEEN', "間で予約する場合");
jr_define( 'JOMRES_COUPONS_AND', "および");
jr_define( 'JOMRES_COUPONS_FORDATESBETWEEN', "の間の日付の場合");
jr_define( 'JOMRES_COUPONS_ALTERNATIVELY', "または,予約時にこの割引コードを入力してください：");
jr_define( 'JOMRES_COUPONS_PRINT_COUPONS', "クーポンの印刷");

jr_define( '_JRPORTAL_COUPONS_BOOKING_VALIDFROM', '予約はから有効です');
jr_define( '_JRPORTAL_COUPONS_BOOKING_VALIDTO', '予約は有効です');
jr_define( '_JRPORTAL_COUPONS_GUESTNAME', 'ゲスト名');
jr_define( '_JRPORTAL_COUPONS_DESC_478', "割引コードを生成して,予約のインセンティブとしてゲストに渡すことができます。<br/>
有効な開始日と終了日は,予約を行うことができる日付を指します。一方,有効な開始日と終了日は,クーポンが有効になるために予約がカバーしなければならない日付を指します。予約がその期間外の場合,通常の料金がその期間外の日に適用されます。<br/>
1人の特定のゲストが予約を利用できるようにする場合は,ドロップダウンでそのゲストの名前を選択して,クーポンをそのゲストのみに制限します。 ");
jr_define( '_JRPORTAL_COUPONS_DESC_ADMIN', "ここで作成された割引コードは,Webサイトのすべてのプロパティに適用されます。");
jr_define( '_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'クーポンを使用すると,この予約はから割引されます。');
jr_define( '_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' to ');