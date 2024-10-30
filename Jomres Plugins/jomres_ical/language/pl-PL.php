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

jr_define( '_JOMRES_ICAL_EVENT', 'iCal Event' );
jr_define( '_JOMRES_ICAL_FEED', 'Kanał iCal' );
jr_define( '_JOMRES_ICAL_FEED_LINK', 'Adres URL kanału iCal' );
jr_define( '_JOMRES_ICAL_FEEDS', 'Kanały iCal' );
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Twoje kanały iCal mogą wyświetlać nadchodzące rezerwacje w zdalnym kalendarzu, w tym na urządzeniu mobilnym, Kalendarzu Google, Kalendarzu Apple, Thunderbird, Outlook i innych. Użyj następujących adresów URL, aby subskrybować kanały w oprogramowanie kalendarza.' );
jr_define( '_JOMRES_ICAL_ANON', 'Zanonimizowany adres URL kanału iCal' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Zezwolić na anonimowy dostęp do kanałów iCal?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Jeśli ta opcja jest włączona, Twój kanał wydarzeń iCal będzie dostępny dla wszystkich, ale bez rezerwacji i danych gości.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'Import iCal' );
jr_define( '_JOMRES_ICAL_SELECT', 'Wybierz plik do importu' );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Błąd, żaden plik nie został przesłany.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Podczas importowania pliku iCal data zakończenia wydarzenia powinna być datą wyjazdu gościa. Podsumowanie powinno być imieniem gościa. Opis wydarzenia może zawierać wszystkie inne szczegóły." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Ten numer rezerwacji już istnieje w systemie.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'W wybranych terminach nie ma wolnych pokoi.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'W pliku ics nie znaleziono żadnych zdarzeń.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Zdarzenie zaimportowane pomyślnie' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Nie można zaimportować zdarzenia' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Nazwa gościa' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Opis zdarzenia' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Rozpocznij' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'Koniec' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Wynik' );
jr_define( '_JOMRES_ICAL_WITHHELD', 'Wstrzymane' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Twoje kanały iCal mogą wyświetlać nadchodzące rezerwacje w zdalnym kalendarzu, w tym na urządzeniu mobilnym, Kalendarzu Google, Kalendarzu Apple, Thunderbird, Outlook i innych.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Ta funkcja umożliwia synchronizację rezerwacji z witryn takich jak Airbnb, Homeway i innych z Jomres. Będziesz musiał wprowadzić adres URL kanału iCal swojego obiektu dla każdej witryny, z którą chcesz zsynchronizować. Jeśli ktoś to zrobi na przykład zarezerwuj swój obiekt na Airbnb, te daty będą wyświetlane jako zablokowane (czarne rezerwacje) również na tej stronie Jomres, więc nikt nie może również zarezerwować tych dat tutaj. Nie spowoduje to synchronizacji szczegółów rezerwacji między witrynami (takich jak dane gości, ceny, faktury itp.), ale jest to dobry i łatwy sposób na uniknięcie podwójnych rezerwacji poprzez synchronizację samej dostępności.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'Ustawienia synchronizacji iCal' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'Ustawienia kanału iCal' );
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'Zewnętrzny adres URL iCal' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Dołącz również zapytania o rezerwację?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Jeśli ta opcja jest włączona, uwzględni również rezerwacje, które nie zostały jeszcze zatwierdzone (jeśli funkcja zatwierdzania rezerwacji jest włączona). Wyłączenie tej opcji to świetny sposób na ukrycie w kalendarzu rezerwacji, które mogą oczekiwać na potwierdzenie w statusie niezatwierdzone/zapytanie. Jeśli rezerwacje nie wymagają zatwierdzenia (funkcja zatwierdzania rezerwacji jest wyłączona), wszystkie rezerwacje zostaną wyeksportowane.' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'Zdalne kanały iCal' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Zdalny adres URL' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'UID pokoju' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Nazwa/numer pokoju' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Wybierz pokój, na który ten kanał będzie miał wpływ, oraz adres URL zdalnej strony. Podczas importowania pliku iCal, data zakończenia wydarzenia powinna być datą wyjazdu gościa. Podsumowaniem powinna być nazwa gościa. Wydarzenie opis może zawierać wszystkie inne szczegóły." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Utworzono zdalny kanał Ical' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Zdalny kanał Ical został usunięty' );