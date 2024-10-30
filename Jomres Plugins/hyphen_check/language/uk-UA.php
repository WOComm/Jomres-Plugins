<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('TOOL_HYPHEN_CHECK_TITLE', "Перевірка дефісів");
jr_define ('TOOL_HYPHEN_CHECK_DESCRIPTION', "Цей інструмент призначений для перевірки всіх затримок властивостей та довгих полів. Деякі можуть неправильно мати сутності html у широких або довгих полях замість фактичних дефісів. Де знайдено, цей інструмент перетворює їх у дефіси.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"З сутностями html знайдено деякі властивості, які тепер перетворено на фактичні дефіси. Кількість перетворених властивостей становить ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Все добре, не знайдено жодних властивостей з об'єктами html, де мають бути фактичні дефіси.");