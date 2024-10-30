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

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE', "Простое бронирование");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC', "Черные бронирования - это бронирования, которые занимают комнату, комнаты или собственность, но не имеют данных для выставления счетов или счетов. Обычно они используются для обозначения бронирований, которые были сделаны через другой носитель (например, по телефону). Вы бы создали черные заказы, чтобы гарантировать, что эти ресурсы не могут быть забронированы онлайн, ни менеджером объекта, ни гостем. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM', "Вы должны выбрать хотя бы одну комнату.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED', "Успешно забронировано.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED', "Не удалось зарезервировать, так как он уже зарезервирован в течение этого периода.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY', "Комната заблокирована пользователем");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP', "Используйте этот календарь для удобного использования ресурсов черной книги. Выберите комнату или комнаты, затем щелкните первую и последнюю даты черного бронирования, и ресурсы будут занесены в черный список. Если черное бронирование предназначено только для одного дату, затем дважды щелкните эту дату. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP', "Используйте этот календарь для удобного использования ресурсов черной книги. Щелкните первую и последнюю даты черного бронирования, и ресурсы будут занесены в черный список. Если черное бронирование предназначено только для одной даты, нажмите эту дату дважды . ");

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL', "Добавить все");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL', "Удалить все");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "элементы выбраны");