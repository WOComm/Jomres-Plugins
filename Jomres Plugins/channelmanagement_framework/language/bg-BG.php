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

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "Идентификаторът на канала не е зададен");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "ID на мениджъра не е зададен");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Framework на Channel Manager");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Канали");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Инсталирани канали");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Изберете канал");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Изберете тип речник");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Грешка, няма инсталирани канали");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Проверки за здрав разум на мениджъра на канали");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Изберете канал. След като направите това, ние ще проверим вашата конфигурация и ще подчертаем всички възможни проблеми, които може да се наложи да решите.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Картографиране на ресурси");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Различните канали имат това, което е известно като речници. Това са термини за описване на ресурси като типове стаи, характеристики на стаите, характеристики на имоти и т.н. Преди да можете да използвате канала, трябва да съпоставите различни ресурси на Jomres с отделните канали ресурси, така че имотите, внесени и изнесени в каналите, да имат правилните ресурси. На тази страница първо ще изберете канал. След като приключите, ще бъдете отведени на нова страница, където ще можете да изберете типовете ресурси, които искате да картографирате към ресурсите на канала (например свойства на собствеността). След като бъде избран типът ресурс, ще можете да избирате ресурсите на Jomres и канала помежду си. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Тук трябва да изберете ресурса (речник)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Няма локални елементи за този елемент от речника, така че няма нищо против.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Грешка, каналът няма клас речник.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "На тази страница ще трябва да картографирате елементите от речника на мениджъра на канала с тези в Jomres.");

jr_define('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS',"Channel Manager Accounts");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC',"Please save authorisation information for any channel managers you may have accounts with.");
jr_define('FINISH', 'Finish editing');
jr_define('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED',"Error, the Optional Extras plugin is not installed.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED',"Channel name not supplied");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED',"New property object not supplied");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES',"thisJRUser object not supplied");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING',"Starting import of property ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED',"Successfully imported property ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED',"Failed to import property ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT',"Import all properties");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE',"Import property");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT',"Properties that are not marked as published/activated on the remote server, or properties that don't have any changelog items, cannot be imported.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING',"Starting import of tariff ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED',"Successfully imported tariff ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED',"Failed to import tariff ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION',"Unable to validate property settings, an unrecognised property setting was attempted to be imported ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE',"Imported properties");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME',"Property name");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME',"Channel name");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID',"Local property uid");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID',"Remote property uid");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY',"Edit remote");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY',"View local");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY',"Delete local");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD',"Dashboard");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS',"Channel accounts");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED',"There are no thin channel plugins installed, you cannot use this feature yet.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO',"Unassigned properties that you manage can be assigned to a channel. If you change the channel you are giving any channel with valid API access ");
