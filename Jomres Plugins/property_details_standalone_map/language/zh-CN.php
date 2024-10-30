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

jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_DETAILS_STANDALONE_MAP', '当页面是属性详细信息页面 (task=viewproprety) 然后显示此属性的谷歌地图。这允许您在属性详细信息页面上将地图放置在侧边栏或模块/小部件位置 .');

jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_DETAILS_STANDALONE_MAP_ARG_PROPERTY_UID', '属性 uid.' );
jr_define('_JOMRES_SHORTCODES_06000PROPERTY_DETAILS_STANDALONE_MAP_ARG_MAPWIDTH', '地图宽度');
jr_define('_JOMRES_SHORTCODES_06000PROPERTY_DETAILS_STANDALONE_MAP_ARG_MPAHEIGHT', '地图高度');