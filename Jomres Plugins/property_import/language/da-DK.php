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


jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Ejendomsimport");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Denne funktion giver dig mulighed for at importere egenskaber via CSV-fil. På grund af de forskellige kontroller, der kræves, anbefaler vi, at du begrænser antallet af oprettede egenskaber til batches på ikke mere end 50 ad gangen. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Vælg venligst den fil du vil uploade.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Csv-filen skal have 11 kolonner, og felterne bør ikke indeholde nogen html. Alle felter er påkrævet.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Ejendomsnavn");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE', "Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Antallet af værelser (hvis dette er en villa/hytte, så uanset antallet af værelser i den aktuelle ejendom, så skal dette være 1. Kun hoteller/B&B'er osv. skal have mere end ét værelse). Heltal . ");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE', "Heltal");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Pris pr. nat uden valutakoder.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"E-mailadresse");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Gade");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Tekst");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN', "By");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Region. Dette skal svare til id'erne for de regioner, der er gemt i regionens tabellen");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Heltal");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY', "Ejendomsland. Kort kode, f.eks. GB eller DE, ikke hele landets navn");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Postnummer");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Telefonnummer");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"Den fulde beskrivelse af ejendommen. Maksimalt 500 tegn");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Tekst");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Fejl, egenskabstype blev ikke indstillet.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Fejl, vi har ikke nogen værelsestyper for denne ejendomstype. Du kan rette dette ved at besøge webstedsstruktur i administratorområdet.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Ups, har du glemt at uploade en fil? ");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS', "Der er fundet for mange kolonner, enten er filen misdannet, eller også er csv -dataene ikke korrekt konstrueret.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET', "Ejendommens navn blev ikke angivet.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Antallet af værelser blev ikke indstillet.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Pris pr. nat blev ikke fastsat.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Kunne ikke validere e-mailadressen.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Gade var ikke indstillet.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"By var ikke indstillet.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Regionen blev ikke indstillet.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Land blev ikke indstillet.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Postnummer blev ikke indstillet.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Telefonen var ikke indstillet.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Beskrivelse blev ikke indstillet.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Ejendommen blev importeret med succes!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Da du har en eller flere egenskaber, som ikke kunne importeres, har vi kun eksporteret disse egenskaber til feltet nedenfor. Du kan kopiere disse egenskaber til excell/open office calc/dit valg af CSV-filbehandler og rette problemerne uden at skulle genimportere alle egenskaberne igen.");