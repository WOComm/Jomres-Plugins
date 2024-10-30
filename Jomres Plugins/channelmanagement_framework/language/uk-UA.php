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
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "Ідентифікатор каналу не встановлено");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "Ідентифікатор менеджера не встановлено");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Framework Manager Framework");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Канали");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Встановлені канали");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Виберіть канал");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Вибрати тип словника");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Помилка, канали не встановлені");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Перевірка осудності менеджера каналу");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Виберіть канал. Після цього ми перевіримо вашу конфігурацію та виділимо всі можливі проблеми, які вам можуть знадобитися вирішити.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Картування ресурсів");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Різні канали мають так звані словники. Це терміни для опису ресурсів, таких як типи кімнат, особливості кімнат, властивості тощо. Перед використанням каналу потрібно зіставити різні ресурси Jomres з окремими каналами ресурси, щоб властивості, імпортовані та експортовані до каналів, мали правильні ресурси. На цій сторінці ви спочатку виберете канал. Після цього ви перейдете на нову сторінку, де зможете вибрати типи ресурсів, які потрібно відобразити до ресурсів каналу (наприклад, властивості властивостей). Після того, як тип ресурсу буде вибрано, ви зможете обирати ресурси Джомреса та каналу один з одним. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Тут потрібно вибрати ресурс (словник)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Для цього елемента словника немає локальних елементів, тому немає нічого для порівняння.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Помилка, у каналі немає класу словника.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "На цій сторінці вам потрібно буде зіставити елементи словника менеджера каналу з тими, що є в Jomres.");

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "Облікові записи менеджера каналу");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Будь ласка, збережіть інформацію про авторизацію для будь -яких менеджерів каналів, у яких ви можете мати облікові записи.");
jr_define ('ЗАВЕРШИТИ', 'Завершити редагування');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Помилка, плагін Додаткові додаткові функції не встановлено.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "Назва каналу не надається");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Новий об'єкт властивості не надається");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "цей об'єкт JRUser не надається");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Початок імпорту майна");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Власності успішно імпортовано");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "Не вдалося імпортувати властивість");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Імпортувати всі властивості");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Імпортувати властивість");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "Властивості, які не позначені як опубліковані/активовані на віддаленому сервері, або властивості, які не мають елементів журналу змін, неможливо імпортувати.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Початок імпорту тарифу");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Тариф успішно імпортовано");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "Не вдалося імпортувати тариф");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "Неможливо перевірити параметри властивостей, намагалася імпортувати нерозпізнаний параметр властивості");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "Імпортовані властивості");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "Назва власності");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "Назва каналу");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "Ідентифікатор місцевої властивості");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "Віддалений ідентифікатор властивості");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Редагувати пульт");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Переглянути локальні");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "Видалити локальний");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Інформаційна панель");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Облікові записи каналів");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "Не встановлено плагінів для тонких каналів, ви ще не можете використовувати цю функцію.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "Непризначені властивості, якими ви керуєте, можуть бути призначені каналу. Якщо ви зміните канал, ви надаєте будь -якому каналу з дійсним доступом до API");