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

jr_define('STRIPE_TITLE',"Pasek");
jr_define('STRIPE_CONNECT_CONFIG_INFO',"Ta bramka Stripe została zaprojektowana specjalnie po to, aby umożliwić Tobie jako kierownikowi witryny otrzymywanie części płatności dokonanych na rzecz Zarządców Nieruchomości w czasie rezerwacji. Zanim będzie można z niej korzystać, musisz najpierw skonfigurować własną integrację ze Stripe Połącz. <a href='http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class= 'btn btn-primary'>Dokumentację tej wtyczki można znaleźć tutaj.</a><br/>Jeśli klikniesz Zapisz na tej stronie, aby umożliwić bezproblemowe działanie tej wtyczki, wszystkie inne bramy zostaną wyłączone</ strong> Zanim zaczniesz, upewnij się, że przeszedłeś do strony Stripe Connect i zaznaczyłeś, że konfigurujesz platformę. Po wykonaniu tej czynności postępuj zgodnie z instrukcjami wyświetlanymi na ekranie, aby skonfigurować swoje konto. Zanim menedżerowie będą mogli połączyć swoje konto z twoim, ty musi przejść do Ustawienia > Ustawienia połączenia i w obszarze \"Ustawienia OAuth\" włączyć OAuth dla kont standardowych a następnie kliknij Zapisz (pamiętaj, że musisz to zrobić zarówno w trybie testowym, jak i na żywo). " );

jr_define('STRIPE_REGISTER_CONNECT',"Połącz się z nami!");
jr_define('STRIPE_REGISTER_CONNECT_BLURB',"Zarejestrowałeś się, ale połączenie nie zostało jeszcze zakończone. Musisz połączyć swoje konto Stripe z naszą stroną internetową. Gdy to zrobisz, możesz dodać wszystkie swoje nieruchomości do naszej strony i rozpocząć przyjmowanie rezerwacji .");

jr_define('STRIPE_REGISTER_WELCOME_EMAIL_TITLE',"Witamy w");
jr_define('STRIPE_REGISTER_WELCOME_EMAIL_BLURB',"Zanim zaczniesz konfigurować swoje usługi, musisz połączyć nas ze swoim kontem Stripe. Kliknij link, aby rozpocząć.");

jr_define('STRIPE_SETUP_INFO',"Musimy teraz połączyć twoje konto z naszym, to pozwoli nam na pobieranie płatności w twoim imieniu, więc kliknij przycisk Połącz, aby przejść do Stripe, gdzie możesz potwierdzić połączenie.");
jr_define('STRIPE_SETUP_DONE',"Jesteś już z nami połączony, nic więcej tutaj nie możesz zrobić! Zamknij to okno i zajmijmy się prowadzeniem biznesu.");
jr_define('STRIPE_SETUP_THANKS',"Dziękujemy za połączenie z nami! Możesz teraz zamknąć to okno.");
jr_define('STRIPE_SETUP_DISCONNECT',"Odłącz swoje konto.");
jr_define('STRIPE_SETUP_DISCONNECTED',"Konto odłączone, możesz teraz zamknąć to okno.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID',"Identyfikator klienta Stripe Connect");
jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC',"Identyfikator klienta Stripe możesz uzyskać ze swojego <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>Panel > Ustawienia > Połącz. API klawisze znajdują się w opcji menu Deweloperzy.</a>");
jr_define('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL',"Upewnij się, że ustawiłeś identyfikator URI przekierowania w <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>Połącz > Ustawienia</a> do <br/> ");

jr_define('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY',"Tajny klucz");
jr_define('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY',"Klucz publiczny");

jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION',"Twoja prowizja");
jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC',"Ta prowizja jest pobierana z płatności wysłanej do zarządcy nieruchomości w momencie rezerwacji. Następnie jest umieszczana na Twoim koncie Stripe przez Stripe. <br/> Jest to procent prowizji, za którą będziesz pobierać opłaty od zarządców nieruchomości ich rezerwacji. Twoja prowizja jest pobierana na podstawie CAŁKOWITEGO kosztu rezerwacji, a nie wartości depozytu. <br/> Niezależnie od tego, na jaką wartość ustawisz tę wartość, zalecamy skonfigurowanie Konfiguracji Strony -> Formularz Rezerwacji -> Minimalna kwota wpłaty na co najmniej dwukrotność tej kwoty, więc jeśli chcesz pobierać 10% prowizji, powinieneś ustawić Minimalny depozyt na poziomie 20%.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO',"Europejska opłata Stripe");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC',"Jest to procent, jaki Stripe pobiera za dokonywanie płatności w Twojej witrynie. Obecnie pobiera 1,4% za karty europejskie i 2,9% za karty spoza Europy. Ta liczba jest wymagana do określenia ceny przy rezerwacji i termin płatności.");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO',"Opłata za pasek w walucie innej niż euro");

