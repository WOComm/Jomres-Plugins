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



jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Uvoz lastnosti");
jr_define ('_JOMRES_PROPERTY_IMPORT_DESC', "Ta funkcija vam omogoča uvoz lastnosti prek datoteke CSV. Zaradi različnih potrebnih preverjanj priporočamo, da omejite število ustvarjenih lastnosti na pakete največ 50 hkrati.");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Prosim, izberite datoteko, ki jo želite naložiti.");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS', "Datoteka csv mora imeti 11 stolpcev, polja pa ne smejo vsebovati html. Vsa polja so obvezna.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Ime lastnosti");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Besedilo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Število sob (če je to vila/koča, potem mora biti to ne glede na število sob v dejanski nepremičnini 1. Samo hoteli/penzioni in penzioni itd. bi morali imeti več kot eno sobo). Celo število . ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Celo število");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Cena na noč brez kod valut.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"E-poštni naslov");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Besedilo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Ulica");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Besedilo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Mesto");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE', "Besedilo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Regija. To mora ustrezati ID-jem regij, shranjenih v tabeli regij");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Celo število");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Država lastnine. Kratka koda, npr. GB ali DE, ne polno ime države");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Besedilo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Poštna številka");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Besedilo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Telefonska številka");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Besedilo");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION', "Celoten opis lastnosti. Največ 500 znakov");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Besedilo");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Napaka, vrsta lastnosti ni bila nastavljena.");
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE', "Napaka, za to vrsto lastnosti nimamo nobenih vrst sob. To lahko popravite tako, da obiščete Strukturo spletnega mesta v skrbniškem območju.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Ojoj, ali ste pozabili naložiti datoteko? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Najdenih je preveč stolpcev, bodisi je datoteka napačno oblikovana ali pa podatki csv niso pravilno sestavljeni.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Ime lastnosti ni bilo nastavljeno.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Število sob ni bilo nastavljeno.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET', "Cena na noč ni bila določena.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"E-poštnega naslova ni bilo mogoče preveriti.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET', "Ulica ni bila nastavljena.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN', "Mesto ni bilo nastavljeno.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Regija ni bila nastavljena.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY', "Država ni bila nastavljena.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Poštna številka ni bila nastavljena.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Telefon ni bil nastavljen.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION', "Opis ni bil nastavljen.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Lastnost je bila uspešno uvožena!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Ker imate eno ali več lastnosti, ki jim ni uspelo uvoziti, smo izvozili samo te lastnosti v spodnje polje. Te lastnosti lahko kopirate v excell/open office calc/po vaši izbiri upravljalnika datotek CSV in popravite težave, ne da bi bilo treba znova uvoziti vse lastnosti.");