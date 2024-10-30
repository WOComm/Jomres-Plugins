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

jr_define ('_JOMRES_PROPERTY_IMPORT_TITLE', "Импорт свойств");
jr_define ('_JOMRES_PROPERTY_IMPORT_DESC', "Эта функция позволяет импортировать свойства через файл CSV. Из-за необходимости различных проверок мы рекомендуем ограничить количество создаваемых свойств пакетами, не более 50 за раз.");
jr_define ('_JOMRES_PROPERTY_IMPORT_SELECT', "Выберите файл, который вы хотите загрузить.");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS', "Файл csv должен иметь 11 столбцов, а поля не должны содержать никакого HTML. Все поля обязательны.");

jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME', "Имя свойства");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE', "Текст");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS', "Количество комнат (если это вилла / коттедж, тогда, независимо от количества комнат в фактическом объекте собственности, это должно быть 1. Только отели / пансионаты и т. д. должны иметь более одной комнаты). Целое число . ");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE', "Целое число");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE', "Цена за ночь без кодов валют.");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE', "Float");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS', "Адрес электронной почты");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE', "Текст");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET', "Улица");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE', "Текст");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN', "Город");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE', "Текст");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION', "Регион. Это должно соответствовать идентификаторам регионов, хранящихся в таблице регионов");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE', "Целое число");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY', "Страна собственности. Сокращенный код, например GB или DE, а не полное название страны");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE', "Текст");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE', "Почтовый индекс");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE', "Текст");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE', "Номер телефона");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE', "Текст");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION', "Полное описание свойства. Максимум 500 символов");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE', "Текст");

jr_define ('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT', "Ошибка, тип свойства не был установлен.");
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE', "Ошибка, у нас нет типов комнат для этого типа собственности. Вы можете исправить это, посетив Структуру сайта в области администратора.");
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_FILE', "Ой, вы забыли загрузить файл?");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS', "Обнаружено слишком много столбцов, либо файл имеет неправильный формат, либо данные csv построены неправильно.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET', "Имя свойства не было установлено.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT', "Количество комнат не установлено.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET', "Цена за ночь не была установлена.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS', "Не удалось проверить адрес электронной почты.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET', "Улица не задана.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN', "Город не задан.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION', "Регион не задан.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY', "Страна не установлена.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE', "Почтовый индекс не установлен.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE', "Телефон не установлен.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION', "Описание не задано.");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS', "Свойство успешно импортировано!");

jr_define ('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES', "Поскольку у вас есть одно или несколько свойств, которые не удалось импортировать, мы экспортировали только эти свойства в поле ниже. Вы можете скопировать эти свойства в excell / open office calc / на ваш выбор обработчика файла CSV и исправить проблемы без повторного импорта всех свойств снова. ");