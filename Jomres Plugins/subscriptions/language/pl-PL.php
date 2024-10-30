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
jr_define('_SUBSCRIPTIONS_ACTIVE',"Aktywny");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Nieaktywne");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Status płatności");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Poziom");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Edytuj subskrypcję");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Wysłać e-mail z przypomnieniem o wygaśnięciu subskrypcji?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Wyślij e-mail z przypomnieniem");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"dni przed wygaśnięciem subskrypcji");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Wyślij e-mail po wygaśnięciu subskrypcji?");
jr_define('_SUBSCRIPTIONS_MY',"Moje subskrypcje");
jr_define('_SUBSCRIPTIONS_HRENEW',"Odnów");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Odnowienie subskrypcji");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Masz już subskrypcję, zamiast tego kup odnowienie.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Edytuj pakiet subskrypcji");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Wpisz kilka pierwszych liter nazwy użytkownika, a zobaczysz menu z nazwami użytkowników. Kliknij nazwę użytkownika, aby ją wybrać.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Ten pakiet subskrypcji nie jest już dostępny, więc nie można go odnowić, rozważ jego aktualizację.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Nie subskrybujesz tego pakietu, więc nie możesz go odnowić.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Brak opcji odnowienia tego pakietu");
jr_define('_SUBSCRIPTIONS_CANCEL',"Anuluj subskrypcję");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Częstotliwość (dni)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Długość subskrypcji w dniach");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Odnowienia nie są dozwolone dla tego pakietu.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Cena odnowienia");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Ustaw to na 0, aby wyłączyć odnawianie tego pakietu lub wprowadź cenę odnowienia");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Opcje pakietu");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Szczegóły pakietu");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Twój pakiet subskrypcji");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Twój pakiet subskrypcji nie obejmuje dostępu do tej funkcji. Aby korzystać z tej funkcji, musisz uaktualnić swoją subskrypcję.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Twoja subskrypcja wygasła i wszystkie Twoje aukcje zostały cofnięte. Twoje aukcje nie są już widoczne dla gości i nie będziesz już mógł otrzymywać rezerwacji online z naszej strony internetowej. Aby kontynuować korzystanie z naszych usług, opublikuj swoje aukcje i zacznij otrzymywać rezerwacje online, zaloguj się na swoje konto i wykup odnowienie." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Twoja subskrypcja w" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"wygasł" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"To jest powiadomienie, że Twoja subskrypcja wkrótce wygaśnie. Aby nadal korzystać z naszych usług, zaloguj się na swoje konto i wykup odnowienie." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Pakiety subskrypcji" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Nazwa" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Opis" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Opublikowane" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Częstotliwość" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Cena" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Ograniczenie biznesowe" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Maksymalna liczba firm, które można dodać za pomocą tego pakietu subskrypcji" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Subskrybuj" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Użyj funkcji obsługi subskrypcji" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Przepraszamy, ale ten identyfikator pakietu nie jest rozpoznawany." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Wygląda na to, że nie uzupełniłeś jeszcze danych swojego konta. Aby umieścić swoją usługę na stronie, musisz uzupełnić dane konta, zanim przejdziemy dalej." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Wykorzystałeś wszystkie miejsca na właściwości dostępne w twoim pakiecie subskrypcji, więc nie będziesz mógł tworzyć żadnych nowych aukcji. Zaktualizuj swój pakiet, jeśli chcesz utworzyć więcej aukcji." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Dochód według roku/miesiąca");
jr_define('_SUBSCRIPTION_WARNING',"Włączyłeś subskrypcje, ale wygląda na to, że nie utworzyłeś jeszcze żadnych pakietów subskrypcji. Właściciele nie będą mogli zarejestrować właściwości w Twojej witrynie, dopóki nie zostanie utworzony co najmniej jeden pakiet subskrypcji.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"Dostęp API" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Możesz uzyskać dostęp do tej funkcji poprzez uaktualnienie do " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2',"Pakiet subskrypcji. ");
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Aktualizacja');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Zasubskrybowano');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Ustawienia bramy subskrypcji');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Obecnie nie subskrybujesz żadnych pakietów subskrypcji. Zapisz się na pakiet, aby nadal korzystać z naszych usług.');
