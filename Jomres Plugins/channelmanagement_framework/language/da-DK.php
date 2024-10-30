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

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "Kanal -id ikke angivet");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "Manager -ID ikke angivet");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Channel Manager Framework");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Kanaler");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Installerede kanaler");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Vælg en kanal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Vælg ordbogstype");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Fejl, ingen kanaler installeret");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Channel Manager Sanity checks");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Vælg en kanal. Når du har gjort det, kontrollerer vi din konfiguration og fremhæver eventuelle problemer, som du muligvis skal løse.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Ressourcekortlægning");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Forskellige kanaler har såkaldte ordbøger. Disse er udtryk for at beskrive ressourcer som f.eks. rumtyper, rumfunktioner, egenskabsfunktioner osv. Inden du kan bruge kanalen, skal du kortlægge forskellige Jomres -ressourcer med individuelle kanals ressourcer, så ejendomme importeret fra og eksporteret til kanalerne har de korrekte ressourcer. På denne side vælger du først en kanal. Når du er færdig, vil du blive taget til en ny side, hvor du vil kunne vælge de ressourcetyper, du vil kortlægge til kanalens ressourcer (f.eks. egenskabsfunktioner). Når ressourcetypen er valgt, vil du kunne vælge Jomres og kanalens ressourcer med hinanden. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Her skal du vælge ressourcen (ordbog)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Der er ingen lokale elementer for dette ordbogselement, så der er ikke noget at kortlægge imod.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Fejl, kanalen har ikke en ordbogsklasse.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "På denne side skal du kortlægge kanalmanagers ordbogsartikler med dem i Jomres.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "Channel Manager Accounts");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Gem venligst autorisationsoplysninger for alle kanaladministratorer, du måtte have konti med.");
jr_define ('FINISH', 'Finish editing');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Fejl, det valgfrie ekstramodul er ikke installeret.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "Kanalnavn leveres ikke");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Nyt ejendomsobjekt leveres ikke");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "detteJRUser -objekt leveres ikke");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Start import af ejendom");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Ejendom importeret");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "Det lykkedes ikke at importere ejendom");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Importer alle ejendomme");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Importer ejendom");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "Egenskaber, der ikke er markeret som publiceret/aktiveret på fjernserveren, eller ejendomme, der ikke har nogen ændringslogelementer, kan ikke importeres.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Start import af told");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Takst importeret");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "Kunne ikke importere taksten");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "En ejendomsindstilling kunne ikke valideres, en ejendomsindstilling blev forsøgt importeret");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "Importerede ejendomme");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "Ejendomsnavn");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "Kanalnavn");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "Lokal ejendom uid");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "Remote property uid");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Rediger fjernbetjening");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Se lokalt");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "Slet lokal");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Dashboard");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Kanalkonti");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "Der er ikke installeret tynde kanal -plugins, du kan ikke bruge denne funktion endnu.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "Ikke -tildelte egenskaber, som du administrerer, kan tildeles en kanal. Hvis du ændrer kanalen, giver du en kanal med gyldig API -adgang");
