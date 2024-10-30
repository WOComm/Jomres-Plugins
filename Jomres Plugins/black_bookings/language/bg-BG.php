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

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE', "Проста резервация");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC', "Черните резервации са резервации, които заемат стая, стаи или имот, но нямат данни за фактуриране или фактура. Обикновено те се използват за обозначаване на резервации, направени чрез друг носител (например телефон). Бихте създали черни резервации, за да сте сигурни, че тези ресурси не могат да бъдат резервирани онлайн, нито от управителя на имота, нито от гост. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM', "Трябва да изберете поне една стая.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED', "Успешно резервирано.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED', "Не може да се резервира, тъй като вече има резервация през този период.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY', "Стаята е блокирана от");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP', "Използвайте този календар, за да четете лесно ресурсите на книгите. Изберете стая или стаи, след това щракнете върху първата и последната дата на черната резервация и ресурсите ще бъдат резервирани на черно. Ако черната резервация е само за една дата, след което щракнете върху тази дата два пъти. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP', "Използвайте този календар, за да четете лесно ресурсите с черна книга. Кликнете върху първата и последната дата на черната резервация и ресурсите ще бъдат резервирани в черно. Ако черната резервация е само за една дата, щракнете върху тази дата два пъти . ");

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL', "Добавяне на всички");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL', "Премахване на всички");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "избрани елементи");
