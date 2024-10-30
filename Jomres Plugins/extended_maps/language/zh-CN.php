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

jr_define('_JRPORTAL_EXTENDED_MAPS_TITLE',"扩展地图");
jr_define('_JRPORTAL_EXTENDED_MAPS_HWIDTH',"地图宽度(px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HHEIGHT',"地图高度(px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL',"地图缩放级别");
jr_define('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST',"覆盖默认的 Jomres 属性列表？");
jr_define('_JRPORTAL_EXTENDED_MAPS_HINFOICON',"其他事件/景点标记图标");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH',"弹出框宽度(px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH',"图片宽度(px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT',"图片高度(px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION',"显示属性描述？(仅适用于租赁弹出窗口)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION',"修剪财产描述？(仅适用于租赁弹出窗口)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE',"在(字符)之后修剪属性描述(仅适用于租赁弹出窗口)");
jr_define('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS',"组标记");

jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "显示包含属性和本地事件/景点集合的地图。");
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "指定要显示的属性类型。逗号分隔。");
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "显示属性？设置为 0 以防止显示它们。" );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "显示事件？设置为 0 以防止它们被显示。" );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "显示景点？设置为 0 以防止它们被显示。" );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO 国家代码。使用此选项将地图限制为一个国家。" );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "设置区域 id 以将结果限制为特定区域中的属性。");
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "设置城镇名称以将结果限制为特定城镇的属性。" );

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
