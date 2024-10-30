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
jr_define('_SUBSCRIPTIONS_ACTIVE',"Aktív");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Nem aktív");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Fizetési állapot");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Szint");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Feliratkozás szerkesztése");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"E-mail küldése az előfizetés lejáratára emlékeztető?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Emlékeztető e-mail küldése");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"napokkal az előfizetés lejárta előtt");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"E-mail küldése, ha az előfizetés lejárt?");
jr_define('_SUBSCRIPTIONS_MY',"Saját előfizetéseim");
jr_define('_SUBSCRIPTIONS_HRENEW',"Megújítás");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Előfizetés megújítása");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Már előfizetett, kérjük, vásároljon helyette megújítást.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Előfizetési csomag szerkesztése");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Írja be a felhasználónév első néhány betűjét, és megjelenik egy legördülő menü a felhasználónevekkel. Kattintson a felhasználónévre a kiválasztásához.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Ez az előfizetési csomag már nem elérhető, ezért nem lehet megújítani, kérjük, fontolja meg a frissítését.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Ön nem iratkozott fel erre a csomagra, így nem tudja megújítani.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Nincs megújítási lehetőség ehhez a csomaghoz");
jr_define('_SUBSCRIPTIONS_CANCEL',"Feliratkozás törlése");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Gyakoriság (nap)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Előfizetés időtartama napokban");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"A csomag megújítása nem engedélyezett.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Megújítási ár");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Állítsa ezt 0-ra a csomag megújításának letiltásához, vagy adjon meg egy árat a megújításhoz");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Csomagbeállítások");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Csomag részletei");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Az Ön előfizetési csomagja");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Az előfizetési csomagja nem tartalmazza a hozzáférést ehhez a szolgáltatáshoz. A funkció használatához frissítenie kell az előfizetését.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Előfizetése lejárt, és az összes adatlap közzététele visszavonásra került. Adatait többé nem láthatják a vendégek, és többé nem fog tudni fogadni online foglalásokat webhelyünkről. Szolgáltatásaink használatának folytatásához tegye közzé adatait, és kezdje el az online foglalások fogadását, kérjük, jelentkezzen be fiókjába, és vásároljon megújítást." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Az Ön előfizetése itt:" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"lejárt" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Ezzel az értesítéssel tudatjuk, hogy előfizetése hamarosan lejár. Szolgáltatásaink használatának folytatásához jelentkezzen be fiókjába, és vásároljon megújítást." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Előfizetési csomagok" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Név" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Leírás" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Közzétéve" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Gyakoriság" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Ár" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Üzleti korlát" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Az előfizetési csomaggal hozzáadható vállalkozások maximális száma" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Feliratkozás" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Előfizetés-kezelési funkció használata" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Sajnáljuk, de a csomagazonosító nem ismerhető fel." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Úgy tűnik, még nem adta meg a fiók adatait. Ahhoz, hogy ingatlanja megjelenjen az oldalon, ki kell töltenie fiókjának adatait, mielőtt továbblépnénk." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Az előfizetési csomagban elérhető összes tulajdoni helyet felhasználta, így nem fog tudni új bejegyzéseket létrehozni. Kérjük, frissítse csomagját, ha további bejegyzéseket szeretne létrehozni." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Jövedelem év/hónap szerint");
jr_define('_SUBSCRIPTION_WARNING',"Engedélyezte az előfizetéseket, de úgy tűnik, még nem hozott létre előfizetési csomagokat. A tulajdonosok nem tudnak ingatlanokat regisztrálni a webhelyen, amíg legalább egy előfizetési csomag létre nem jön.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API hozzáférés" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Ezt a funkciót a következőre való frissítéssel érheti el");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Előfizetési csomag. " );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Frissítés');
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Feliratkozott');
jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Előfizetési átjáró beállításai');
jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Jelenleg nincs előfizetve egyetlen előfizetési csomagra sem. Szolgáltatásaink használatának folytatásához kérjük, iratkozzon fel egy csomagra.');
