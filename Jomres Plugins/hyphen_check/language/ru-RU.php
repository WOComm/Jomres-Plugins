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

jr_define ('TOOL_HYPHEN_CHECK_TITLE', "Проверка дефиса");
jr_define ('TOOL_HYPHEN_CHECK_DESCRIPTION', "Этот инструмент предназначен для проверки всех полей с задержкой свойств и длинных полей. Некоторые из них могут неправильно содержать html-объекты в полях lat или long вместо фактических дефисов. Где обнаружено, этот инструмент преобразует их в дефисы.");
jr_define ('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND', "Некоторые свойства, обнаруженные с помощью html-сущностей, которые теперь были преобразованы в фактические дефисы. Число преобразованных свойств равно");
jr_define ('TOOL_HYPHEN_CHECK_DONE_NONEFOUND', "Все хорошо, не обнаружено свойств с сущностями html там, где должны быть дефисы.");