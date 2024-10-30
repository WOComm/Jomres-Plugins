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

jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE',"默认属性设置");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE',"通用配置标题(如果有，有些可能没有)");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME',"变量名");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE',"当前值");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING',"这是一个高级功能，如果你没有特定的用途，最好不要使用它。这个插件允许你修改一个新属性的默认值。使确保您在更改变量之前了解变量的作用，因为在此处更改它可能会对您的 Jomres 系统产生深远的影响。空白项目通常是不再使用的旧设置，但出于向后兼容的原因留在原地，或者是设置无法通过属性配置区域进行修改。");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE',"新值");