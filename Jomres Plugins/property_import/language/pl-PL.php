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
jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Import właściwości");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Ta funkcja umożliwia importowanie właściwości za pomocą pliku CSV. Ze względu na różne wymagane kontrole zalecamy ograniczenie liczby tworzonych właściwości do partii nie więcej niż 50 na raz.");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Wybierz plik, który chcesz przesłać.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Plik csv powinien mieć 11 kolumn, a pola nie powinny zawierać kodu HTML. Wszystkie pola są wymagane.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Nazwa usługi");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Liczba pokoi (jeśli jest to willa/domek, to niezależnie od liczby pokoi w rzeczywistej nieruchomości, powinno to być 1. Tylko hotele/B&B itp. powinny mieć więcej niż jeden pokój). Liczba całkowita .");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Liczba całkowita");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Cena za noc bez kodów walut.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Liczba zmiennoprzecinkowa");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"Adres e-mail");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Ulica");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Miasto");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Region. Musi odpowiadać identyfikatorom regionów przechowywanym w tabeli Regiony");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Liczba całkowita");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Kraj usługi. Krótki kod, np. GB lub DE, a nie pełna nazwa kraju");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Kod pocztowy");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Numer telefonu");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Tekst");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"Pełny opis właściwości. Maksymalnie 500 znaków");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Tekst");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Błąd, nie ustawiono typu właściwości.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Błąd, nie mamy żadnych typów pokojów dla tego typu właściwości. Możesz to poprawić, przechodząc do Struktury witryny w obszarze administratora.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Ups, zapomniałeś przesłać plik? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Znaleziono zbyt wiele kolumn, albo plik jest zniekształcony, albo dane csv nie są poprawnie skonstruowane.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Nazwa właściwości nie została ustawiona.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Liczba pokoi nie została ustawiona.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Cena za noc nie została ustawiona.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Nie można zweryfikować adresu e-mail.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Ulica nie została ustawiona.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Miasto nie zostało ustawione.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Region nie został ustawiony.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Nie ustawiono kraju.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Kod pocztowy nie został ustawiony.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Telefon nie został ustawiony.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Opis nie został ustawiony.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Właściwość została pomyślnie zaimportowana!");
