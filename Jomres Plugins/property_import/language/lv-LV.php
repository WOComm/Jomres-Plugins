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

jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Īpašuma importēšana");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Šī funkcija ļauj importēt rekvizītus, izmantojot CSV failu. Tā kā ir nepieciešamas dažādas pārbaudes, mēs iesakām ierobežot izveidoto rekvizītu skaitu, lai vienlaikus ne vairāk kā 50. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Lūdzu, izvēlieties failu, kuru vēlaties augšupielādēt.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"CSv failā jābūt 11 kolonnām, un laukos nedrīkst būt html. Visi lauki ir obligāti.");

jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME', "Īpašuma nosaukums");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Teksts");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Istabu skaits (ja šī ir villa/kotedža, tad neatkarīgi no istabu skaita faktiskajā īpašumā tam jābūt 1. Tikai viesnīcām/b&B utt. ir jābūt vairākām istabām). Vesels skaitlis .");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Vesels skaitlis");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Cena par nakti bez valūtu kodiem.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Peldēt");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"E-pasta adrese");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Teksts");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET', "Iela");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Teksts");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Pilsēta");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Teksts");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Reģions. Tam jāatbilst reģionu id, kas saglabāti tabulā Reģioni");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Vesels skaitlis");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Īpašuma valsts. Īss kods, piemēram, GB vai DE, nevis pilns valsts nosaukums");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Teksts");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Pasta indekss");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Teksts");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE', "Tālruņa numurs");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE', "Teksts");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"Pilns īpašuma apraksts. Maksimums 500 rakstzīmes");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Teksts");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Kļūda, rekvizīta veids nav iestatīts.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Kļūda, šim īpašuma veidam mums nav neviena telpu veida. Jūs varat to labot, apmeklējot vietnes struktūras administratora apgabalā.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Hmm, vai aizmirsāt augšupielādēt failu? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Atrasts pārāk daudz kolonnu, vai nu fails ir nepareizi veidots vai csv dati nav pareizi konstruēti.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Īpašuma nosaukums netika iestatīts.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT', "Telpu skaits nebija iestatīts.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Cena par nakti netika iestatīta.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Nevarēja apstiprināt e-pasta adresi.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Iela netika iestatīta.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Pilsēta nav iestatīta.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Reģions nav iestatīts.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Valsts nav iestatīta.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Pasta indekss netika iestatīts.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Tālrunis netika iestatīts.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Apraksts netika iestatīts.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Īpašums veiksmīgi importēts!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Tā kā jums ir viens vai vairāki rekvizīti, kuru importēšana neizdevās, mēs esam eksportējuši tikai šos rekvizītus tālāk esošajā laukā. Varat kopēt šos rekvizītus programmā Excel/Open Office calc/izvēlētajā CSV failu apdarinātājā un labot problēmas, atkārtoti neimportējot visus īpašumus.");