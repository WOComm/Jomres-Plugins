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

jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET',"ID canale non impostato");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET',"ID gestore non impostato");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TITLE',"Channel Manager Framework");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE',"Canali");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS',"Canali Installati");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL',"Seleziona un canale");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE',"Scegli il tipo di dizionario");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED',"Errore, nessun canale installato");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE',"Controlli di integrità del Channel Manager");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC',"Seleziona un canale. Una volta fatto, controlleremo la tua configurazione ed evidenzieremo eventuali problemi che potresti dover affrontare.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE',"Mappatura risorse");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC',"Diversi canali hanno i cosiddetti Dizionari. Questi sono termini per descrivere risorse come tipi di stanza, caratteristiche della camera, caratteristiche della proprietà ecc. Prima di poter utilizzare il canale è necessario mappare diverse risorse Jomres con i singoli canali risorse in modo che le proprietà importate da ed esportate nei canali abbiano le risorse corrette. In questa pagina selezionerai prima un Canale. Una volta fatto sarai portato in una nuova pagina dove potrai selezionare i tipi di risorse che vuoi mappare alle risorse del Canale (ad esempio, le caratteristiche delle proprietà). Una volta selezionato il tipo di risorsa, sarà possibile scegliere tra Jomres e le risorse del Canale.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE',"Qui devi selezionare la risorsa (dizionario)");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS',"Non ci sono elementi locali per questo elemento del dizionario, quindi non c'è niente su cui mappare.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST',"Errore, il canale non ha una classe dizionario.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS',"In questa pagina dovrai mappare gli elementi del dizionario del channel manager con quelli in Jomres.");
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