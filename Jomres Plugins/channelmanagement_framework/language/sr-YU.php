<?php
/**
 * Jomres CMS Agnostic Plugin
 * @author Woollyinwales IT <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2020 Vince Wooll
 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET',"Channel ID not set");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET',"Manager ID not set");

jr_define('CHANNELMANAGEMENT_FRAMEWORK_TITLE',"Channel Manager Framework");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE',"Channels");


jr_define('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS',"Installed Channels");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL',"Select a Channel");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE',"Choose dictionary type");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED',"Error, no channels installed");


jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE',"Channel Manager Sanity checks");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC',"Select a channel. Once you have done that we will check your configuration and highlight any possible issues that you may need to address.");

jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE',"Resource mapping");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC',"Different channels have what are known as Dictionaries. These are terms to describe resources such as room types, room features, property features etc. Before you can use the channel you need to map different Jomres resources with individual channel's resources so that properties imported from and exported to the channels have the correct resources. In this page you will select first a Channel. Once done you will be taken to a new page where you will be able to select the resource types you want to map to the Channel's resources (for example, property features). Once the resource type has been selected you will be able to choose the Jomres and Channel's resources with each other.");

jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE',"Here you need to select the resource (dictionary) ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS',"There are no local items for this dictionary item, so there is nothing to map against.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST',"Error, channel does not have a dictionary class.");

jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS',"On this page you will need to map the channel manager's dictionary items with those in Jomres.");

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