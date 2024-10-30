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
jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Import nemovitosti");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Tato funkce umožňuje importovat vlastnosti prostřednictvím souboru CSV. Kvůli různým požadovaným kontrolám doporučujeme omezit počet vytvořených vlastností na dávky maximálně 50 najednou. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Vyberte prosím soubor, který chcete nahrát.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Soubor csv by měl mít 11 sloupců a pole by neměla obsahovat žádné html. Všechna pole jsou povinná.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Název vlastnosti");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Text");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS', "Počet pokojů (pokud se jedná o vilu/chatu, pak bez ohledu na počet pokojů ve skutečné nemovitosti by to mělo být 1. Pouze hotely/B & B atd. by měly mít více než jednu místnost). Integer .");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Celé číslo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Cena za noc bez kódů měn.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"E-mailová adresa");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Ulice");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Město");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Region. To musí odpovídat id regionů uložených v tabulce Regiony");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Celé číslo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Země vlastnictví. Krátký kód, např. GB nebo DE, nikoli celý název země");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"PSČ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Text");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE', "Telefonní číslo");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"Úplný popis vlastnosti. Maximálně 500 znaků");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Text");

jr_define ('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT', "Chyba, typ vlastnosti nebyl nastaven.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Chyba, pro tento typ nemovitosti nemáme žádné typy pokojů. Můžete to opravit na stránce Struktura webu v oblasti správce.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Jejda, nezapomněli jste nahrát soubor? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Bylo nalezeno příliš mnoho sloupců, soubor má buď nesprávný formát, nebo data csv nejsou správně sestavena.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Název vlastnosti nebyl nastaven.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT', "Počet pokojů nebyl nastaven.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET', "Cena za noc nebyla nastavena.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Nelze ověřit e-mailovou adresu.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Ulice nebyla nastavena.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Město nebylo nastaveno.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Region nebyl nastaven.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY', "Země nebyla nastavena.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"PSČ nebylo nastaveno.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Telefon nebyl nastaven.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Popis nebyl nastaven.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Vlastnost byla úspěšně importována!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Vzhledem k tomu, že máte jednu nebo více vlastností, u kterých se nepodařilo importovat, exportovali jsme pouze tyto vlastnosti do pole níže. Tyto vlastnosti můžete zkopírovat do excelu/open office calc/dle vašeho výběru obslužného programu souboru CSV a opravit problémy, aniž byste museli znovu importovat všechny vlastnosti.");