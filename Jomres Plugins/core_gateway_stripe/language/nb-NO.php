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

jr_define ('STRIPE_TITLE', "Stripe");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Denne Stripe -gatewayen er designet spesielt for at du som nettstedssjef kan motta en del av betalingene som er gjort til eiendomsforvaltere ved bestillingstidspunktet. Før den kan brukes, må du først sette opp din egen integrasjon med Stripe Koble til. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Dokumentasjon for denne plugin-en finner du her. </a> <br/> Hvis du klikker Lagre på denne siden, vil denne pluginen fungere sømløst  alle andre gateways blir deaktivert </ strong> Før du begynner, må du kontrollere at du har gått til Stripe Connect -siden din og angitt at du konfigurerer en plattform. Når det er gjort, følg instruksjonene på skjermen for å konfigurere kontoen din. Før ledere kan koble kontoen din til deg må gå til Innstillinger> Koble til innstillinger og i området \"OAuth -innstillinger\" aktiverte OAuth for standardkontoer og klikk deretter på Lagre (merk deg, du må gjøre dette i både Test- og Live -modus). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Ta kontakt med oss!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Du har registrert deg, men tilkoblingen er ikke fullført ennå. Du må koble Stripe -kontoen din til nettstedet vårt. Når det er gjort, kan du legge til alle eiendommene dine på nettstedet vårt og begynne å ta bookinger. . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Velkommen til");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Før du kan begynne å sette opp eiendommen din, må du koble oss til Stripe -kontoen din. Klikk på lenken for å komme i gang.");

jr_define ('STRIPE_SETUP_INFO', "Vi må nå koble kontoen din til vår. Dette vil tillate oss å ta betalinger på dine vegne, så klikk på Koble til for å bli ført til Stripe hvor du kan bekrefte tilkoblingen.");
jr_define ('STRIPE_SETUP_DONE', "Du er allerede koblet til oss, ingenting mer å gjøre her! Lukk dette vinduet og la oss fortsette med å gjøre forretninger.");
jr_define ('STRIPE_SETUP_THANKS', "Takk for at du tok kontakt med oss! Du kan lukke dette vinduet nå.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Koble fra kontoen din.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Kontoen er frakoblet, du kan lukke dette vinduet nå.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Stripe Connect Client ID");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Du kan få Stripe Client ID fra <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> oversikten> Innstillinger> Koble til. API. tastene er under Utvikler -menyalternativet. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Sørg for at du angir omdirigerings -URI -en i <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Koble til> Innstillinger </a> til <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Hemmelig nøkkel");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Offentlig nøkkel");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Din kommisjon");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Denne provisjonen blir hentet fra betalingen som ble sendt til eiendomsforvalteren ved bestillingstidspunktet. Den blir deretter lagt inn på Stripe -kontoen din av Stripe. <br/> Dette er prosentandelen provisjon du vil belaste eiendomsforvaltere for. deres bestillinger. Provisjonen belastes basert på HELE kostnaden for bestillingen, ikke innskuddsverdien. <br/> Uansett hva du angir denne verdien til, anbefaler vi at du konfigurerer nettstedskonfigurasjon -> bestillingsskjema -> minimumsinnskuddstall minst to ganger dette tallet, så hvis du vil belaste 10% provisjon, bør du gjøre et minimumsinnskudd på 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Dette er prosentandelen som Stripe belaster deg for å foreta betalinger på nettstedet ditt. For tiden tar de 1,4% for europeiske kort og 2,9% for ikke-europeiske kort. Dette tallet kreves for å bestemme priser ved bestilling og betalingstid. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Stripe Fee non-euro");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Kortnummer");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Utløp (MM/ÅÅ)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Faktureringsnummer");
jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Sikkert betalingsskjema");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Faktureringsdetaljer");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Kortdetaljer");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Kortholderens navn");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Betal nå");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Å betale nå");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Gaten er påkrevd og kan ikke være tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Gaten må være mer enn 6 og mindre enn 96 tegn lang');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Byen er påkrevd og kan ikke være tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Glidelåsen er påkrevd og kan ikke være tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'Glidelåsen må være mer enn 3 og mindre enn 12 tegn lang');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'E -postadressen er påkrevd og kan ikke være tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Inngangen er ikke en gyldig e -postadresse');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'E -posten må være mer enn 6 og mindre enn 65 tegn lang');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Kortholdernavnet er obligatorisk og kan ikke være tomt');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'Kortholdernavnet må være mer enn 6 og mindre enn 70 tegn langt');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Kredittkortnummeret kreves og kan ikke være tomt');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Kredittkortnummeret er ugyldig');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'Utløpsmåneden er påkrevd');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'Utløpsmåneden kan bare inneholde sifre');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Utløpsåret er påkrevd');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Utløpsåret kan bare inneholde sifre');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'Cvv er påkrevd og kan ikke være tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Verdien er ikke en gyldig CVV');

jr_define ('STRIPE_PAYMENT_FAILED', "Beklager, vi kunne ikke behandle betalingen din for øyeblikket.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Prøv igjen");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Betaling ble avslått.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "For mange forespørsler ble sendt til API for raskt");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Ugyldige parametere ble levert til Stripes API");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Autentisering med Stripes API mislyktes");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Nettverkskommunikasjon med Stripe mislyktes (har Internett -tilkoblingen falt?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Det oppstod en uoppdaget feil");