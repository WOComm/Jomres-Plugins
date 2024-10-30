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

jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Розширені карти");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Ширина карти (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Висота карти (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Рівень масштабування карти");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Перекрити список властивостей Jomres за замовчуванням?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Піктограма маркера інших подій/визначних пам'яток");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Ширина спливаючого вікна (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Ширина зображення (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Висота зображення (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Відобразити опис властивості? (лише для спливаючих вікон оренди)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Обрізати опис властивості? (лише для спливаючих вікон оренди)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Обрізати опис властивості після (символи) (лише для спливаючих вікон оренди)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Групові маркери");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Відображає карту з колекціями майна та місцевими подіями/визначними місцями.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Конкретні типи властивостей, які потрібно показати. Комами розділено.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Показати властивості? Установіть 0, щоб запобігти їх показу.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Показати події? Установіть 0, щоб запобігти їх показу.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Показати визначні пам'ятки? Установіть 0, щоб запобігти їх показу.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "Код країни ISO. Використовуйте цей параметр, щоб обмежити карту однією країною.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Встановіть ідентифікатор регіону, щоб обмежити результати властивостями у певній області.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Встановіть назву міста, щоб обмежити результати властивостями у певному місті.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
