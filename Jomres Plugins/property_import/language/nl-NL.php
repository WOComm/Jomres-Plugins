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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################




jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Eigenschappen importeren");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Met deze functie kunt u eigenschappen importeren via een CSV-bestand. Vanwege de verschillende vereiste controles raden we u aan het aantal aangemaakte eigenschappen te beperken tot batches van niet meer dan 50 tegelijk. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Kies het bestand dat u wilt uploaden.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Het csv-bestand moet 11 kolommen hebben en de velden mogen geen html bevatten. Alle velden zijn verplicht.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Eigenschapsnaam");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Het aantal kamers (als dit een villa/huisje is, dan zou dit, ongeacht het aantal kamers in het eigenlijke pand, 1 moeten zijn. Alleen hotels/B&B's enz. mogen meer dan één kamer hebben). Geheel getal .");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Integer");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Prijs per nacht zonder valutacodes.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"E-mailadres");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Straat");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Stad");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Regio. Dit moet overeenkomen met de id's van de regio's die zijn opgeslagen in de tabel Regio's");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Integer");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Land eigendom. Korte code, bijv. GB of DE, niet de volledige landnaam");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Postcode");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Telefoonnummer");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"De volledige beschrijving van de eigenschap. Maximaal 500 tekens");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Tekst");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Fout, eigenschapstype is niet ingesteld.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Fout, we hebben geen kamertypes voor dat type woning. U kunt dit corrigeren door naar Sitestructuur te gaan in het beheerdersgedeelte.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Oeps, ben je vergeten een bestand te uploaden? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Te veel kolommen gevonden, of het bestand is verkeerd ingedeeld of de csv-gegevens zijn niet goed geconstrueerd.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"De eigenschapsnaam is niet ingesteld.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Het aantal kamers is niet ingesteld.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Prijs per nacht was niet ingesteld.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Kon het e-mailadres niet valideren.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Straat was niet ingesteld.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Stad was niet ingesteld.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Regio is niet ingesteld.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Land was niet ingesteld.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Postcode is niet ingesteld.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Telefoon was niet ingesteld.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Beschrijving is niet ingesteld.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"De eigenschap is succesvol geïmporteerd!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Omdat u een of meer eigenschappen heeft die niet zijn geïmporteerd, hebben we alleen die eigenschappen naar het onderstaande veld geëxporteerd. U kunt deze eigenschappen kopiëren naar excell/open office calc/uw keuze van CSV-bestandshandler en repareren de problemen zonder alle eigenschappen opnieuw te hoeven importeren.");