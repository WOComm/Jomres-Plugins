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

jr_define('TOOL_HYPHEN_CHECK_TITLE',"Проверка на тирета");
jr_define ('TOOL_HYPHEN_CHECK_DESCRIPTION', "Този инструмент е проектиран да проверява всички изоставания на свойства и дълги полета. Някои може неправилно да имат html обекти в широките или дългите полета вместо действителните тирета. Където е намерено, този инструмент ги превръща в тирета.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Някои свойства, намерени с html обекти, които вече са преобразувани в действителни тирета. Броят на преобразуваните свойства е ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Всичко е добре, не бяха открити свойства с html обекти, където трябва да са действителните тирета.");