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
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE',"Integracja Jomres 2 Jomres");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE',"Identyfikator klienta witryny nadrzędnej");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC',"Identyfikator klienta witryny nadrzędnej. W witrynie nadrzędnej będziesz potrzebować unikalnego identyfikatora klienta i klucza tajnego z zainstalowanymi wszystkimi wtyczkami funkcji API, zainstalowaną wtyczką Channel Management Framework oraz podczas tworzenia/edytowania identyfikatora klienta/ para kluczy tajnych, których będziesz potrzebować, aby uzyskać dostęp do wszystkich dostępnych zakresów.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE',"Sekret klienta strony nadrzędnej");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC',"Sekret klienta lokacji nadrzędnej");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE',"Nadrzędny adres URL");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC',"Adres URL do nadrzędnej witryny Jomres. ");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET',"Błąd, identyfikator klienta Twojej witryny nadrzędnej nie jest ustawiony. Przejdź na kartę Konfiguracja witryny > Konta Channel Managera, aby zapisać identyfikator klienta.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET',"Błąd, nie ustawiono klucza tajnego Twojej witryny nadrzędnej. Przejdź do zakładki Konfiguracja witryny > Konta Channel Managera, aby zapisać swój klucz.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET',"Błąd, tajny adres URL Twojej witryny nadrzędnej nie jest ustawiony. Przejdź na kartę Konfiguracja witryny > Konta Channel Managera, aby zapisać adres URL witryny nadrzędnej.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"Błąd, identyfikator klienta nie jest ustawiony. Przejdź do zakładki Konfiguracja witryny > Konta menedżera kanałów, aby zapisać swoją nazwę użytkownika.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"Błąd, identyfikator klienta nie jest ustawiony. Przejdź do zakładki Konfiguracja witryny > Konta menedżera kanałów, aby zapisać hasło.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE',"Konfiguracja kanału");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE',"Jomres 2 Jomres: Importuj nowe właściwości.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT',"IMPORT");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT',"EKSPORT");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET',"Identyfikator właściwości nie został ustawiony");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET',"Nie ustawiono mapowanych elementów słownika");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND',"Nie znaleziono lokalnego typu właściwości. Jeśli typ właściwości został utworzony, upewnij się, że zmapowano typ właściwości usługi zdalnej na lokalny typ właściwości.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND',"Typ właściwości zdalnej nie jest zwracany przez kanał.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND',"Nie przekazano lokalnego typu właściwości.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND',"Nie można określić modelu rezerwacji (mrp lub srp).");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE',"Nie można określić modelu rezerwacji (mrp lub srp) po znalezieniu identyfikatora typu nieruchomości.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND',"Nie można określić kodu kraju");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND',"Nie można określić identyfikatora regionu");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED',"Nie można poprawnie zweryfikować tablicy ustawień");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES',"Typy właściwości nie są mapowane przez administratora");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES',"Funkcje właściwości nie są mapowane przez administratora");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES',"Typy pomieszczeń nie są mapowane przez administratora");