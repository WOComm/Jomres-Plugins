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

jr_define('EXTERNAL_FORM',"外部表格");
jr_define('EXTERNAL_FORM_PLUGIN_SHORTCODE','插件简码(例如"rsform")');
jr_define('EXTERNAL_FORM_PLUGIN_ARG1','Argument 1 (e.g. "1")');
jr_define('EXTERNAL_FORM_PLUGIN_ARG2',"参数 2 (可选)");
jr_define('EXTERNAL_FORM_INFO',"允许您将来自外部表单插件的表单包含到属性详细信息的选项卡中。将插件短代码设置为 rsform 之类的内容并根据需要添加额外的参数。不需要是 形式，可以是任何被称为 mambot 的东西，但形式将是一个典型的用途。");