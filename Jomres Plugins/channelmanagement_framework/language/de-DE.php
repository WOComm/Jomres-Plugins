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


jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET',"Kanal-ID nicht gesetzt");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET',"Manager-ID nicht gesetzt");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TITLE',"Channel Manager Framework");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE',"Kanäle");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS',"Installierte Kanäle");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL',"Wählen Sie einen Kanal");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE',"Wörterbuchtyp wählen");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED',"Fehler, keine Kanäle installiert");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE',"Channel Manager Sanity Checks");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC',"Wählen Sie einen Kanal aus. Danach überprüfen wir Ihre Konfiguration und heben mögliche Probleme hervor, die Sie möglicherweise beheben müssen.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE',"Ressourcenzuordnung");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC',"Verschiedene Kanäle haben sogenannte Wörterbücher. Dies sind Begriffe zur Beschreibung von Ressourcen wie Raumtypen, Raumfunktionen, Eigenschaften usw. Bevor Sie den Kanal verwenden können, müssen Sie verschiedene Jomres-Ressourcen den einzelnen Kanälen zuordnen Ressourcen, damit die aus den Kanälen importierten und in sie exportierten Eigenschaften die richtigen Ressourcen haben. Auf dieser Seite wählen Sie zuerst einen Kanal aus. Wenn Sie fertig sind, gelangen Sie zu einer neuen Seite, auf der Sie die Ressourcentypen auswählen können, die Sie zuordnen möchten zu den Ressourcen des Kanals (z. B. Eigenschaften). Sobald der Ressourcentyp ausgewählt wurde, können Sie die Ressourcen des Jomres und des Kanals miteinander auswählen.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE',"Hier müssen Sie die Ressource (Wörterbuch) auswählen");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS',"Es gibt keine lokalen Elemente für dieses Wörterbuchelement, daher gibt es keine Zuordnungen.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST',"Fehler, Kanal hat keine Wörterbuchklasse.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS',"Auf dieser Seite müssen Sie die Wörterbucheinträge des Kanalmanagers denen in Jomres zuordnen.");

jr_define('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS',"Channel-Manager-Konten");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC',"Bitte speichern Sie die Autorisierungsinformationen für alle Channel-Manager, bei denen Sie möglicherweise Konten haben.");
jr_define('FINISH', 'Bearbeitung beenden');
jr_define('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED',"Fehler, das Plugin für optionale Extras ist nicht installiert.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED',"Kanalname nicht angegeben");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED',"Neues Eigenschaftsobjekt nicht bereitgestellt");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES',"diesesJRUser-Objekt nicht angegeben");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING',"Starte den Import der Eigenschaft ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED',"Eigenschaft erfolgreich importiert ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED',"Eigenschaft konnte nicht importiert werden ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT',"Alle Eigenschaften importieren");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE',"Eigenschaft importieren");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT',"Eigenschaften, die auf dem Remote-Server nicht als veröffentlicht/aktiviert markiert sind, oder Eigenschaften, die keine Änderungsprotokolleinträge haben, können nicht importiert werden.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING',"Start des Imports des Tarifs ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED',"Erfolgreich importierter Tarif ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED',"Der Tarif konnte nicht importiert werden ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION',"Eigenschaftseinstellungen konnten nicht validiert werden, es wurde versucht, eine unbekannte Eigenschaftseinstellung zu importieren ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE',"Importierte Eigenschaften");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME',"Eigenschaftsname");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME',"Kanalname");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID',"Lokale Eigenschafts-UID");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID',"Remote-Eigenschaften-UID");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY',"Remote bearbeiten");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY',"Lokal anzeigen");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY',"Lokale löschen");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD',"Dashboard");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS',"Kanalkonten");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED',"Es sind keine Thin Channel-Plugins installiert, Sie können diese Funktion noch nicht verwenden.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO',"Nicht zugewiesene Eigenschaften, die Sie verwalten, können einem Kanal zugewiesen werden. Wenn Sie den Kanal ändern, gewähren Sie jedem Kanal mit gültigem API-Zugriff ");
