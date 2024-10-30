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
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Niveau");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Rediger abonnement");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Send e-mail påmindelse om abonnementsudløb?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Send påmindelsesmail");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"dage før abonnementet udløber");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Send e-mail, når abonnementet udløb?");
jr_define('_SUBSCRIPTIONS_MY',"Mine abonnementer");
jr_define('_SUBSCRIPTIONS_HRENEW',"Forny");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Fornyelse af abonnement");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Du har allerede abonneret, køb venligst en fornyelse i stedet.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Rediger abonnementspakke");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Skriv de første par bogstaver i brugernavnet og du vil se en rullemenu med brugernavne. Klik på et brugernavn for at vælge det.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Denne abonnementspakke er ikke længere tilgængelig, så den kan ikke fornyes. Overvej venligst at opgradere den.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Du abonnerer ikke på denne pakke, så du kan ikke forny den.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Der er ingen fornyelsesmuligheder for denne pakke");
jr_define('_SUBSCRIPTIONS_CANCEL',"Annuller abonnement");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Frekvens (dage)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Abonnementlængde i dage");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Fornyelser ikke tilladt for denne pakke.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Fornyelsespris");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Sæt denne til 0 for at deaktivere fornyelser for denne pakke eller indtast en pris for fornyelsen");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Pakkeindstillinger");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Pakkedetaljer");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Din abonnementspakke");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Din abonnementspakke inkluderer ikke adgang til denne funktion. For at bruge denne funktion skal du opgradere dit abonnement.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Dit abonnement er udløbet, og alle dine fortegnelser er blevet fjernet. Dine fortegnelser er ikke længere synlige for gæster, og du vil ikke længere være i stand til at modtage online reservationer fra vores hjemmeside. For at fortsætte med at bruge vores tjenester, udgiv dine fortegnelser og begynde at modtage online bookinger, log venligst ind på din konto og køb en fornyelse." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Dit abonnement på" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"er udløbet" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Dette er en meddelelse for at fortælle dig, at dit abonnement snart udløber. For at fortsætte med at bruge vores tjenester skal du logge ind på din konto og købe en fornyelse." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Abonnementspakker" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Navn" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Beskrivelse" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Udgivet" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Frekvens" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Pris" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Forretningsgrænse" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Maksimalt antal virksomheder, der kan tilføjes med denne abonnementspakke" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Abonner" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Brug abonnementshåndteringsfunktionalitet" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Beklager, men det pakke-id er ikke genkendt." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Du ser ikke ud til at have udfyldt dine kontooplysninger endnu. For at få vist din ejendom på webstedet, skal du udfylde dine kontooplysninger, før vi kan gå videre." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Du har brugt alle tilgængelige ejendomspladser i din abonnementspakke, så du vil ikke være i stand til at oprette nye opslag. Opgrader venligst din pakke, hvis du gerne vil oprette flere opslag." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Indkomst efter år/måned");
jr_define('_SUBSCRIPTION_WARNING',"Du har aktiveret abonnementer, men det ser ud til, at du ikke har oprettet nogen abonnementspakker endnu. Ejere vil ikke være i stand til at registrere ejendomme på dit websted, før mindst én abonnementspakke er oprettet.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API-adgang" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Du kan få adgang til denne funktion ved at opgradere til " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Abonnementspakke. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Opgradering');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Tilmeldt');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Indstillinger for abonnementsgateway');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Du abonnerer i øjeblikket ikke på nogen abonnementspakker. Tilmeld dig venligst en pakke for at fortsætte med at bruge vores tjenester.');
