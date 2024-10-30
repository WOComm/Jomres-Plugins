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

jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Разширени карти");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Ширина на картата (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Височина на картата (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Ниво на мащабиране на картата");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Замяна на списъка със собствености на Jomres по подразбиране?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Икона за маркиране на други събития/атракции");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Изскачаща ширина (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Ширина на изображението (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Височина на изображението (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Показване на описание на имота? (само за изскачащи прозорци под наем)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Изрязване на описанието на имота? (само за изскачащи прозорци под наем)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Изрежете описанието на имота след (символи) (само за изскачащи прозорци под наем)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Групови маркери");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Показва карта с колекции от имоти и местни събития/атракции.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Конкретни типове свойства, които искате да се показват. Разделени със запетаи.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Показване на свойства? Задайте 0, за да предотвратите показването им.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Показване на събития? Задайте 0, за да предотвратите показването им.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Показване на атракции? Задайте 0, за да не ги показвате.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO код на държава. Използвайте тази опция, за да ограничите картата до една държава.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Задайте идентификатора на региона, за да ограничите резултатите до свойства в определен регион.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Задайте име на град, за да ограничите резултатите до имоти в конкретен град.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");