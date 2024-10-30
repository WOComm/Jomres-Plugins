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
jr_define( 'TOOL_HYPHEN_CHECK_TITLE', "ハイフンチェック");
jr_define( 'TOOL_HYPHEN_CHECK_DESCRIPTION', "このツールは,すべてのプロパティラグフィールドとロングフィールドをチェックするように設計されています。実際のハイフンではなく,latフィールドまたはlongフィールドに誤ってhtmlエンティティが含まれている場合があります。このツールが見つかった場合,これらはハイフンに変換されます。");
jr_define( 'TOOL_HYPHEN_CHECK_DONE_SOMEFOUND', "実際のハイフンに変換されたhtmlエンティティで見つかったいくつかのプロパティ。変換されたプロパティの数は");
jr_define( 'TOOL_HYPHEN_CHECK_DONE_NONEFOUND', "すべてが良好で,実際のハイフンがあるべきhtmlエンティティでプロパティが見つかりませんでした。");