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
jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Import av eiendom");
jr_define ('_JOMRES_PROPERTY_IMPORT_DESC', "Denne funksjonen lar deg importere eiendommer via CSV -fil. På grunn av de forskjellige kontrollene som kreves, anbefaler vi at du begrenser antall eiendommer som er opprettet til grupper på ikke mer enn 50 om gangen.");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Vennligst velg filen du vil laste opp.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Csv-filen skal ha 11 kolonner, og feltene skal ikke inneholde noen html. Alle felt er obligatoriske.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Eiendomsnavn");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Antall rom (hvis dette er en villa/hytte så uavhengig av antall rom i selve eiendommen så skal dette være 1. Bare hoteller/B&B etc skal ha mer enn ett rom). Heltall .");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE', "Heltall");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Pris per natt uten valutakoder.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Flytende");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"E-postadresse");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Gate");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE', "Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"By");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Region. Dette må samsvare med IDene til regionene som er lagret i Regionstabellen");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Heltall");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Eiendomsland. Kortkode, f.eks. GB eller DE, ikke hele landets navn");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Postnummer");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Telefonnummer");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE', "Tekst");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION', "Den fullstendige beskrivelsen av eiendommen. Maksimalt 500 tegn");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Tekst");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Feil, egenskapstype ble ikke angitt.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Feil, vi har ingen romtyper for den egenskapstypen. Du kan korrigere dette ved å gå til Site Structure i administratorområdet.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Beklager, glemte du å laste opp en fil? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"For mange kolonner funnet, enten er filen feil utformet eller csv-dataene er ikke riktig konstruert.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Egenskapsnavnet ble ikke angitt.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Antallet rom ble ikke angitt.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Pris per natt ble ikke angitt.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS', "Kunne ikke validere e -postadressen.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Gate ble ikke angitt.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN', "Town was not set.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Regionen ble ikke angitt.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY', "Landet ble ikke angitt.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Postnummer ble ikke angitt.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE', "Telefon var ikke angitt.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Beskrivelse ble ikke satt.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Eiendommen ble importert!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Ettersom du har en eller flere egenskaper som mislyktes ved import, har vi eksportert bare disse egenskapene til feltet nedenfor. Du kan kopiere disse egenskapene til excell/open office calc/ditt valg av CSV-filbehandler og fikse problemene uten å måtte importere alle eiendommene på nytt.");