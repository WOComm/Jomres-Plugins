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

jr_define( '_ CLONE_TARIFFS_TITLE', "クローン料金");
jr_define( '_ CLONE_TARIFFS_INFO', "ここでは,ターゲットプロパティからソースプロパティに料金表を複製できます。管理する権限があるプロパティのみを使用できます。");
jr_define( '_ CLONE_TARIFFS_SOURCE', "ソースプロパティ");
jr_define( '_ CLONE_TARIFFS_TARIFF_TO_CLONE', "クローンへの関税");
jr_define( '_ CLONE_TARIFFS_TARGET', "ターゲットプロパティ");
jr_define( '_ CLONE_TARIFFS_TARGET_ROOMTYPE', "ターゲットプロパティルームタイプ");
jr_define( '_ CLONE_TARIFFS_TARGET_WARNING', "Targetプロパティの料金編集モードがSourceプロパティの料金編集モードと異なる場合,クローン作成が行われると,Targetプロパティの元の料金が削除され,ソースの料金編集モードが反映されるように変更されます。プロパティの設定。 ");
jr_define( '_ CLONE_TARIFFS_TARGET_DELETE_EXISTING', "ターゲットプロパティの既存の料金を削除しますか？");
jr_define( '_ CLONE_TARIFFS_TARGET_DELETE_OPTION', "Targetプロパティの料金編集モードがSourceプロパティと同じである場合,既存の料金は削除されません。ただし,このオプションをYesに設定することで,これを上書きすることを選択できます。");