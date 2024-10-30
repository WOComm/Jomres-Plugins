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

jr_define ('_COMMON_STRINGS_TITLE', "Общие переменные шаблона");

jr_define ('_COMMON_STRINGS_INFO', "Инструмент разработчика. Создан, чтобы показать разработчикам общие строки, доступные для всех шаблонов, без необходимости добавлять их в вызывающий сценарий шаблона. <br/> Например, в этом списке есть определение COMMON_NEXT. Разработчик Вы можете добавить это в шаблон Jomres, не определяя его в вызывающем скрипте. Вы можете добавить общую строку в шаблон, как и любую другую строку, указав в шаблоне &#123;COMMON_NEXT&#125; <br/> В приведенном ниже списке вы увидите константу, определенную в языковом файле, и рядом с ней вывод, который она будет отображать (при условии наличия каких-либо настроек языка для конкретных свойств). Обратите внимание, что в случае константы COMMON_LAST_VIEWED_PROPERTY_UID, uid свойства меняется и не отображается в этом списке. ");
jr_define ('_COMMON_STRINGS_CONSTANT', "Константа");
jr_define ('_COMMON_STRINGS_VALUE', "Вывод");