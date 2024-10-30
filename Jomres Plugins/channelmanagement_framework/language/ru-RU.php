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

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "Идентификатор канала не установлен");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "Идентификатор менеджера не установлен");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Структура диспетчера каналов");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Каналы");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Установленные каналы");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Выберите канал");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Выбрать тип словаря");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Ошибка, каналы не установлены");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Проверка работоспособности менеджера канала");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Выберите канал. Как только вы это сделаете, мы проверим вашу конфигурацию и выделим любые возможные проблемы, которые вам, возможно, придется решить.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Сопоставление ресурсов");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Различные каналы имеют так называемые словари. Эти термины используются для описания таких ресурсов, как типы комнат, характеристики комнат, характеристики собственности и т. д. Прежде чем вы сможете использовать канал, вам необходимо сопоставить различные ресурсы Jomres с отдельными каналами ресурсы, чтобы свойства, импортированные из и экспортированные в каналы, имели правильные ресурсы. На этой странице вы сначала выберете канал. После этого вы попадете на новую страницу, где сможете выбрать типы ресурсов, которые хотите сопоставить к ресурсам Канала (например, свойствам). После выбора типа ресурса вы сможете выбирать ресурсы Джомреса и Канала друг с другом. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Здесь нужно выбрать ресурс (словарь)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Для этого элемента словаря нет локальных элементов, поэтому сопоставление не с чем.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Ошибка, канал не имеет класса словаря.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "На этой странице вам нужно будет сопоставить элементы словаря менеджера каналов с элементами в Джомре.");

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "Учетные записи менеджеров каналов");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Сохраните информацию авторизации для всех менеджеров каналов, с которыми у вас могут быть учетные записи.");
jr_define ('ЗАВЕРШИТЬ', 'Завершить редактирование');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Ошибка, дополнительный дополнительный модуль не установлен.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "Имя канала не указано");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Новый объект свойства не предоставлен");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "объект thisJRUser не предоставлен");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Запуск импорта свойства");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Успешно импортированное свойство");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "Не удалось импортировать свойство");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Импортировать все свойства");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Импортировать свойство");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "Свойства, которые не помечены как опубликованные / активированные на удаленном сервере, или свойства, не имеющие каких-либо элементов журнала изменений, не могут быть импортированы.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Запуск импорта тарифа");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Успешно импортированный тариф");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "Не удалось импортировать тариф");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "Невозможно проверить параметры свойства, была предпринята попытка импорта нераспознанного параметра свойства");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "Импортированные свойства");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "Имя свойства");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "Название канала");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "Локальный идентификатор свойства");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "Удаленный идентификатор ресурса");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Удаленное редактирование");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Просмотр локальных");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "Удалить локальный");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Панель управления");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Учетные записи каналов");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "Плагины тонкого канала не установлены, вы пока не можете использовать эту функцию.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "Неназначенные свойства, которыми вы управляете, могут быть назначены каналу. Если вы измените канал, вы предоставите любому каналу с действующим доступом API");