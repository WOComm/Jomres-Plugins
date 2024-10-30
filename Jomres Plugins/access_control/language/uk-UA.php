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

jr_define ('_JOMRES_ACCESS_CONTROL', 'Контроль доступу');
jr_define ('_JOMRES_ACCESS_CONTROL_DESC', 'Ця функція дозволяє встановити мінімальний рівень доступу, необхідний користувачам для доступу до певних завдань.');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'За замовчуванням');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'Хто -небудь');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', 'Зареєстровано');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'Менеджер');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'Суперменеджер');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'Ніхто');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'Ресепшн');