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

jr_define( '_JOMRES_ICAL_EVENT', 'iCal събитие');
jr_define('_JOMRES_ICAL_FEED', 'iCal Feed');
jr_define( '_JOMRES_ICAL_FEED_LINK', 'URL на iCal емисия');
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Вашият канал/и на iCal може да показва предстоящи резервации в отдалечен календар, включително вашето мобилно устройство, Google Calendar, Apple Calendar, Thunderbird, Outlook и други. Използвайте следния URL/и, за да се абонирате за емисия/и в вашия софтуер за календар.');
jr_define ('_JOMRES_ICAL_ANON', 'Анонимизиран URL адрес на iCal емисия');
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Разрешаване на анонимен достъп до iCal емисия/и?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Ако тази опция е активирана, вашата емисия за събития в iCal ще бъде достъпна за всички, но без подробности за резервация или гости.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal Import' );
jr_define ('_JOMRES_ICAL_SELECT', 'Избор на файл за импортиране');
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Грешка, няма качен файл.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Когато импортирате iCal файл, крайната дата на събитието трябва да бъде датата на заминаване на госта. Резюмето трябва да бъде името на госта. Описанието на събитието може да съдържа всички други подробности." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Този номер на резервация вече съществува в системата.' );
jr_define ('_JOMRES_ICAL_ERROR_NO_ROOMS', 'Няма налични стаи на избраните дати.');
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'В ics файла не бяха открити събития.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Събитието е импортирано успешно' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Събитие не може да бъде импортирано' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Име на гост');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Описание на събитието');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Старт');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_END', 'Край');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Резултат' );
jr_define( '_JOMRES_ICAL_WITHHELD', 'Задържано');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Вашите iCal емисии могат да показват предстоящи резервации в отдалечен календар, включително вашето мобилно устройство, Google Calendar, Apple Calendar, Thunderbird, Outlook и други.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Тази функция ви позволява да синхронизирате резервации от сайтове като Airbnb, Homeway и други с Jomres. Ще трябва да въведете URL адреса на емисията на iCal за всеки сайт, с който искате да синхронизирате. Ако някой ще резервирайте своя имот в Airbnb например, тези дати ще бъдат показани като блокирани (черни резервации) и на този сайт на Jomres, така че никой не може да резервира тези дати тук. Това няма да синхронизира подробностите за резервациите между сайтовете (като данни за гости, цени, фактури и т.н.), но това е приятен и лесен начин да избегнете двойни резервации, като синхронизирате само наличността.');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'Настройки за синхронизиране на iCal');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'Настройки на iCal Feed');
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'Външен iCal URL');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Да се ​​включат и запитвания за резервация?' );
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Ако е активиран, той ще включва и резервации, които все още не са одобрени (ако е активирана функцията за одобрение на резервации). Запазването на тази опция е чудесен начин да скриете резервации от календара, които може би чакат потвърждение в статус на неодобрено/запитване. Ако резервациите не изискват одобрение (функцията за одобрение на резервации е деактивирана), всички резервации ще бъдат експортирани.' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal отдалечени емисии');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Отдалечен URL');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'UID на стая');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Име/номер на стая');
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Изберете стаята, която ще засегне тази емисия, и URL адреса на отдалечения сайт. Когато импортирате iCal файл, крайната дата на събитието трябва да бъде датата на заминаване на госта. Резюмето трябва да бъде името на госта. Събитието описанието може да съдържа всички други подробности." );

jr_define ('_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical отдалечена емисия е създадена');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical отдалечен канал е изтрит' );