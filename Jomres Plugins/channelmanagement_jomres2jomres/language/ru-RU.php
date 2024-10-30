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

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Интеграция Джомреса 2 Джомреса");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "Идентификатор клиента родительского сайта");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "Идентификатор клиента родительского сайта. На родительском сайте вам понадобится уникальный идентификатор клиента и секрет со всеми установленными подключаемыми модулями функций api, установленным подключаемым модулем Channel Management Framework и при создании / редактировании идентификатора клиента / пара секретных ключей, вам нужно будет предоставить ему доступ ко всем доступным областям. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Секрет клиента родительского сайта");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Секрет клиента родительского сайта");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "Родительский URL");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "URL-адрес родительского сайта Jomres.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Ошибка: не задан идентификатор клиента родительского сайта. Перейдите на вкладку Конфигурация сайта  Аккаунты диспетчера каналов, чтобы сохранить свой идентификатор клиента.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Ошибка, секрет родительского сайта не установлен. Чтобы сохранить секрет, перейдите на вкладку Конфигурация сайта  Учетные записи диспетчера каналов");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Ошибка: не задан секретный URL-адрес родительского сайта. Перейдите на вкладку Конфигурация сайта  Аккаунты диспетчера каналов, чтобы сохранить URL-адрес родительского сайта.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Ошибка, ваш идентификатор клиента не установлен. Перейдите на вкладку Конфигурация сайта  Учетные записи менеджера каналов ", "чтобы сохранить свое имя пользователя.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Ошибка, ваш идентификатор клиента не установлен. Перейдите на вкладку Конфигурация сайта  Учетные записи менеджера каналов, чтобы сохранить пароль.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Настройка канала");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: импорт новых свойств.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "ИМПОРТ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "ЭКСПОРТ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "Идентификатор свойства не установлен");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Отображенные элементы словаря не установлены");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Тип локального свойства не найден. Если тип свойства был создан, убедитесь, что вы сопоставили тип свойства удаленной службы с типом локального свойства.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Тип удаленного свойства не возвращается каналом.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Тип локального свойства не передан.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Не удалось определить модель бронирования (mrp или srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Не удалось определить модель бронирования (mrp или srp) после нахождения идентификатора типа собственности.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Не удалось определить код страны");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Не удалось определить идентификатор региона");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Не удалось правильно проверить массив настроек");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Типы свойств не сопоставлены администратором");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Функции свойства не отображаются администратором");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Типы комнат не сопоставлены администратором");