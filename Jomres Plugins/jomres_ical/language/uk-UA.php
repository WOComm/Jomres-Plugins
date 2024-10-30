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

jr_define ('_JOMRES_ICAL_EVENT', 'Подія iCal');
jr_define('_JOMRES_ICAL_FEED', 'iCal Feed');
jr_define( '_JOMRES_ICAL_FEED_LINK', 'URL-адреса каналу iCal');
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Ваші канали iCal можуть відображати майбутні бронювання у віддаленому календарі, включаючи ваш мобільний пристрій, Google Calendar, Apple Calendar, Thunderbird, Outlook тощо. Використовуйте ці URL-адреси, щоб підписатися на канали в програмне забезпечення вашого календаря.');
jr_define( '_JOMRES_ICAL_ANON', 'Анонімна URL-адреса каналу iCal' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Дозволити анонімний доступ до каналів iCal?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Якщо цей параметр увімкнено, ваша стрічка подій iCal буде доступна для всіх, але без даних про бронювання або гостя.');
jr_define('_JOMRES_ICAL_IMPORT', 'iCal Import');
jr_define( '_JOMRES_ICAL_SELECT', 'Виберіть файл для імпорту');
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Помилка, файл не завантажено.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Під час імпортування файлу iCal датою завершення події має бути дата від'їзду гостя. Резюме має бути ім'ям гостя. Опис події може містити всі інші деталі." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Цей номер бронювання вже існує в системі.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Немає вільних кімнат на вибрані дати.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'У файлі ics не знайдено подій.' );
jr_define ('_JOMRES_ICAL_SUCCESS', 'Подія успішно імпортовано');
jr_define( '_JOMRES_ICAL_FAILURE', 'Подія не може бути імпортована');

jr_define ('_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Ім\'я гостя');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Опис події');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Почати');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'Кінець');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Результат');
jr_define ('_JOMRES_ICAL_WITHHELD', 'Утримано');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Ваші канали iCal можуть відображати майбутні бронювання у віддаленому календарі, включаючи ваш мобільний пристрій, Google Calendar, Apple Calendar, Thunderbird, Outlook тощо.');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Ця функція дозволяє синхронізувати бронювання з таких сайтів, як Airbnb, Homeway та інших, з Jomres. Вам потрібно буде ввести URL-адресу каналу iCal для кожного сайту, з яким ви хочете синхронізуватися. Якщо хтось наприклад, забронюйте свою нерухомість на Airbnb, ці дати також відображатимуться як заблоковані (чорні бронювання) на цьому веб -сайті Jomres, тому ніхто не може також бронювати ці дати тут. Це не синхронізує дані бронювання між сайтами (наприклад, дані про гостей, ціни, рахунки-фактури тощо), але це гарний і простий спосіб уникнути подвійного бронювання, синхронізуючи лише наявність.');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'Параметри синхронізації iCal');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'Параметри каналу iCal');
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'Зовнішня URL-адреса iCal');
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Також включати запити щодо бронювання?');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Якщо ввімкнено, він також включатиме бронювання, які ще не схвалені (якщо функцію схвалення бронювань увімкнено). Якщо цю опцію вимкнено, це чудовий спосіб приховати бронювання з календаря, які, можливо, очікують підтвердження статус незатвердженого/запиту. Якщо для бронювання не потрібно затвердження (функція затвердження бронювання вимкнена), усі бронювання будуть експортовані. ');

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'Віддалені канали iCal');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_URL', 'Віддалена URL -адреса');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'UID кімнати');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Назва/номер кімнати');
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Виберіть кімнату, на яку вплине цей канал, і URL-адресу віддаленого сайту. Під час імпортування файлу iCal датою завершення події має бути дата від'їзду гостя. Підсумком має бути ім'я гостя. Подія опис може містити всі інші деталі." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Віддалений канал Ical створено' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Віддалений канал Ical видалено' );