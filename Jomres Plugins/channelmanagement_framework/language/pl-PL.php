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

jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET',"Identyfikator kanału nie został ustawiony");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET',"Identyfikator menedżera nie został ustawiony");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TITLE',"Struktura Menedżera Kanałów");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE',"Kanały");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS',"Zainstalowane kanały");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL',"Wybierz kanał");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE',"Wybierz typ słownika");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED',"Błąd, brak zainstalowanych kanałów");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE',"Kontrole Poczytalności Menedżera Kanałów");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC',"Wybierz kanał. Gdy to zrobisz, sprawdzimy twoją konfigurację i podkreślimy wszelkie możliwe problemy, które możesz potrzebować rozwiązać.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE',"Mapowanie zasobów");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC',"Różne kanały mają tak zwane słowniki. Są to terminy opisujące zasoby, takie jak typy pokoi, cechy pokoi, cechy nieruchomości itp. zasobów, aby właściwości importowane z i eksportowane do kanałów miały prawidłowe zasoby. Na tej stronie najpierw wybierzesz kanał. Po zakończeniu zostaniesz przeniesiony na nową stronę, na której będziesz mógł wybrać typy zasobów, które chcesz zmapować do zasobów kanału (na przykład funkcji właściwości). Po wybraniu typu zasobu będzie można wybrać między sobą zasoby Jomres i kanału.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE',"Tutaj musisz wybrać zasób (słownik)");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS',"Nie ma elementów lokalnych dla tego elementu słownika, więc nie ma na co mapować.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST',"Błąd, kanał nie ma klasy słownika.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS',"Na tej stronie będziesz musiał zmapować elementy słownika channel managera z tymi w Jomres.");

jr_define('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS',"Konta menedżera kanału");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC',"Zapisz informacje dotyczące autoryzacji dla wszystkich menedżerów kanałów, z którymi możesz mieć konta.");
jr_define('KONIEC', 'Zakończ edycję');
jr_define('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED',"Błąd, wtyczka Opcjonalne dodatki nie jest zainstalowana.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED',"Nie podano nazwy kanału");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED',"Nie podano nowego obiektu właściwości");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES',"ten obiekt JRUser nie został dostarczony");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING',"Rozpoczęcie importu właściwości ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED',"Właściwość zaimportowana pomyślnie");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED',"Nie udało się zaimportować właściwości ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT',"Importuj wszystkie właściwości");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE',"Importuj właściwość");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT',"Właściwości, które nie są oznaczone jako opublikowane/aktywowane na zdalnym serwerze lub właściwości, które nie mają żadnych elementów dziennika zmian, nie mogą być importowane.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING',"Rozpoczęcie importu taryfy");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED',"Taryfa zaimportowana pomyślnie ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED',"Nie udało się zaimportować taryfy");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION',"Nie można zweryfikować ustawień właściwości, próbowano zaimportować nierozpoznane ustawienie właściwości");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE',"Importowane właściwości");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME',"Nazwa usługi");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME',"Nazwa kanału");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID',"Uid właściwości lokalnej");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID',"Uid właściwości zdalnej");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY',"Edytuj pilota");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY',"Wyświetl lokalnie");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY',"Usuń lokalnie");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD',"Panel");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS',"Konta kanałów");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED',"Nie ma zainstalowanych wtyczek cienkich kanałów, nie możesz jeszcze korzystać z tej funkcji.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO',"Nieprzypisane właściwości, którymi zarządzasz, mogą być przypisane do kanału. Jeśli zmienisz kanał, dajesz dowolny kanał z prawidłowym dostępem do API ");