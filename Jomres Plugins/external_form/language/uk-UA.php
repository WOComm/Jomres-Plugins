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

jr_define ('EXTERNAL_FORM', "Зовнішня форма");
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE', 'Шорткод плагіна (наприклад, "rsform")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1', 'Аргумент 1 (наприклад, "1")');
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2', "Аргумент 2 (необов'язково)");
jr_define ('EXTERNAL_FORM_INFO', "Дозволяє включати форму із плагіна зовнішньої форми у вкладки деталі властивості. Встановіть для короткого коду плагіна щось на кшталт \"rsform\" і додайте додаткові аргументи, якщо це необхідно. Це не повинно бути form, може бути будь -яким, що називається мамботом, але форма буде типовим використанням. ");