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

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE',"Jomres 2 Jomres-Integration");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE',"Client-ID der übergeordneten Site");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC',"Die Client-ID der übergeordneten Site. Auf der übergeordneten Site benötigen Sie eine eindeutige Client-ID und ein Geheimnis mit allen installierten API-Feature-Plugins, dem installierten Channel Management Framework-Plugin und beim Erstellen/Bearbeiten der Client-ID/ geheimes Schlüsselpaar benötigen Sie, um ihm Zugriff auf alle verfügbaren Bereiche zu gewähren.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE',"Geheimnis des übergeordneten Site-Clients");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC',"Der Client-Geheimnis der übergeordneten Site");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE',"Eltern-URL");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC',"Die URL zur übergeordneten Jomres-Site. ");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET',"Fehler, die Client-ID Ihrer übergeordneten Site ist nicht festgelegt. Besuchen Sie die Registerkarte Site-Konfiguration > Channel-Manager-Konten, um Ihre Client-ID zu speichern.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET',"Fehler, Ihr Geheimnis der übergeordneten Site ist nicht festgelegt. Besuchen Sie die Registerkarte Site-Konfiguration > Channel-Manager-Konten, um Ihr Geheimnis zu speichern.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET',"Fehler, die geheime URL Ihrer übergeordneten Site ist nicht festgelegt. Besuchen Sie die Registerkarte Site-Konfiguration > Channel-Manager-Konten, um die URL Ihrer übergeordneten Site zu speichern.");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"Fehler, Ihre Client-ID ist nicht festgelegt. Besuchen Sie die Registerkarte Site-Konfiguration > Channel-Manager-Konten, um Ihren Benutzernamen zu speichern.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"Fehler, Ihre Client-ID ist nicht festgelegt. Besuchen Sie die Registerkarte Site-Konfiguration > Channel-Manager-Konten, um Ihr Passwort zu speichern.");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE',"Kanaleinrichtung");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE',"Jomres 2 Jomres: Neue Eigenschaften importieren.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT',"IMPORT");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT',"EXPORT");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET',"Eigenschafts-ID nicht festgelegt");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDICTIONARYITEMS_NOTSET',"Zugeordnete Wörterbuchelemente nicht festgelegt");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND',"Lokaler Property-Typ nicht gefunden. Wenn der Property-Typ erstellt wurde, stellen Sie bitte sicher, dass Sie den Property-Typ des Remote-Dienstes dem lokalen Property-Typ zugeordnet haben.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND',"Remote-Eigenschaftstyp wird nicht vom Kanal zurückgegeben.");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND',"Lokaler Eigenschaftstyp nicht übergeben.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND',"Konnte Buchungsmodell nicht ermitteln (mrp oder srp).");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE',"Konnte Buchungsmodell (mrp oder srp) nicht ermitteln, nachdem die Objekttyp-ID gefunden wurde.");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND',"Ländercode konnte nicht ermittelt werden");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND',"Konnte Regions-ID nicht ermitteln");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED',"Konnte Einstellungsarray nicht richtig validieren");

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES',"Eigenschaftstypen nicht vom Administrator zugeordnet");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES',"Eigenschaftsfunktionen nicht vom Administrator zugeordnet");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES',"Raumtypen nicht vom Administrator zugeordnet");