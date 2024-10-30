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

jr_define('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES', "ASAModuleウィジェット/モジュール内のプロパティルーム/リソースを表示します。単一のプロパティWebサイトに役立ちます。");

jr_define('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "必須。リソースを表示するプロパティuid。");
jr_define('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "必須。表示するリソース(部屋など)のID。カンマ区切りのIDリスト。");
jr_define('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE', "オプション。到着日を,[サイトの構成]> [カレンダー]タブ> [カレンダーの入力形式]設定に対応する形式で設定します。例：2018年1月2日。これにより,特定の日付の特定の宿泊料金をで表示できます。 将来,それらの日付をカバーする料金が設定されていると仮定します。 ");