jr_define('STRIPE_PAYMENT_FORM_CREDITCARD',"Numer karty");
jr_define('STRIPE_PAYMENT_FORM_EXPIRATION',"Wygaśnięcie (MM/RR)");
jr_define('STRIPE_PAYMENT_FORM_CVC',"CVC");
jr_define('STRIPE_PAYMENT_FORM_ZIP',"Kod pocztowy rozliczenia");
jr_define('STRIPE_PAYMENT_FORM_SECURE',"Formularz bezpiecznych płatności");
jr_define('STRIPE_PAYMENT_FORM_BILLINGDETAILS',"Szczegóły płatności");
jr_define('STRIPE_PAYMENT_FORM_CARDDETAILS',"Szczegóły karty");
jr_define('STRIPE_PAYMENT_FORM_HOLDER',"Imię i nazwisko posiadacza karty");
jr_define('STRIPE_PAYMENT_FORM_PAYNOW',"Zapłać teraz");
jr_define('STRIPE_PAYMENT_FORM_TOPAY',"Aby zapłacić teraz");

jr_define('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY','Ulica jest wymagana i nie może być pusta');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH','Ulica musi mieć więcej niż 6 i mniej niż 96 znaków');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY','Miasto jest wymagane i nie może być puste');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY','Kod jest wymagany i nie może być pusty');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH','Kod musi mieć więcej niż 3 i mniej niż 12 znaków');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY','Adres e-mail jest wymagany i nie może być pusty');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID','Wpis nie jest prawidłowym adresem e-mail');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH','E-mail musi mieć więcej niż 6 i mniej niż 65 znaków');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY','Imię i nazwisko posiadacza karty jest wymagane i nie może być puste');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH','Imię i nazwisko posiadacza karty musi mieć więcej niż 6 i mniej niż 70 znaków');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY','Numer karty kredytowej jest wymagany i nie może być pusty');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID','Numer karty kredytowej jest nieprawidłowy');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY','Miesiąc ważności jest wymagany');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS','Miesiąc wygaśnięcia może zawierać tylko cyfry');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY','Wymagany jest rok ważności');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS','Rok ważności może zawierać tylko cyfry');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY','Cvv jest wymagane i nie może być puste');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID','Wartość nie jest prawidłowym CVV');

jr_define('STRIPE_PAYMENT_FAILED',"Przepraszamy, w tej chwili nie możemy przetworzyć Twojej płatności.");
jr_define('STRIPE_PAYMENT_TRY_AGAIN',"Spróbuj ponownie");

jr_define('STRIPE_PAYMENT_ERROR_DECLINED',"Płatność została odrzucona.");
jr_define('STRIPE_PAYMENT_ERROR_RATE_LIMIT',"Zbyt wiele żądań wysłanych do API zbyt szybko");
jr_define('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS',"Do API Stripe dostarczono nieprawidłowe parametry");
jr_define('STRIPE_PAYMENT_ERROR_AUTH_FAILED',"Uwierzytelnianie za pomocą API Stripe nie powiodło się");
jr_define('STRIPE_PAYMENT_ERROR_NETWORK_FAULT',"Komunikacja sieciowa ze Stripe nie powiodła się (czy połączenie internetowe zostało przerwane?)");
jr_define('STRIPE_PAYMENT_ERROR_UNCAUGHT',"Wystąpił nieprzechwycony błąd");