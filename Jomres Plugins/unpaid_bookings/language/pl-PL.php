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
jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Obsługa nieopłaconych rezerwacji");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Anulować lub usunąć tymczasowe (nieopłacone) rezerwacje? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Ile dni od rezerwacji? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Ta wtyczka działa automatycznie w tle i usuwa lub anuluje wszystkie tymczasowe rezerwacje, które nie są oznaczone jako opłacone w wybranym przez Ciebie przedziale. Jest to przydatne, gdy akceptujesz rezerwacje opłacane za pomocą metod płatności offline (przelew przelew, czek) Jeżeli rezerwacja nie zostanie opłacona w ciągu X dni od momentu jej dokonania, to rezerwacja zostanie usunięta lub anulowana, a kalendarz pokaże zarezerwowane terminy jako wolne, aby ktoś inny mógł zarezerwować te dni Gdy rezerwacja zostanie usunięta lub anulowana, zarówno Ty, jak i gość otrzymacie powiadomienie e-mailem.Jeśli zdecydujesz się anulować rezerwację, rezerwacja i faktura zostaną oznaczone jako anulowane i nie zostaną usunięte z bazy danych , aby mieć do nich dostęp później. Jeśli zdecydujesz się ją usunąć, to rezerwacja i faktura zostaną usunięte z bazy danych.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Rezerwacja anulowana");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Twoja rezerwacja została automatycznie anulowana z powodu braku wpłaty wymaganego depozytu. To nie jest już ważna rezerwacja. Jeśli chcesz dokonać ponownej rezerwacji, odwiedź naszą stronę internetową i ponów rezerwację. Poniżej znajdują się szczegóły anulowanej rezerwacji.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Jeśli uważasz, że otrzymałeś to powiadomienie przez pomyłkę, nie wahaj się z nami skontaktować.");