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
jr_define( '_JOMRES_ACCESS_CONTROL', 'アクセス制御');
jr_define( '_JOMRES_ACCESS_CONTROL_DESC', 'この機能を使用すると,ユーザーが特定のタスクにアクセスするために必要な最小アクセスレベルを設定できます');
jr_define( '_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'デフォルト');
jr_define( '_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'Anybody');
jr_define( '_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', '登録済み');
jr_define( '_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'マネージャー');
jr_define( '_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'スーパーマネージャー');
jr_define( '_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', '誰も');
jr_define( '_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', '受付係');