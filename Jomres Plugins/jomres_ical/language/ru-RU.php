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

jr_define ('_JOMRES_ICAL_EVENT', 'Событие iCal');
jr_define ('_JOMRES_ICAL_FEED', 'iCal Feed');
jr_define ('_JOMRES_ICAL_FEED_LINK', 'URL-адрес канала iCal');
jr_define ('_JOMRES_ICAL_FEEDS', 'iCal Feed / s');
jr_define ('_JOMRES_ICAL_FEEDS_DESC', 'Ваш фид iCal может отображать предстоящие бронирования в удаленном календаре, включая ваше мобильное устройство, Google Calendar, Apple Calendar, Thunderbird, Outlook и др. Используйте следующие URL-адреса, чтобы подписаться на фиды в ваше программное обеспечение календаря. ');
jr_define ('_JOMRES_ICAL_ANON', 'Анонимный URL-адрес канала iCal');
jr_define ('_JOMRES_ICAL_ALLOW_ANON', 'Разрешить анонимный доступ к фидам iCal?');
jr_define ('_JOMRES_ICAL_ALLOW_ANON_DESC', 'Если эта опция включена, ваш канал событий iCal будет доступен всем, но без информации о бронировании или гостях.');
jr_define ('_JOMRES_ICAL_IMPORT', 'Импорт iCal');
jr_define ('_JOMRES_ICAL_SELECT', 'Выбрать файл для импорта');
jr_define ('_JOMRES_ICAL_NO_FILE_UPLOADED', 'Ошибка, файл не был загружен.');
jr_define ('_JOMRES_ICAL_IMPORT_INFO', "При импорте файла iCal датой окончания события должна быть дата отъезда гостя. В сводке должно быть имя гостя. Описание события может содержать все остальные детали.");

jr_define ('_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Этот номер бронирования уже существует в системе.');
jr_define ('_JOMRES_ICAL_ERROR_NO_ROOMS', 'На выбранные даты нет свободных номеров.');
jr_define ('_JOMRES_ICAL_ERROR_NO_EVENTS', 'В файле ics не найдено событий.');
jr_define ('_JOMRES_ICAL_SUCCESS', 'Событие успешно импортировано');
jr_define ('_JOMRES_ICAL_FAILURE', 'Событие не может быть импортировано');

jr_define ('_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Имя гостя');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Описание события');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_START', 'Начать');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_END', 'Конец');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Результат');
jr_define ('_JOMRES_ICAL_WITHHELD', 'Удержано');
jr_define ('_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Ваши каналы iCal могут отображать предстоящие бронирования в удаленном календаре, включая ваше мобильное устройство, Календарь Google, Календарь Apple, Thunderbird, Outlook и др.');
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Эта функция позволяет синхронизировать бронирования с таких сайтов, как Airbnb, Homeway и других, с Jomres. Вам нужно будет ввести URL-адрес канала iCal вашего объекта для каждого сайта, с которым вы хотите синхронизироваться. Если кто-то будет например, забронируйте свою недвижимость на Airbnb, эти даты будут отображаться как заблокированные (черные бронирования) и на этом сайте Jomres, поэтому никто не сможет забронировать эти даты здесь. Это не синхронизирует данные бронирования между сайтами (например, сведения о гостях, цены и т. д.) счета и т. д.), но это хороший и простой способ избежать двойных бронирований, синхронизируя только наличие. ');
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS', 'Настройки синхронизации iCal');
jr_define ('_JOMRES_ICAL_FEED_SETTINGS', 'Настройки канала iCal');
jr_define ('_JOMRES_ICAL_SYNC_URL1', 'Внешний URL-адрес iCal');
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Также включить запросы на бронирование?');
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Если этот параметр включен, он также будет включать бронирования, которые еще не утверждены (если включена функция утверждения бронирований). Отключение этого параметра - отличный способ скрыть в календаре бронирования, которые, возможно, ожидают подтверждения в статус неутверждено / запрос. Если бронирования не требуют утверждения (функция утверждения бронирований отключена), все бронирования будут экспортированы. ');

jr_define ('_JOMRES_ICAL_REMOTE_FEED', 'Удаленные каналы iCal');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_URL', 'Удаленный URL');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'UID комнаты');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Название / номер комнаты');
jr_define ('_JOMRES_ICAL_REMOTE_INFO', "Выберите комнату, на которую будет влиять этот канал, и URL-адрес удаленного сайта. При импорте файла iCal датой окончания мероприятия должна быть дата отъезда гостя. В сводке должно быть имя гостя. Событие. описание может содержать все остальные детали. ");

jr_define ('_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Удаленный канал Ical создан');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Удаленный канал Ical удален');