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

jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE', "Настройки свойств по умолчанию");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE', "Заголовок общей конфигурации (если есть, некоторые могут не быть)");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME', "Имя переменной");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE', "Текущее значение");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING', "Это расширенная функция, если у вас нет для нее конкретного использования, лучше не использовать ее. Этот плагин позволяет вам изменять значения по умолчанию для нового свойства. Сделайте убедитесь, что вы понимаете, что делает переменная, прежде чем изменять ее, поскольку ее изменение здесь может иметь далеко идущие последствия для вашей системы Jomres. Пустые элементы - это, как правило, более старые настройки, которые больше не используются, но оставлены на месте по причинам обратной совместимости, или являются настройками, которые не может быть изменен в области конфигурации свойств. ");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE', "Новое значение");