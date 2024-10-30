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
// Because the server may be using a proxy for outgoing calls it's better to call the Jomres App server and ask it to respond with this server's IP address. Once we know that, then we are able to give the documentation the correct IP number to configure in Beds24's API Key N field(s)
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.ipify.org?format=json');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($cURLConnection, CURLOPT_TIMEOUT, 1);

$ip_number_response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($ip_number_response);

if (isset( $jsonArrayResponse->ip)) {
    $this_servers_ip_number = $jsonArrayResponse->ip;
} else {
    $this_servers_ip_number = 'Unknown, ask your server hosts support team';
}
jr_define( 'BEDS24V2_CHANNEL_MANAGEMENT', 'Zarządzanie kanałami (łóżka24)' );

jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Łóżka24' );
jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Jeśli masz konto Beds24 i chcesz zaktualizować Beds24 podczas rezerwacji, wybierz tę opcję. Ustaw adres URL na https://www.beds24.com/api/json/ ' );
jr_define( 'BEDS24V2_ERROR_USER_NO_KEY', 'Ten użytkownik nie ma ustawionych kluczy API, więc nie może kontynuować. Odwiedź jego stronę na stronie Zarządzanie użytkownikami > Menedżerowie właściwości i utwórz dla niego nowy klucz API za pomocą linku podanego na tej stronie.' );
jr_define( 'BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Ten użytkownik nie ma żadnych właściwości Jomres, które mógłby przypisać do właściwości Beds24 i odwrotnie' );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED', "Menedżer, którego jesteś zalogowany, nie wydaje się mieć konta w Beds24, więc musisz najpierw zarejestrować się w jego usłudze, a następnie zapisać ten klucz API na <a href='https:/ /www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'>strona internetowa Beds24 tutaj.</a>" );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_KEY', "Skopiuj i wklej ten klucz API w polu LINK na swoim koncie Beds24, aby kontynuować." );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Gdy to zrobisz, kliknij przycisk poniżej, aby kontynuować." );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Łączenie właściwości Beds24" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_INFO', "Ta strona umożliwia przeglądanie właściwości, do których masz dostęp w tym systemie, oraz tych, które istnieją w Channel Managerze. Pozwala także importować właściwości z Channel Managera do tego systemu lub eksportować istniejących właściwości do Channel Managera. <br/> Jeśli masz nieruchomości zarówno w tym systemie, jak i Beds24 i chcesz je ze sobą połączyć, możesz użyć w tym celu przycisku Właściwości. Odwiedź Beds24 > Ustawienia > Właściwości (upewnij się, że właściwość wybrana w menu jest taka sama, jak ta, którą chcesz połączyć), a następnie w podmenu Link zapisz Apikey właściwości w polu PropKey w Beds24. Gdy to zrobisz, ponownie załaduj stronę. Ten system sprawdź, czy dwie właściwości są powiązane z tym samym kluczem i utwórz potrzebne skojarzenia. Po połączeniu tych dwóch właściwości pamiętaj, aby odwiedzić stronę Wyświetl usługę, znaleźć adres URL powiadomienia i wkleić go w polu Notify Url na stronie łącza. To będzie upewnij się, że Beds24 używa właściwego linku do synchronizacji rezerwacji z danym obiektem po otrzymaniu rezerwacji. " );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Błąd : W Beds24 nie ma żadnych obiektów, z którymi możesz się połączyć. Może to być spowodowane tym, że wszystkie obiekty, do których masz prawa, zostały już połączone z innym kontem w tym systemie." );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Uid właściwości" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Nazwa obiektu" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Identyfikator właściwości Beds24" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Nazwa obiektu Beds24" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Apikey właściwości" );
jr_define('BEDS24_LISTPROPERTIES_IMPORT', "Importuj");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Konfiguruj typy pokoi");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Tutaj musisz połączyć typy pokoi na swoim koncie Beds24 z tymi zapisanymi w tym systemie.");
jr_define('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Typ pokoju Beds24");

jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Nie można jeszcze zaimportować tej właściwości, ponieważ nie ustawiłeś klucza właściwości na stronie łącza właściwości.");
jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Nie można jeszcze zaimportować tej właściwości, ponieważ nie ma w niej żadnych pokoi. Utwórz jeden lub więcej pokoi (pokoje w Beds24 są takie same jak pokoje w Jomres) i nie zapomnij ustawić ceny minimalnej . Gdy już to zrobisz, możesz zaimportować typ pokoju do Jomres i powiązać go z aktualnymi typami pokoi Jomres.Po tym będziesz mógł modyfikować taryfy, ale musisz ustawić cenę minimalną.");
jr_define('_BEDS24_SUGGESTED_KEY', "Sugerujemy użycie tego klucza API. Gdy to zrobisz, załaduj ponownie tę stronę.");
jr_define('BEDS24_LISTPROPERTIES_EXPORT', "Eksportuj");
jr_define( 'BEDS24V2_REST_API_INTRO', "Tutaj możesz zobaczyć parę kluczy REST API i ścieżkę do API . Jeśli zapiszesz te dane na swoim koncie w Beds24, Beds24 24 będzie mógł skontaktować się z tą stroną za pośrednictwem swojego API." );
jr_define( 'BEDS24V2_REST_API_CLIENT_ID', "Identyfikator klienta" );
jr_define( 'BEDS24V2_REST_API_CLIENT_SECRET', "Sekret klienta" );
jr_define( 'BEDS24V2_REST_API_ENDPOINT', "URI (punkt końcowy)" );
jr_define('BEDS24_LISTPROPERTIES_CONFIGURE', "Wyświetl właściwość");
jr_define('BEDS24_ROOM_TYPES_TITLE', "Powiązania typów pomieszczeń");

jr_define('BEDS24_ROOM_TYPES_INFO', "Ta strona umożliwia powiązanie typów pokojów z tymi przechowywanymi na serwerach Beds24.");
jr_define('BEDS24_ROOM_TYPES_INFO2', "Dopóki typy pokoi nie zostaną połączone, nie możesz otrzymywać informacji o rezerwacji wysłanych przez Beds24. Jeśli Twoja nieruchomość została zaimportowana/wyeksportowana do lub z Beds24, automatycznie utworzyliśmy dla Ciebie linki, jednak jeśli dodasz nowy typ pokoju lub usuń jeden, ta strona może być użyta w celu upewnienia się, że typ pokoju jest prawidłowo powiązany.");
jr_define('BEDS24_ROOM_TYPES_INFO3', "Wybierz typy pokoi Beds24, które chcesz powiązać z typami pokoi w tym systemie, a po zakończeniu kliknij Zapisz, aby zaktualizować zmiany w Beds24.");
jr_define('BEDS24_ROOM_TYPES_YOURS', "Twoje typy pokoi");
jr_define('BEDS24_ROOM_TYPES_BEDS24', "Typy pokoi Beds24");
jr_define('BEDS24_ROOM_TYPES_NONE', "Ta właściwość nie ma żadnych typów pokoi, więc nie może być połączona z żadnymi typami pokoi Beds24. Czy chcesz zaimportować typy pokoi z Beds24?");
jr_define('BEDS24_IMPORT_ROOMS', "Importuj pokoje");
jr_define('BEDS24_EXPORT_BOOKINGS', "Eksportuj rezerwacje");
jr_define('BEDS24_IMPORT_BOOKINGS', "Importuj rezerwacje");
jr_define('BEDS24_IMPORT_EXPORT', "Możesz importować i eksportować istniejące rezerwacje z i do Beds24 jednym kliknięciem. Rezerwacje zaimportowane z Beds24 są importowane od wczoraj i obejmą wszystkie rezerwacje na przyszły rok. Należy używać tych przycisków dopiero po pierwszy import lub eksport właściwości do systemu. Po konfiguracji import i/lub eksport zostaną wykonane automatycznie.");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Zaktualizować ceny do Beds24?");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Możesz zaktualizować Beds24 tylko pod kątem dostępności lub zarówno dostępności, jak i cen. Nie.");
jr_define('_BEDS24_CONTROL_PANEL_DIRECT', "Łącze bezpośrednie");
jr_define('BEDS24_IMPORT_NOTIFICATION_URLS', "Jeśli zaimportowałeś tę właściwość do Jomres, musisz ręcznie zmienić adres URL powiadomień w Beds24 -> Właściwości -> Ustawienia łącza na następujące :");
jr_define('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Obecnie nie masz żadnych usług powiązanych z usługami Beds24. Musisz zresetować klucze API menedżera, zanim pozwolisz menedżerom na próbę połączenia się z Beds24. Zapewni to, że wszyscy mają unikalne klucze.");
jr_define('BEDS24V2_ERROR_KEYS_REBUILD', "Zresetuj teraz klucze API menedżera");
jr_define('BEDS24V2_ERROR_KEYS_DISMISS', "Ignoruj ​​ostrzeżenie");
jr_define('BEDS24V2_ERROR_KEYS_DONE', "Klucze interfejsu API menedżera zostały zresetowane");

jr_define( 'BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Linki do właściwości Beds24" );
jr_define('BEDS24_ASSIGN_MANAGER', "Menedżer zmian Beds24");
jr_define('BEDS24_ASSIGN_MANAGER_DESC', "Kiedy menedżer wyświetla stronę zarządzania kanałem (Bed24) w interfejsie użytkownika, wszelkie właściwości, które współdzielą klucz API w Jomres i Beds24 są automatycznie łączone w Jomres. Podobnie, wszelkie właściwości importowane lub eksportowane przez menedżera są połączone. Możesz zmienić menedżera, z którym usługa jest połączona, zmieniając menu menedżera na tej stronie, a następnie klikając Zapisz.");
jr_define( 'BEDS24V2_TARIFFS_TITLE', "Eksport taryf" );
jr_define( 'BEDS24V2_TARIFF_EXPORT_DESC', "Możesz wyeksportować utworzone taryfy do Beds24 do określonej stawki dziennej. Jeśli zamierzasz korzystać z tej funkcji, należy ustawić opcję 'Zaktualizować ceny do Beds24?' w Konfiguracji obiektu na Nie. Ty może również zajść potrzeba skonfigurowania Twojego obiektu w panelu sterowania Beds24, tak abyś mógł mieć wiele stawek dziennych.Aby to zrobić, przejdź do Ustawienia > Właściwości > Pokoje > Ceny dzienne i skonfiguruj Liczbę cen dziennych na żądaną liczbę cen . Gdy to zrobisz, będziesz mógł kliknąć jeden z przycisków P, aby ustawić tę stawkę dzienną." );
jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Nazwa taryfy" );
jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Typ pokoju" );
jr_define( 'BEDS24V2_BOOKING_RESEND', "Wyślij ponownie powiadomienie" );
jr_define( 'BEDS24V2_BOOKING_DATA_AT_B24', "To są informacje o rezerwacji zapisane w Beds24. Jeśli nie masz pewności, że dane są nieprawidłowe, nie musisz ponownie wysyłać rezerwacji do Beds24. " );
jr_define( 'BEDS24V2_BOOKING_NO_DATA_AT_B24', "Ta rezerwacja nie jest powiązana z rezerwacją w Beds24. Możesz użyć przycisku Wyślij ponownie, aby wyeksportować tę rezerwację do bed24." );

jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonimizować gości?" );
jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Gdy rezerwacje są wysyłane do channel managera, zalecamy anonimizację danych gościa. Jeśli ustawisz tę opcję na tak, podczas przesyłania informacji o rezerwacji do channel managera imię i nazwisko gościa, adres e-mail nie są. OTA będą miały dokładny zapis Twojej dostępności bez konieczności udostępniania więcej informacji niż to konieczne. Oznacza to, że przestrzegasz RODO, ponieważ jeśli później gość zdecyduje się usunąć swoje dane w tym systemie (nie zostaniesz o tym powiadomiony), jego dane nie zostaną pozostawione innym administratorom danych, nad którymi nie masz kontroli. W razie potrzeby możesz nadal porównywać rezerwacje w tym systemie z rezerwacjami w channel managerze, strona Szczegóły rezerwacji pokaże Ci numer rezerwacji dla tej rezerwacji, ponieważ jest on zapisany w channel managerze." );
jr_define( 'BEDS24V2_MASTER_APIKEY', "EXPERIMENTAL FEATURE - Master Beds24 API key" );
jr_define( 'BEDS24V2_MASTER_APIKEY_DESC', "JEŚLI MASZ JUŻ INSTALACJĘ JOMRES Z WŁAŚCIWOŚCIAMI ZWIĄZANYMI Z BEDDS24 PRZECZYTAJ CAŁOŚĆ TUTAJ. Domyślnie Jomres został zaprojektowany jako platforma rezerwacji wielu dostawców. Menedżerowie posiadający własne konta beds24 mogą bezpiecznie importować swoje nieruchomości do i z beds24. To ustawienie umożliwia zastąpienie tej funkcji przez posiadanie jednego klucza API dla wszystkich właściwości. Oznacza to, że potrzebujesz tylko jednego konta w Beds24, ale oznacza to również, że wszystkie opłaty będą naliczane przez to jedno konto. Każdy menedżer z dostępem do nieruchomości będzie mógł wysyłać aktualizacje do nieruchomości na serwerach bed24. Pozostaw puste, aby zignorować to ustawienie i zmusić zarządców obiektów do korzystania z własnych kont Beds24. Klucz API może przybrać dowolną formę, o ile klucz tutaj pasuje do tego w <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> Pole <em>klucz API 1</em> </a>. JEŚLI MASZ JUŻ INSTALACJĘ JOMRES Z WŁAŚCIWOŚCIAMI POWIĄZANYMI Z BEDDS24 : Możesz przełączyć się na korzystanie z tej funkcji, jednak wymagałoby to najpierw skrócenia (opróżnienia) tych tabel, usunięcia istniejących właściwości, które są już w Jomres, a następnie ponownie zaimportuj właściwości z Beds24 do Jomres. XXXXX_jomres_beds24_contract_booking_number_xref , XXXXX_jomres_beds24_property_uid_xref , XXXXX_jomres_beds24_rest_api_key_xref , XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Podczas ustawiania klucza API w sekcji <em>Klucz API N</em> na stronie Dostęp do konta Beds24 ważne jest, aby ustawić pole <em>Dostęp do klucza API</em> na ' Zezwalaj tylko na adresy IP z białej listy i ustawisz numer IP na <strong>".$this_servers_ip_number ."</strong> Dotyczy to zarówno konfiguracji głównego klucza interfejsu API tutaj, jak i interfejsu, jeśli menedżer właściwości konfiguruje swój własny indywidualny interfejs API Klucze.");
jr_define( 'BEDS24V2_WHITELIST_WARNING', "Jeśli Twoje obiekty zostały już połączone z Beds24, pamiętaj, że Beds24 niedawno wprowadziło zasadę, zgodnie z którą wszystkie serwery łączące się z Twoim kontem muszą być umieszczone na białej liście. Możesz to zrobić na stronie Dostęp do konta, na której wprowadzono Twój klucz dostępu. Wybierz listę rozwijaną IP białej listy i ustaw numer IP na" );