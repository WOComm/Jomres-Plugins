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

jr_define('TOOL_HYPHEN_CHECK_TITLE',"连字符检查");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"此工具旨在检查所有属性滞后和长字段。有些人可能在纬度或长字段中错误地使用 html 实体而不是实际的连字符。找到此工具的地方会将它们转换为连字符。");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"在html实体中找到的一些属性，现在已经转换为实际的连字符。转换的属性数量为");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"一切都很好，没有找到实际连字符应该在的html实体的属性。");