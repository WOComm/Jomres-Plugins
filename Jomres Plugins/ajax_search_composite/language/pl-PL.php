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

jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE',"Ajax Search Composite");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS',"Szukaj według gwiazdek");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES',"Szukaj według cen");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES',"Szukaj według cech");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY',"Szukaj według kraju");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION',"Szukaj według regionu");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN',"Szukaj według miasta");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE',"Szukaj według typu pokoju");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE',"Szukaj według typu właściwości");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER',"Szukaj według numerów gości");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES',"Szukaj według dat");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE',"Styl szablonu");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC',"Domyślnie : Przeważnie proste pola wyboru lub przyciski w trybie Bootstrap. Modals : Przyciski otwierają się, aby umożliwić użytkownikom wybór filtrów wyszukiwania. Harmonijka zaprojektowana dla górnej części strony, obszary przesuwają się w dół, aby odsłonić filtry. Multiselect : Rozwijane przyciski, aby odkryj filtry.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS',"Przyciski (orientacja pionowa)");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS',"Modalne (orientacja pionowa) Tylko Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION',"Akordeon (orientacja pozioma) Tylko Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT',"Wybór wielokrotny (orientacja pozioma) Tylko Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS',"Pokaż filtry");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS',"Ukryj filtry");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO',"Wykorzystuje strukturę wyszukiwania ajax. Umożliwia umieszczenie modułu wyszukiwania, który oferuje wyszukiwanie według dostępności, zakresu cen, funkcji, typu nieruchomości, typu pokoju, liczby gości, gwiazdek, kraju, regionu i miasta na pasku bocznym lub górny pasek. Zwróć uwagę, że pokazany tutaj przykład nie zadziała, ponieważ niektóre argumenty znoszą się nawzajem, wybierz tylko to, czego potrzebujesz z dostępnych argumentów (z wyjątkiem wymaganego argumentu). Ten krótki kod różni się nieco od większości innych shortcodes, ponieważ musi mu towarzyszyć specjalny div po deklaracji shortcode z identyfikatorem asamodule_search_results, gdzie wtyczka umieszcza zwróconą listę właściwości.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN',"Wymagane. Argumentem musi być ajax_search_composite");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE',"Styl wyszukiwania pól. Opcje to przyciski modalne akordeon multiselect Jeśli nie jest ustawiona, wtyczka użyje opcji skonfigurowanej w konfiguracji witryny. Multiselect/Accordion są idealne do wyświetlania w poziomie, pozostałe dwie opcje są najlepsze do umieszczenia w pasek boczny.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS',"Pokaż formularz wyszukiwania na stronie, jeśli zadanie strony jest ustawione na viewproperty (strona szczegółów właściwości). 0 dla Nie, 1 dla Tak.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS',"Wstępne filtrowanie polega na wybraniu w wynikach wyszukiwania tylko tych właściwości, które spełniają warunek wstępnego filtrowania. Wstępne filtrowanie według identyfikatora właściwości, dzięki czemu w wynikach wyszukiwania mogą być wyświetlane tylko niektóre właściwości. Argumenty są argumentami. lista rozdzielonych przecinkami UID właściwości");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES',"Wstępne filtrowanie według typu właściwości, dzięki czemu tylko właściwości tego/tych typów mogą być wyświetlane w wynikach wyszukiwania. Argumenty są listą identyfikatorów właściwości oddzielonych przecinkami.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY',"Wstępne filtrowanie według kodu kraju, aby w wynikach wyszukiwania były wyświetlane tylko właściwości w tych krajach. Argumenty są listą kodów ISO krajów oddzielonych przecinkami.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION',"Wstępne filtrowanie według nazwy regionu, aby w wynikach wyszukiwania były wyświetlane tylko właściwości w tych regionach. Argumenty są listą nazw regionów oddzielonych przecinkami i muszą być zgodne z regionami przechowywanymi w bazie danych. Jeśli ustawisz kraj na, na przykład Niemcy (DE), wtedy właściwości z innych krajów o podobnych nazwach regionów nie będą wyświetlane.");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS',"Włącz/wyłącz wprowadzanie gwiazdek w formularzu. Należy pamiętać, że jeśli ustawiłeś opcję za pomocą zakładki Ustawienia złożonego wyszukiwania Ajax w Konfiguracja witryny na Nie, ustawienie asc_by_stars na liście argumentów nie przyniesie żadnego efektu. ");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE',"Włącz/wyłącz wprowadzanie gwiazdek w formularzu. Należy pamiętać, że jeśli ustawiłeś opcję za pomocą zakładki Ustawienia złożonego wyszukiwania Ajax w Konfiguracja witryny na Nie, ustawienie asc_by_price na liście argumentów nie będzie miało żadnego efektu. ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES',"Włącz/wyłącz funkcje właściwości wprowadzone w formularzu. Pamiętaj, że jeśli ustawisz opcję na karcie Ustawienia złożone wyszukiwania Ajax w Konfiguracja witryny na Nie, ustawienie asc_by_features na liście argumentów nie przyniesie żadnego efektu .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY',"Włącz/wyłącz wprowadzanie kraju w formularzu. Należy pamiętać, że jeśli ustawiłeś opcję na karcie Ustawienia złożone wyszukiwania Ajax w Konfiguracja witryny na Nie, ustawienie asc_by_country na liście argumentów nie będzie miało żadnego efektu. ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION',"Włącz/wyłącz wprowadzanie regionu w formularzu. Należy pamiętać, że jeśli ustawiłeś opcję na karcie Ustawienia złożone wyszukiwania Ajax w Konfiguracja witryny na Nie, ustawienie asc_by_region na liście argumentów nie przyniesie żadnego efektu. ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN',"Włącz/wyłącz dane wejściowe Miasto w formularzu. Należy pamiętać, że jeśli ustawiłeś opcję za pomocą zakładki Ustawienia złożonego wyszukiwania Ajax w Konfiguracja witryny na Nie, ustawienie asc_by_town na liście argumentów nie przyniesie żadnego efektu. ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE',"Włącz/wyłącz typ pokoju w formularzu. Pamiętaj, że jeśli ustawiłeś opcję za pomocą zakładki Ustawienia złożonego wyszukiwania Ajax w Konfiguracja witryny na Nie, ustawienie asc_by_roomtype na liście argumentów nie przyniesie żadnego efektu .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE',"Włącz/wyłącz dane wejściowe typu właściwości w formularzu. Należy pamiętać, że jeśli ustawiłeś opcję na karcie Ustawienia złożone wyszukiwania Ajax w Konfiguracja witryny na Nie, ustawienie asc_by_propertytype na liście argumentów nie przyniesie żadnego efektu .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER',"Włącz/wyłącz wprowadzanie numerów gości w formularzu. Należy pamiętać, że jeśli ustawiłeś opcję na karcie Ustawienia złożone wyszukiwania Ajax w Konfiguracja witryny na Nie, ustawienie asc_by_guestnumber na liście argumentów nie przyniesie żadnego efektu .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE',"Włącz/wyłącz wprowadzanie daty w formularzu. Należy pamiętać, że jeśli ustawiłeś opcję za pomocą zakładki Ustawienia złożone wyszukiwania Ajax w Konfiguracja witryny na Nie, ustawienie asc_by_date na liście argumentów nie będzie miało żadnego efektu. ");