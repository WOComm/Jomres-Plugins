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

jr_define ('USEFUL_LINKS_MODULE_TITLE', "Полезные ссылки для");
jr_define ('USEFUL_LINKS_FORSALE', "Недвижимость на продажу в");
jr_define ('USEFUL_LINKS_HOTELS', "Отели / ночлег и завтрак в");
jr_define ('USEFUL_LINKS_VILLAS', "Дома для отпуска в аренду");
jr_define ('USEFUL_LINKS_WIKIPEDIA', "Информация о");

jr_define ('USEFUL_LINKS_ADMIN', "Полезные ссылки");
jr_define ('USEFUL_LINKS_ADMIN_PROPERTIESFORSALE', "Идентификатор типа недвижимости");
jr_define ('USEFUL_LINKS_ADMIN_HOTELS', "Идентификатор типа свойства гостиницы / отеля типа постель и завтрак ");
jr_define ('USEFUL_LINKS_ADMIN_VILLAS', "Идентификатор типа недвижимости для загородных домов");

jr_define ('_JOMRES_SHORTCODES_06000USEFULLINKS', 'Этот плагин предназначен для показа ссылок на определенные поисковые запросы, если URL-адрес включает в себя "страну", "регион" или "город", поэтому обычно вы можете разместить его на боковой панели или в позиции модуля / виджета в в верхней части страницы. Сначала вам необходимо настроить плагин на вкладке "Конфигурация сайта"> "Полезные ссылки", чтобы указать идентификаторы типов собственности для отелей, недвижимости и апартаментов / коттеджей / вилл. ');