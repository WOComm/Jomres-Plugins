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

jr_define ('EXTERNAL_FORM', "Внешняя форма");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Шорткод плагина (например, "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'Аргумент 1 (например, "1") ');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Аргумент 2 (необязательно)");
jr_define ('EXTERNAL_FORM_INFO', "Позволяет вам включать форму из внешнего модуля формы во вкладки сведений о свойствах. Установите для шорткода плагина что-то вроде 'rsform' и добавьте дополнительные аргументы по мере необходимости. Не обязательно форма может быть чем угодно, что называется мамботом, но форма будет типичным использованием. ");