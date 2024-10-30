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

jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES', "Показывает помещения / ресурсы свойств в виджете / модуле ASAModule. Полезно для веб-сайтов с одним ресурсом.");

jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "Обязательно. Uid свойства, для которого вы хотите отобразить ресурсы.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "Обязательно. Идентификаторы ресурсов (например, комнат), которые вы хотите показать. Список идентификаторов, разделенных запятыми.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE', "Необязательно. Установите дату прибытия в формате, который соответствует Конфигурации сайта> вкладка Календарь> Настройка формата ввода календаря. Например, 01/02/2018. Это позволяет отображать конкретные цены на номера в определенные даты в будущее, при условии, что у вас установлены тарифы на эти даты. ");
