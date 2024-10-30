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

jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Расширенные карты");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Ширина карты (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Высота карты (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Уровень масштабирования карты");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Переопределить список свойств Jomres по умолчанию?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Значок маркера других событий / достопримечательностей");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Ширина всплывающего окна (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Ширина изображения (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Высота изображения (пикс.)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Отображать описание свойства? (только для всплывающих окон при аренде)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Обрезать описание свойства? (только для всплывающих окон аренды)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Обрезать описание свойства после (символов) (только для всплывающих окон аренды)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Маркеры групп");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Отображает карту с коллекциями свойств и местных событий / достопримечательностей.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Укажите типы свойств, которые вы хотите показать. Разделенные запятыми.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Показать свойства? Установите значение 0, чтобы они не отображались.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Показывать события? Установите 0, чтобы они не отображались.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Показать достопримечательности? Установите 0, чтобы они не показывались.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "Код страны ISO. Используйте эту опцию, чтобы ограничить карту одной страной.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Установите идентификатор региона, чтобы ограничить результаты свойствами в определенной области.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Задайте название города, чтобы ограничить результаты свойствами в определенном городе.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
