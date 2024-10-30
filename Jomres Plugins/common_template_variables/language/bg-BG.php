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

jr_define ('_COMMON_STRINGS_TITLE', "Общи променливи на шаблона");

jr_define ('_COMMON_STRINGS_INFO', 'Инструмент за програмисти. Проектиран да показва на разработчиците общи низове, които са достъпни за всички шаблони, без да е необходимо да ги добавяте към извикващия скрипт на шаблона. <br/> Например в този списък е дефиницията COMMON_NEXT. Разработчик може да добави това към шаблон на Jomres, без да се налага да го дефинира в извикващия скрипт. Бихте добавили общия низ към шаблона, както всеки друг низ, като поставите &#123;COMMON_NEXT&#125; в шаблона. <br/> В списъка по -долу ще видите константата, както е дефинирана в езиковия файл, а до нея изхода, който ще покаже (при условие че има персонализирани езикови персонализации). Обърнете внимание, в случай на константата "COMMON_LAST_VIEWED_PROPERTY_UID", uid на свойството варира и не е показан в този списък. ');
jr_define ('_COMMON_STRINGS_CONSTANT', "Константа");
jr_define ('_COMMON_STRINGS_VALUE', "Изход");