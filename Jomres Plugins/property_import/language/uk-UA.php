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

jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Імпорт власності");
jr_define ('_JOMRES_PROPERTY_IMPORT_DESC', "Ця функція дозволяє імпортувати властивості за допомогою файлу CSV. Через різні необхідні перевірки ми рекомендуємо обмежити кількість створених властивостей пакетами не більше 50 одночасно.");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Будь ласка, виберіть файл, який ви хочете завантажити.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Файл csv повинен містити 11 стовпців, а поля не повинні містити HTML. Усі поля є обов'язковими.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Назва властивості");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Текст");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Кількість кімнат (якщо це вілла/котедж, то незалежно від кількості кімнат у фактичній власності, це має бути 1. Тільки готелі/пансіони типу ліжко та сніданок тощо повинні мати більше однієї кімнати). Ціле число .");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE', "Ціле число");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Ціна за ніч без кодів валют.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"Адреса електронної пошти");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Текст");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Вулиця");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Текст");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Місто");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Текст");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Регіон. Це має відповідати ідентифікаторам регіонів, що зберігаються в таблиці регіонів");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Це число");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY', "Країна власності. Короткий код, наприклад, GB або DE, не повна назва країни");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE', "Текст");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Поштовий індекс");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Текст");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Номер телефону");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Текст");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"Повний опис властивості. Максимум 500 символів");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Текст");

jr_define ('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT', "Помилка, тип властивості не встановлено.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Помилка, у нас немає типів кімнат для цього типу властивостей. Ви можете виправити це, перейшовши на сторінку Структура сайту в області адміністратора.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"На жаль, ви забули завантажити файл? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Знайдено забагато стовпців, або файл неправильно сформований, або дані csv створені неправильно.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Назва властивості не встановлено.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Кількість кімнат не встановлено.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Ціна за ніч не була встановлена.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS', "Не вдалося перевірити адресу електронної пошти.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET', "Вулиця не встановлена.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Місто не встановлено.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Регіон не встановлено.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Країну не встановлено.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE', "Поштовий індекс не встановлено.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Телефон не встановлено.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Опис не встановлено.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Властивість успішно імпортовано!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Оскільки у вас є одна або кілька властивостей, які не вдалося імпортувати, ми експортували лише ці властивості в поле нижче. Ви можете скопіювати ці властивості в excell/open office calc/на ваш вибір обробника файлу CSV і виправити проблеми без повторного імпорту всіх властивостей.");