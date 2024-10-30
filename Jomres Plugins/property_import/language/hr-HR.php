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

jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Uvoz svojstva");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Ova značajka vam omogućuje uvoz svojstava putem CSV datoteke. Zbog različitih potrebnih provjera, preporučujemo da ograničite broj kreiranih svojstava na grupe od najviše 50 odjednom.");
jr_define ('_JOMRES_PROPERTY_IMPORT_SELECT', "Molimo odaberite datoteku koju želite prenijeti.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"CSV datoteka treba imati 11 stupaca, a polja ne smiju sadržavati html. Sva polja su obavezna.");

jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME', "Naziv nekretnine");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Broj soba (ako je ovo vila/kućica, onda bez obzira na broj soba u stvarnom objektu, to bi trebalo biti 1. Samo hoteli/pansioni itd. trebaju imati više od jedne sobe). Cijeli broj . ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Cijeli broj");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Cijena po noćenju bez kodova valuta.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"Adresa e-pošte");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Ulica");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Grad");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Tekst");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION', "Regija. To mora odgovarati id -ovima regija pohranjenim u tablici Regions");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Cijeli broj");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY', "Zemlja nekretnine. Kratki kôd, npr. GB ili DE, nije puni naziv zemlje");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Tekst");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE', "Poštanski broj");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Telefonski broj");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"Puni opis svojstva. Maksimalno 500 znakova");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Tekst");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Pogreška, vrsta svojstva nije postavljena.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Pogreška, nemamo tipove soba za tu vrstu svojstva. To možete ispraviti posjetom Struktura web-mjesta u području administratora.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Ups, jeste li zaboravili prenijeti datoteku? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Pronađeno je previše stupaca, ili je datoteka pogrešno oblikovana ili csv podaci nisu ispravno konstruirani.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Naziv svojstva nije postavljen.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT', "Broj soba nije postavljen.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET', "Cijena po noći nije postavljena.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Nije moguće potvrditi adresu e-pošte.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Ulica nije postavljena.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Grad nije postavljen.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Regija nije postavljena.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Država nije postavljena.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Poštanski broj nije postavljen.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Telefon nije postavljen.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Opis nije postavljen.");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS', "Svojstvo je uspješno uvezeno!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Budući da imate jedno ili više svojstava koja nisu uspjela uvesti, izvezli smo samo ta svojstva u polje ispod. Ova svojstva možete kopirati u excell/open office calc/po vašem izboru rukovatelja CSV datoteke i popraviti probleme bez ponovnog uvoza svih svojstava. ");