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
jr_define ('_JOMRES_ACCESS_CONTROL', 'Контрола приступа');
jr_define ('_JOMRES_ACCESS_CONTROL_DESC', 'Ова функција вам омогућава да поставите минимални ниво приступа који је потребан корисницима за приступ одређеним задацима.');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'Подразумевано');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'Било ко');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', 'Регистровано');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'Менаџер');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'Супер Манагер');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'Нико');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'Рецепционер');