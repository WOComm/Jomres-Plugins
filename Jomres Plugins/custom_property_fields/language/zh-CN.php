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

jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE',"自定义属性字段");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT',"编辑自定义属性字段");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO',"使用此功能为属性创建自定义信息字段。此信息由属性管理员添加，并显示在属性详细信息页面的新选项卡中。");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE',"其他属性信息");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS',"这些自定义属性字段可以显示在单独选项卡中的属性详细信息或属性列表中。您需要手动编辑/".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html(对于属性列表片段)以实现您需要的布局。使用上面输入的字段，基本布局如下所示，您可以将其用作示例，您可以从中构建自己的布局。");