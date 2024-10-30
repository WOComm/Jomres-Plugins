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
jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Tulajdonimportálás");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Ez a szolgáltatás lehetővé teszi a tulajdonságok importálását CSV-fájlon keresztül. A szükséges különféle ellenőrzések miatt javasoljuk, hogy korlátozza a létrehozott tulajdonságok számát egyszerre legfeljebb 50 kötegben. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Kérjük, válassza ki a feltölteni kívánt fájlt.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"A csv fájlnak 11 oszlopból kell állnia, és a mezők nem tartalmazhatnak html-t. Minden mező kitöltése kötelező.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Tulajdon neve");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Szöveg");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"A szobák száma (ha ez egy villa/ház, akkor a tényleges ingatlanban lévő szobák számától függetlenül 1 legyen. Csak a szállodákban/B&B-kben stb. legyen egynél több szoba). Egész szám .");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Egész szám");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Éjszakai ár pénznemkódok nélkül.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Lebegő");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"E-mail cím");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Szöveg");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Utca");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Szöveg");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Város");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Szöveg");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Régió. Ennek meg kell egyeznie a Régiók táblában tárolt régiók azonosítóival");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Egész szám");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"A tulajdon országa. Rövid kód, pl. GB vagy DE, nem az ország teljes neve");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Szöveg");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Irányítószám");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Szöveg");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Telefonszám");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Szöveg");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"A tulajdonság teljes leírása. Maximum 500 karakter");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Szöveg");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Hiba, a tulajdonság típusa nincs beállítva.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Hiba, nincs szobatípusunk ehhez az ingatlantípushoz. Ezt az adminisztrációs területen a Site Structure oldalon javíthatja.");
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_FILE', "Hoppá, elfelejtettél feltölteni egy fájlt?");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Túl sok oszlop található, vagy a fájl hibás, vagy a csv-adatok nincsenek megfelelően összeállítva.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"A tulajdonságnév nincs beállítva.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"A szobák száma nincs beállítva.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Az éjszakánkénti ár nincs beállítva.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Nem sikerült ellenőrizni az e-mail címet.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Az utca nincs beállítva.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"A város nincs beállítva.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"A régió nincs beállítva.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY', "Az ország nincs beállítva.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Az irányítószám nincs beállítva.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"A telefon nincs beállítva.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"A leírás nincs beállítva.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"A tulajdonság sikeresen importálva!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Mivel van egy vagy több olyan tulajdonsága, amelyek importálása sikertelen volt, ezért csak ezeket a tulajdonságokat exportáltuk az alábbi mezőbe. Ezeket a tulajdonságokat átmásolhatja az excell/open office calc-ba/a választott CSV fájlkezelőbe, és javíthatja a problémákat anélkül, hogy újra importálnia kellene az összes tulajdonságot.");