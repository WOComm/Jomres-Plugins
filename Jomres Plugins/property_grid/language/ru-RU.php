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
	jr_define('_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Сетка свойств. Отображает ряд свойств, идеально подходит для целевой страницы." );

	jr_define('_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Используйте либо property_uids, либо property_cols. property_uids принимает разделенный запятыми список идентификаторов свойств, которые вы хотите отобразить. Можно отобразить максимум 6 свойств");
	jr_define('_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "В качестве альтернативы выберите количество отображаемых столбцов от 1 до 6. Для отображения будут выбраны случайные свойства из базы данных." );