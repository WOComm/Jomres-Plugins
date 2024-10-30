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
jr_define ('_JOMRES_ACCESS_CONTROL', 'Контроль доступа');
jr_define ('_JOMRES_ACCESS_CONTROL_DESC', 'Эта функция позволяет вам установить минимальный уровень доступа, необходимый пользователям для доступа к определенным задачам.');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'По умолчанию');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'Кто угодно');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_RIGN', 'Зарегистрировано');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'Менеджер');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'Суперменеджер');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'Никто');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'Регистратор');