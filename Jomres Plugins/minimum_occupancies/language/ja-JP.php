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
jr_define( '_OCCUPANCIES_TITLE', "最小占有率");

jr_define( '_OCCUPANCIES_DESCRIPTION', "適切な部屋と料金の組み合わせが表示される前に,ゲストが予約フォームで特定の数のゲストタイプを選択したことを確認する場合は,特定の部屋タイプの最小占有レベルを設定できます。" );
jr_define( '_OCCUPANCIES_DESCRIPTION_INFO', "ここでは,各部屋タイプの最小占有レベルを作成できます。ゲストが適切な数のゲストタイプを選択していない場合,部屋と料金の組み合わせは提供されません。各部屋タイプについて,を選択してください。部屋タイプが提供される前に予約フォームに最小である必要がある特定のタイプのゲストの数。部屋タイプの占有レベルを気にしない場合は,その部屋タイプのゲスト数を0に設定したままにします。 (零)。 ");
jr_define( '_OCCUPANCIES_NUMBER_OF_GUESTTYPE', "ゲストタイプ番号");
jr_define( '_OCCUPANCIES_NO_GUESTTYPES', "まだゲストタイプを作成していません。この機能を使用する前に,いくつかのゲストタイプを作成してください。");

jr_define( '_OCCUPANCIES_EDIT', "の最小占有率を編集");