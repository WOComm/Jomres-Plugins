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

jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Импортиране на собственост");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Тази функция ви позволява да импортирате свойства чрез CSV файл. Поради различните необходими проверки, препоръчваме ви да ограничите броя на създадените свойства до партиди от не повече от 50 наведнъж. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Моля, изберете файла, който искате да качите.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"CSV файлът трябва да има 11 колони и полетата не трябва да съдържат html. Всички полета са задължителни.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Име на свойство");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Текст");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Броят на стаите (ако това е вила/вила, то независимо от броя на стаите в действителния имот, тогава това трябва да бъде 1. Само хотели/пансиони със закуска и т.н. трябва да имат повече от една стая). Цяло число .");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Цяло число");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE', "Цена на нощувка без валутни кодове.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"Имейл адрес");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Текст");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET', "Улица");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Текст");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Град");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Текст");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Регион. Това трябва да съответства на идентификаторите на регионите, съхранени в таблицата с региони");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Цяло число");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Държава на собствеността. Кратък код, напр. GB или DE, а не пълното име на държавата");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE', "Текст");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Пощенски код");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Текст");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Телефонен номер");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Текст");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"Пълното описание на свойството. Максимум 500 знака");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Текст");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Грешка, типът на свойството не е зададен.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Грешка, нямаме типове стаи за този тип собственост. Можете да коригирате това, като посетите Структура на сайта в администраторската област.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Ами сега, забравихте ли да качите файл? ");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS', "Намерени са твърде много колони, или файлът е деформиран, или csv данните не са конструирани правилно.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Името на свойството не е зададено.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT', "Броят стаи не е зададен.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Цената на нощувка не е зададена.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Не можах да потвърдя имейл адреса.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET', "Улицата не е зададена.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Градът не е зададен.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Регионът не е зададен.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY', "Държавата не е зададена.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Пощенският код не беше зададен.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE', "Телефонът не е настроен.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Описанието не е зададено.");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS', "Свойството е импортирано успешно!");

jr_define ('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES', "Тъй като имате един или повече свойства, които не са успели да импортират, ние сме експортирали само тези свойства в полето по -долу. Можете да копирате тези свойства в excell/open office calc/по ваш избор на манипулатор на CSV файлове и да поправите проблемите, без да се налага повторно импортиране на всички свойства.");