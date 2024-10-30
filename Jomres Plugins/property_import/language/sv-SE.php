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


jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Egendomsimport");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Denna funktion låter dig importera egenskaper via CSV-fil. På grund av de olika kontrollerna som krävs rekommenderar vi att du begränsar antalet egenskaper som skapas till satser om högst 50 åt gången. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Välj den fil du vill ladda upp.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Csv-filen bör ha 11 kolumner, och fälten bör inte innehålla någon html. Alla fält är obligatoriska.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Egendomsnamn");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Text");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS', "Antal rum (om detta är en villa/stuga, oavsett antal rum i den faktiska fastigheten, bör detta vara 1. Endast hotell/B&B osv. bör ha mer än ett rum). .");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Heltal");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Pris per natt utan valutakoder.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Flytande");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"E-postadress");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Street");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Stad");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Text");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION', "Region. Detta måste överensstämma med id: n för regionerna som är lagrade i tabellen Regioner");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Heltal");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Egendomens land. Kortkod, t.ex. GB eller DE, inte hela landets namn");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE', "Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Postnummer");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE', "Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Telefonnummer");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"Fullständig beskrivning av egenskapen. Max 500 tecken");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Text");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Fel, egenskapstyp var inte inställd.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Fel, vi har inga rumstyper för den egenskapstypen. Du kan korrigera detta genom att besöka webbplatsens struktur i administratörsområdet.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Hoppsan, har du glömt att ladda upp en fil? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Fantade för många kolumner, antingen är filen felaktig eller så är csv-data inte korrekt konstruerad.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Egenskapens namn var inte angivet.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT', "Antalet rum har inte ställts in.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Pris per natt sattes inte.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Kunde inte validera e-postadressen.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET', "Gatan var inte inställd.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN', "Town was not set.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Regionen var inte inställd.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Land angavs inte.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Postnummer var inte angivet.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Telefonen var inte inställd.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Beskrivning var inte inställd.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Egenskapen importerades framgångsrikt!");

jr_define ('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES', "Eftersom du har en eller flera fastigheter som misslyckades med import har vi exporterat bara dessa egenskaper till fältet nedan. Du kan kopiera dessa egenskaper till excell/open office calc/ditt val av CSV -filhanterare och fixa problemen utan att behöva återimportera alla fastigheter igen.");