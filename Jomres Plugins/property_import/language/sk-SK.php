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

jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Import majetku");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Táto funkcia vám umožňuje importovať vlastnosti prostredníctvom súboru CSV. Kvôli rôznym požadovaným kontrolám vám odporúčame obmedziť počet vytvorených vlastností na dávky nie viac ako 50 naraz. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Vyberte súbor, ktorý chcete nahrať.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Súbor csv by mal mať 11 stĺpcov a polia by nemali obsahovať žiadne html. Všetky polia sú povinné.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Názov vlastníctva");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Počet izieb (ak ide o vilu/chatu, potom bez ohľadu na počet izieb v skutočnom objekte by to malo byť 1. Iba hotely/penzióny atď. by mali mať viac ako jednu izbu). Celé číslo . ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Celé číslo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Cena za noc bez menových kódov.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"E-mailová adresa");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Text");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET', "Ulica");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Mesto");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Región. Toto musí zodpovedať ID regiónov uloženým v tabuľke Regióny");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Celé číslo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Krajina vlastníctva. Skrátený kód, napr. GB alebo DE, nie celý názov krajiny");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"PSČ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Telefónne číslo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Text");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION', "Úplný popis vlastnosti. Maximálne 500 znakov");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE', "Text");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Chyba, typ vlastnosti nebol nastavený.");
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE', "Chyba, pre tento typ vlastníctva nemáme žiadne typy miestností. Môžete to napraviť tak, že navštívite štruktúru stránok v oblasti správcu.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Ojoj, zabudli ste nahrať súbor? ");

jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS', "Našlo sa príliš veľa stĺpcov, buď súbor má nesprávny formát alebo údaje csv nie sú správne skonštruované.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Názov vlastnosti nebol nastavený.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Počet izieb nebol nastavený.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Cena za noc nebola nastavená.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Nepodarilo sa overiť e-mailovú adresu.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Ulica nebola nastavená.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Mesto nebolo nastavené.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Región nebol nastavený.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Krajina nebola nastavená.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"PSČ nebolo nastavené.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Telefón nebol nastavený.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Popis nebol nastavený.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Vlastnosť bola úspešne importovaná!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Keďže máte jednu alebo viacero vlastností, ktorých import zlyhal, exportovali sme len tieto vlastnosti do poľa nižšie. Tieto vlastnosti môžete skopírovať do excelu/open office calc/ podľa vlastného výberu obslužného programu súboru CSV a opraviť problémy bez toho, aby ste museli znova importovať všetky vlastnosti.");