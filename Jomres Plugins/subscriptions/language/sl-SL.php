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



jr_define('_SUBSCRIPTIONS_ACTIVE',"Aktiven");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Ni aktivno");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Stanje plačila");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Raven");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Uredi naročnino");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Pošlji e-pošto z opomnikom o poteku naročnine?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Pošlji e-pošto z opomnikom");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"dni pred potekom naročnine");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Pošlji e-pošto, ko je naročnina potekla?");
jr_define('_SUBSCRIPTIONS_MY',"Moje naročnine");
jr_define('_SUBSCRIPTIONS_HRENEW',"Obnovi");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Obnova naročnine");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Naročili ste se že, raje kupite podaljšanje.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Uredi naročniški paket");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Vnesite prvih nekaj črk uporabniškega imena in videli boste spustni meni z uporabniškimi imeni. Kliknite uporabniško ime, da ga izberete.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Ta naročniški paket ni več na voljo, zato ga ni mogoče obnoviti, razmislite o nadgradnji.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Niste naročeni na ta paket, zato ga ne morete obnoviti.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Za ta paket ni možnosti podaljšanja");
jr_define('_SUBSCRIPTIONS_CANCEL',"Prekliči naročnino");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Pogostost (dni)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Dolžina naročnine v dnevih");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Obnovitve niso dovoljene za ta paket.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Cena podaljšanja");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Nastavite to na 0, da onemogočite podaljšanje za ta paket ali vnesite ceno za podaljšanje");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Možnosti paketa");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Podrobnosti o paketu");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Vaš naročniški paket");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Vaš naročniški paket ne vključuje dostopa do te funkcije. Če želite uporabljati to funkcijo, boste morali nadgraditi svojo naročnino.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Vaša naročnina je potekla in vsi vaši oglasi so bili preklicani. Vaši oglasi niso več vidni gostom in ne boste mogli več prejemati spletnih rezervacij z našega spletnega mesta. Če želite še naprej uporabljati naše storitve, objavite svoje objave in začnite prejemati spletne rezervacije, se prijavite v svoj račun in kupite podaljšanje." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Vaša naročnina na");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"je potekel");
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"To je obvestilo, da vas obveščamo, da bo vaša naročnina kmalu potekla. Če želite še naprej uporabljati naše storitve, se prijavite v svoj račun in kupite obnovitev." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Naročniški paketi");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Ime");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Opis");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Objavljeno");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Frekvenca");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Cena");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Poslovna omejitev");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Največje število podjetij, ki jih je mogoče dodati s tem naročniškim paketom");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Naroči se");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Uporabi funkcijo upravljanja z naročnino" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Oprostite, vendar ta ID paketa ni prepoznan." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Zdi se, da še niste izpolnili podatkov o vašem računu. Če želite navesti svojo lastnino na spletnem mestu, morate izpolniti podatke o računu, preden lahko nadaljujemo." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Izkoristili ste vse prostore za lastnosti, ki so na voljo v vašem naročniškem paketu, zato ne boste mogli ustvariti novih vnosov. Prosimo, nadgradite svoj paket, če želite ustvariti več seznamov." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Prihodek po letu/mesecu");
jr_define('_SUBSCRIPTION_WARNING',"Omogočili ste naročnine, vendar izgleda, da še niste ustvarili nobenega naročniškega paketa. Lastniki ne bodo mogli registrirati lastnosti na vašem spletnem mestu, dokler ni ustvarjen vsaj en naročniški paket.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"Dostop do API-ja");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Do te funkcije lahko dostopate z nadgradnjo na " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Naročniški paket. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Nadgradnja');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Naročen');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Nastavitve naročniškega prehoda');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Trenutno niste naročeni na noben naročniški paket. Če želite še naprej uporabljati naše storitve, se naročite na paket.');
