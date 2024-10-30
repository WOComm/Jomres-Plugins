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

jr_define ('_JINTOUR_TITLE', "Тур / Управление деятельностью");

jr_define ('_JINTOUR_PROFILES_TITLE', "Профили тура / активности");
jr_define ('_JINTOUR_PROFILES_NEW', "Новый профиль тура / активности");
jr_define ('_JINTOUR_PROFILES_DELETE', "Удалить профиль тура / активности");

jr_define ('_JINTOUR_PROFILE_TITLE', "Заголовок профиля");
jr_define ('_JINTOUR_PROFILE_DESCRIPTION', "Описание");
jr_define ('_JINTOUR_PROFILE_DESCRIPTION_INFO', "Введите описание вашего тура / мероприятия, включая его маршрут.");
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK', "Дни недели");
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO', "");
jr_define ('_JINTOUR_PROFILE_PRICE_ADULTS', "Цена для взрослых");
jr_define ('_JINTOUR_PROFILE_PRICE_KIDS', "Детская цена");
jr_define ('_JINTOUR_PROFILE_PRICE_KIDS_INFO', "Чтобы исключить вариант из отображения в форме бронирования, оставьте цену равной 0 (нулю)");
jr_define ('_JINTOUR_PROFILE_SPACES_ADULTS', "Пространства для взрослых");
jr_define ('_JINTOUR_PROFILE_SPACES_KIDS', "Дочерние пространства");
jr_define ('_JINTOUR_PROFILE_SPACES_INFO', "Количество пробелов, доступных в туре / мероприятии");
jr_define ('_JINTOUR_PROFILE_START_DATE', "Начало сезона");
jr_define ('_JINTOUR_PROFILE_END_DATE', "Сезон заканчивается");

jr_define ('_JINTOUR_PROFILE_GENERATE_INFO', "После того, как вы создали профиль тура / мероприятия, вам нужно будет сгенерировать туры / мероприятия на основе настроек этого профиля. Создайте тур / мероприятие, затем щелкните значок зеленой стрелки рядом с этим профилем, чтобы создать сами туры / мероприятия. После создания туров / мероприятий вы сможете удалить отдельные туры / мероприятия, если хотите. ");
jr_define ('_JINTOUR_PROFILE_GENERATE', "Создание туров / мероприятий");

jr_define ('_JINTOUR_TOUR_TITLE', "Название действия");
jr_define ('_JINTOUR_TOUR_DATE', "Дата");
jr_define ('_JINTOUR_TOUR_ADULTS', "Взрослые");
jr_define ('_JINTOUR_TOUR_KIDS', "Дети");
jr_define ('_JINTOUR_TOUR_ITINERY', "Маршрут");

jr_define ('_JINTOUR_TOUR_SAVE_AUDIT', "Созданы новые туры");
jr_define ('_JINTOUR_TOUR_CANCEL_AUDIT', "Бронирование тура отменено");
jr_define ('_JINTOUR_TOUR_SAVE_MESSAGE', "Созданы новые туры");
jr_define ('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE', "В настоящее время доступные места");

jr_define ('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT', "Новое бронирование для тура / идентификатора ресурса");
jr_define ('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE', "Сделано новое бронирование для административного тура / ресурса. Просмотрите следующую ссылку, чтобы просмотреть страницу администратора этого тура");

jr_define ('_JINTOUR_TITLE_CONFIG', "Конфигурация интегрированных туров Jomres");
jr_define ('_JINTOUR_TITLE_WHOLESITE', "Является ли вся установка установкой Jintour?");
jr_define ('_JINTOUR_TITLE_WHOLESITE_DESC', "Если вы установите для этого значения Да, тогда все свойства будут свойствами тура. Если вы установите значение Нет, тогда при создании новых свойств вы сможете иметь свойства типа как Тур, так и Отель / Квартира. ");

jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS', "Туры");
jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC', "Выберите вариант туров, если вы предлагаете бронирование предметов, которые доступны в определенные дни (например, туры, билеты на концерт.)");
jr_define ('_JINTOUR_SHOWDEPARTURE', "Показать поле ввода отправления?");
jr_define ('_JINTOUR_SHOWDEPARTURE_DESC', "Установите значение Да, если вы хотите отображать дату прибытия и отъезда. Это будет полезно, если вы предлагаете автобусные поездки, авиабилеты и т. д., когда вам нужно знать как дату прибытия, так и дату отправления, отображение даты отъезда позволяет предлагать ресурсы на несколько дат, в то время как при установке значения Нет можно принимать бронирования только на одну дату. ");

jr_define ('_JINTOUR_PROFILES_TITLE_LIST', "Список туров");