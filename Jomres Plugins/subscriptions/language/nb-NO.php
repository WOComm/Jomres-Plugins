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
jr_define('_SUBSCRIPTIONS_ACTIVE',"Aktiv");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Ikke aktiv");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Betalingsstatus");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Nivå");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Rediger abonnement");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Send e-post påminnelse om utløp av abonnement?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Send e-postpåminnelse");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"dager før abonnementet utløper");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Sende e-post når abonnementet utløp?");
jr_define('_SUBSCRIPTIONS_MY',"Mine abonnementer");
jr_define('_SUBSCRIPTIONS_HRENEW',"Fornye");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Fornyelse av abonnement");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Du har allerede abonnert, vennligst kjøp en fornyelse i stedet.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Rediger abonnementspakke");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Skriv inn de første bokstavene i brukernavnet og du vil se en rullegardin med brukernavn. Klikk på et brukernavn for å velge det.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Denne abonnementspakken er ikke lenger tilgjengelig, så den kan ikke fornyes, vennligst vurder å oppgradere den.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Du abonnerer ikke på denne pakken, så du kan ikke fornye den.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Det er ingen fornyelsesalternativer for denne pakken");
jr_define('_SUBSCRIPTIONS_CANCEL',"Avbryt abonnement");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Frekvens (dager)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Abonnementlengde i dager");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Fornyelser ikke tillatt for denne pakken.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Fornyelsespris");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Sett dette til 0 for å deaktivere fornyelser for denne pakken eller angi en pris for fornyelsen");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Pakkealternativer");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Pakkedetaljer");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Din abonnementspakke");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Abonnementspakken din inkluderer ikke tilgang til denne funksjonen. For å bruke denne funksjonen, må du oppgradere abonnementet ditt.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Abonnementet ditt har utløpt og alle oppføringene dine har blitt avpublisert. Oppføringene dine er ikke lenger synlige for gjester, og du vil ikke lenger kunne motta online bestillinger fra nettstedet vårt. For å fortsette å bruke tjenestene våre, publiser oppføringene dine og begynn å motta online bestillinger, vennligst logg inn på kontoen din og kjøp en fornyelse." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Ditt abonnement på" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"har utløpt" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Dette er et varsel for å informere deg om at abonnementet ditt snart utløper. For å fortsette å bruke tjenestene våre, vennligst logg inn på kontoen din og kjøp en fornyelse." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Abonnementspakker" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Navn" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Beskrivelse" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Publisert" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Frekvens" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Pris" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Forretningsgrense" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Maksimalt antall virksomheter som kan legges til med denne abonnementspakken" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Abonner" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Bruk abonnementshåndteringsfunksjonalitet" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Beklager, men den pakke-ID-en blir ikke gjenkjent." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Du ser ikke ut til å ha fylt ut kontoopplysningene dine ennå. For å liste eiendommen din på nettstedet, må du fylle ut kontodetaljene dine før vi kan gå videre." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Du har brukt alle eiendomsplasser som er tilgjengelige i abonnementspakken din, så du vil ikke kunne opprette noen nye oppføringer. Vennligst oppgrader pakken hvis du vil opprette flere oppføringer." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Inntekt etter år/måned");
jr_define('_SUBSCRIPTION_WARNING',"Du har aktivert abonnementer, men ser ut til at du ikke har opprettet noen abonnementspakker ennå. Eiere vil ikke kunne registrere eiendommer på nettstedet ditt før minst én abonnementspakke er opprettet.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API-tilgang" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Du kan få tilgang til denne funksjonen ved å oppgradere til " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Abonnementspakke. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Oppgrader');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Abonnert');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Innstillinger for abonnementsgateway');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Du abonnerer for øyeblikket ikke på noen abonnementspakker. Vennligst abonner på en pakke for å fortsette å bruke tjenestene våre.');
