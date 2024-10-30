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

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Интеграция на Jomres 2 Jomres");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "Клиентски идентификатор на родителски сайт");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "Идент. № на клиента на родителския сайт. На родителския сайт ще ви е необходим уникален клиентски идентификатор и тайна с всички инсталирани плъгини за api функция, инсталирана приставка Channel Management Framework и когато създавате/редактирате клиентския идентификатор/ двойка таен ключ, ще трябва да му дадете достъп до всички налични области. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Родителска тайна на клиентски сайт");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Тайната на клиента на родителския сайт");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "Родителски URL адрес");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "URL адресът на родителския сайт на Jomres.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Грешка, клиентският ви идентификатор на родителски сайт не е зададен. Посетете раздела Конфигурация на сайта> Акаунти на диспечера на канали, за да запазите идентификатора на клиента си.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Грешка, тайната на родителския ви сайт не е зададена. Посетете раздела Конфигурация на сайта> Раздели акаунти в диспечера на канали, за да запазите вашата тайна.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Грешка, секретният ви URL адрес на родителския сайт не е зададен. Посетете раздела Конфигурация на сайта> Акаунти на мениджъра на канали, за да запазите URL адреса на родителския си сайт.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Грешка, вашият клиентски идентификатор не е зададен. Посетете Конфигурация на сайта> Раздел Акаунти на мениджъра на канали, за да запазите потребителското си име.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Грешка, вашият клиентски идентификатор не е зададен. Посетете Конфигурация на сайта> раздел Профили на мениджъра на канали, за да запазите паролата си.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Настройка на канал");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: Импортиране на нови имоти.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "Идентификаторът на свойството не е зададен");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Съпоставени елементи от речника не са зададени");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Типът на локалната собственост не е намерен. Ако типът на собствеността е създаден, моля, уверете се, че сте определили типа на собствеността на отдалечената услуга с локалния тип собственост.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Тип на отдалечено свойство не се връща по канал.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Типът на местната собственост не е предаден.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Не може да се определи модел на резервация (mrp или srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Не може да се определи модел на резервация (mrp или srp) след намиране на идентификатор на типа имот.");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Кодът на държавата не можа да бъде определен");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Не може да се определи идентификатор на регион");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Не може да се провери правилно масивът с настройки");

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Типовете собствености не са картографирани от администратора");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Характеристиките на собствеността не са картографирани от администратора");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Типовете стаи не са картографирани от администратора");