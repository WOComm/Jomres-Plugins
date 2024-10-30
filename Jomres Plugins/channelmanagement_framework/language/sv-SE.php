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


jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "Channel ID not set");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "Manager ID not set");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Channel Manager Framework");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Kanaler");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Installerade kanaler");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Välj en kanal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Välj ordlistatyp");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Fel, inga kanaler installerade");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Channel Manager Sanity checks");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Välj en kanal. När du har gjort det kommer vi att kontrollera din konfiguration och markera eventuella problem som du kan behöva ta itu med.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Resursmappning");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Olika kanaler har så kallade ordböcker. Dessa är termer för att beskriva resurser som rumstyper, rumsfunktioner, fastighetsfunktioner etc. Innan du kan använda kanalen behöver du kartlägga olika Jomres -resurser med enskilda kanals resurser så att egenskaper som importeras från och exporteras till kanalerna har rätt resurser. På den här sidan väljer du först en kanal. När du är klar kommer du till en ny sida där du kan välja de resurstyper du vill kartlägga till kanalens resurser (till exempel fastighetsfunktioner). När resurstypen har valts kan du välja Jomres och kanalens resurser med varandra. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Här måste du välja resurs (ordlista)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Det finns inga lokala objekt för denna ordlista, så det finns inget att kartlägga mot.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Fel, kanalen har ingen ordlista.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "På den här sidan måste du kartlägga kanalhanterarens ordlista med de i Jomres.");

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "Channel Manager Accounts");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Spara behörighetsinformation för alla kanalhanterare du kan ha konton med.");
jr_define ('FINISH', 'Finish editing');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Fel, tillvalet tilläggsprogram är inte installerat.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "Kanalnamn tillhandahålls inte");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Nytt fastighetsobjekt tillhandahålls inte");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "thisJRUser -objektet levereras inte");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Startar import av egendom");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Godkänd importerad egendom");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "Det gick inte att importera egendom");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Importera alla egenskaper");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Importera egendom");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "Egenskaper som inte är markerade som publicerade/aktiverade på fjärrservern eller egenskaper som inte har några ändringsloggposter kan inte importeras.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Startar import av tariff");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Importerad taxa");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "Det gick inte att importera tariffen");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "Det gick inte att validera egendomsinställningar, en okänd egendomsinställning försökte importeras");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "Importerade egenskaper");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "Egenskapsnamn");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "Kanalnamn");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "Lokal egendom uid");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "Remote property uid");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Redigera fjärrkontroll");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Visa lokal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "Radera lokalt");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Dashboard");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Kanalkonton");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "Det finns inga tunna kanalplugins installerade, du kan inte använda den här funktionen ännu.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "Ej tilldelade egenskaper som du hanterar kan tilldelas en kanal. Om du ändrar kanal ger du en kanal med giltig API -åtkomst");