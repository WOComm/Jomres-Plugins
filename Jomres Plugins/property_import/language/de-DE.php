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
jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Eigenschaftsimport");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Mit dieser Funktion können Sie Eigenschaften über eine CSV-Datei importieren. Aufgrund der verschiedenen erforderlichen Prüfungen empfehlen wir Ihnen, die Anzahl der erstellten Eigenschaften auf Stapel von nicht mehr als 50 gleichzeitig zu beschränken. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Bitte wählen Sie die Datei aus, die Sie hochladen möchten.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Die CSV-Datei sollte 11 Spalten haben und die Felder sollten kein HTML enthalten. Alle Felder sind Pflichtfelder.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Eigenschaftsname");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Die Anzahl der Zimmer (wenn es sich um eine Villa/ein Landhaus handelt, sollte dies unabhängig von der Anzahl der Zimmer in der tatsächlichen Unterkunft 1 sein. Nur Hotels/B&Bs usw. sollten mehr als ein Zimmer haben). Integer .");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Integer");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Preis pro Nacht ohne Währungscodes.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"E-Mail-Adresse");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Straße");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Stadt");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Region. Dies muss mit den IDs der Regionen übereinstimmen, die in der Regions-Tabelle gespeichert sind");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Integer");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Land der Immobilie. Kurzcode, zB GB oder DE, nicht der vollständige Ländername");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Postleitzahl");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Telefonnummer");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"Die vollständige Beschreibung der Eigenschaft. Maximal 500 Zeichen");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Text");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Fehler, Eigenschaftstyp wurde nicht festgelegt.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Fehler, wir haben keine Zimmertypen für diesen Unterkunftstyp. Sie können dies korrigieren, indem Sie im Administratorbereich Site Structure besuchen.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Ups, hast du vergessen eine Datei hochzuladen? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Zu viele Spalten gefunden, entweder die Datei ist fehlerhaft oder die CSV-Daten sind nicht richtig aufgebaut.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Der Eigenschaftsname wurde nicht festgelegt.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Die Anzahl der Räume wurde nicht festgelegt.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Preis pro Nacht wurde nicht festgelegt.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"E-Mail-Adresse konnte nicht validiert werden.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Straße wurde nicht festgelegt.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Stadt wurde nicht festgelegt.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Region wurde nicht festgelegt.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Land wurde nicht festgelegt.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Postleitzahl wurde nicht gesetzt.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Telefon wurde nicht eingestellt.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Beschreibung wurde nicht festgelegt.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Die Eigenschaft wurde erfolgreich importiert!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Da Sie eine oder mehrere Eigenschaften haben, deren Import fehlgeschlagen ist, haben wir nur diese Eigenschaften in das Feld unten exportiert. Sie können diese Eigenschaften in Excel/Open Office Calc/CSV-Dateihandler Ihrer Wahl kopieren und beheben die Probleme, ohne alle Eigenschaften erneut importieren zu müssen.");