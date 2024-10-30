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

jr_define( '_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE', "簡単な予約");
jr_define( '_JOMRES_BLACKBOOKINGS_IMPROVED_DESC', "黒の予約は,部屋,部屋,またはプロパティを占有するが,請求または請求書のデータがない予約です。通常,別の媒体(電話など)を介して行われた予約を示すために使用されます。ブラックブッキングを作成して,プロパティマネージャーまたはゲストがこれらのリソースをオンラインで予約できないようにします。 ");
jr_define( '_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM', "少なくとも1つの部屋を選択する必要があります。");
jr_define( '_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED', "正常に予約されました。");
jr_define( '_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED', "その期間中にすでに予約があったため,予約できませんでした。");
jr_define( '_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY', "部屋がブロックされています");
jr_define( '_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP', "このカレンダーを使用すると,リソースを簡単にブラックブックできます。1つまたは複数の部屋を選択し,ブラック予約の最初と最後の日付をクリックすると,リソースがブラックブッキングされます。ブラックブッキングが1つだけの場合日付をクリックしてから,その日付を2回クリックします。 ");
jr_define( '_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP', "このカレンダーを使用して,リソースを簡単にブラックブックします。ブラックブッキングの最初と最後の日付をクリックすると,リソースがブラックブッキングされます。ブラックブッキングが1つの日付のみの場合は,その日付を2回クリックします。 。 ");

jr_define( '_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL', "すべて追加");
jr_define( '_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL', "すべて削除");
jr_define( '_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "選択されたアイテム");