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
jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Genişləndirilmiş Xəritələr");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Xəritə eni (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Xəritə hündürlüyü (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Xəritə böyütmə səviyyəsi");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Varsayılan Jomres mülkiyyətçisini ləğv edin?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Digər hadisələr/attraksionlar işarəsi nişanı");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Popup eni (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Şəkil genişliyi (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Şəkil hündürlüyü (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Mülkiyyətin təsviri göstərilsin? (yalnız kirayə verilənlər üçün)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Mülkiyyətin təsvirini kəsin? (yalnız kirayə verilənlər üçün)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Mülkiyyətin təsvirini (simvollardan sonra) kəsin (yalnız kirayə verilənlər üçün)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Qrup markerləri");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Əmlak kolleksiyaları və yerli hadisələr/cazibədar yerləri olan xəritəni göstərir.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Göstərmək istədiyiniz xüsusiyyət növlərini göstərin. Vergül ayrılıb.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Xüsusiyyətləri göstərin? Göstərilməməsi üçün 0 olaraq təyin edin.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Hadisələri göstərin? Göstərilməməsi üçün 0 olaraq təyin edin.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Turistik yerləri göstərin? Göstərilməməsi üçün 0 olaraq təyin edin.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO ölkə kodu. Xəritəni bir ölkə ilə məhdudlaşdırmaq üçün bu seçimdən istifadə edin.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Nəticələri müəyyən bir bölgədəki xüsusiyyətlərlə məhdudlaşdırmaq üçün bölgə idini təyin edin.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Nəticələri müəyyən bir şəhərdəki mülklərlə məhdudlaşdırmaq üçün bir şəhər adı təyin edin");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");