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
jr_define( '_BYPASS_CONFIRMATION_TITLE', "レビュー予約ページをバイパスする");
jr_define( '_BYPASS_CONFIRMATION_DESC', "これを有効にすると,レビュー予約ページは表示されなくなり,代わりにゲストは直接支払いに移動します。ゲートウェイが有効になっていない場合は,予約が直接挿入されます。");