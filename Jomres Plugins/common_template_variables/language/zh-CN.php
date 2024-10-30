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

jr_define('_COMMON_STRINGS_TITLE',"常用模板变量");

jr_define('_COMMON_STRINGS_INFO',"开发人员工具。旨在向开发人员显示所有模板都可用的通用字符串，而无需将它们添加到模板的调用脚本中。<br/>例如，在此列表中是定义 COMMON_NEXT。开发人员 可以将其添加到 Jomres 模板而无需在调用脚本中定义它。您可以像添加任何其他字符串一样将公共字符串添加到模板中，方法是将 &#123;COMMON_NEXT&#125; 放在模板中。<br/> 在下面的列表中，您将看到语言文件中定义的常量，旁边是它将显示的输出(取决于任何属性特定的语言自定义)。注意，在COMMON_LAST_VIEWED_PROPERTY_UID 常量的情况下， 属性 uid 有所不同，未显示在此列表中。");
jr_define('_COMMON_STRINGS_CONSTANT',"常量");
jr_define('_COMMON_STRINGS_VALUE',"输出");