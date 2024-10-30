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

jr_define ('_COMMON_STRINGS_TITLE', "Загальні змінні шаблону");

jr_define ('_COMMON_STRINGS_INFO', "Інструмент для розробників. Призначений для показу розробникам загальних рядків, доступних для всіх шаблонів, без необхідності додавати їх до сценарію виклику шаблону. <br/> Наприклад, у цьому списку є визначення COMMON_NEXT. Розробник можна додати це до шаблону Jomres, не визначаючи його у скрипті виклику. Ви б додали загальний рядок до шаблону, як і будь -який інший рядок, поставивши &#123; COMMON_NEXT &#125; у шаблоні. <br/> У наведеному нижче списку ви побачите константу, визначену у мовному файлі, а поруч із нею - результат, який вона буде показувати (за умови наявності будь -яких налаштувань мови, характерних для властивостей). Зауважте, у випадку константи \"COMMON_LAST_VIEWED_PROPERTY_UID\", uid властивості змінюється і не відображається у цьому списку. ");
jr_define ('_COMMON_STRINGS_CONSTANT', "Постійна");
jr_define ('_COMMON_STRINGS_VALUE', "Вихід");