<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define('_SUBSCRIPTIONS_ACTIVE',"Aktīvs");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Nav aktīvs");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Maksājuma statuss");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Līmenis");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Rediģēt abonementu");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Sūtīt atgādinājuma e-pasta ziņojumu par abonementa termiņa beigām?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Sūtīt atgādinājuma e-pastu");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"dienas pirms abonementa derīguma termiņa beigām");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Sūtīt e-pastu, kad abonementa termiņš beidzies?");
jr_define('_SUBSCRIPTIONS_MY',"Mani abonementi");
jr_define('_SUBSCRIPTIONS_HRENEW',"Atjaunot");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Abonementa atjaunošana");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Jūs jau esat abonējis, lūdzu, tā vietā iegādājieties atjaunošanu.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Rediģēt abonementa pakotni");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Ierakstiet dažus pirmos lietotājvārda burtus un jūs redzēsiet nolaižamo izvēlni ar lietotājvārdiem. Noklikšķiniet uz lietotājvārda, lai to atlasītu.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Šī abonementa pakotne vairs nav pieejama, tāpēc to nevar atjaunot, lūdzu, apsveriet iespēju to jaunināt.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Jūs neesat abonējis šo pakotni, tāpēc nevarat to atjaunot.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Šai pakotnei nav atjaunošanas iespēju");
jr_define('_SUBSCRIPTIONS_CANCEL',"Atcelt abonementu");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Biežums (dienas)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Abonēšanas ilgums dienās");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Šai pakotnei nav atļauta atjaunošana.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Atjaunošanas cena");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Iestatiet šo uz 0, lai atspējotu šīs pakotnes atjaunošanu vai ievadiet atjaunošanas cenu");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Pakotnes opcijas");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Pakas informācija");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Jūsu abonementa pakotne");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Jūsu abonementa pakotnē nav iekļauta piekļuve šai funkcijai. Lai izmantotu šo funkciju, jums būs jājaunina abonements.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Jūsu abonements ir beidzies, un visu jūsu ierakstu publicēšana ir atcelta. Jūsu ieraksti vairs nav redzami viesiem, un jūs vairs nevarēsit saņemt tiešsaistes rezervācijas no mūsu vietnes. Lai turpinātu izmantot mūsu pakalpojumus, publicējiet savus ierakstus un sāciet saņemt tiešsaistes rezervācijas, lūdzu, piesakieties savā kontā un iegādājieties atjaunošanu." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Jūsu abonements uz" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"ir beidzies derīguma termiņš" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Šis ir paziņojums, lai informētu, ka jūsu abonements drīz beigsies. Lai turpinātu izmantot mūsu pakalpojumus, lūdzu, piesakieties savā kontā un iegādājieties atjaunošanu." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Abonēšanas pakotnes" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Nosaukums" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Apraksts" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Publicēts" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Biežums" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Cena" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Uzņēmējdarbības limits" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Maksimālais uzņēmumu skaits, ko var pievienot ar šo abonēšanas pakotni" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Abonēt" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_USE', "Izmantot abonementu apstrādes funkcionalitāti");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Atvainojiet, bet šis pakotnes ID nav atpazīts." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Šķiet, ka jūs vēl neesat aizpildījis sava konta informāciju. Lai vietnē iekļautu savu īpašumu, mums ir jāaizpilda sava konta informācija, pirms mēs varam turpināt." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Jūs esat izmantojis visas abonēšanas pakotnē pieejamās īpašuma vietas, tāpēc nevarēsit izveidot jaunus ierakstus. Lūdzu, jauniniet savu pakotni, ja vēlaties izveidot vairāk ierakstu." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Ienākumi pēc gada/mēneša");
jr_define('_SUBSCRIPTION_WARNING',"Jūs esat iespējojis abonementus, bet izskatās, ka vēl neesat izveidojis nevienu abonēšanas pakotni. Īpašnieki nevarēs reģistrēt īpašumus jūsu vietnē, kamēr nebūs izveidota vismaz viena abonēšanas pakotne.");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API piekļuve");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Šai funkcijai varat piekļūt, jauninot uz " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Abonementa pakotne. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Jaunināt');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Abonēts');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Abonementa vārtejas iestatījumi');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Jūs pašlaik neesat abonējis nevienu abonēšanas pakotni. Lūdzu, abonējiet pakotni, lai turpinātu izmantot mūsu pakalpojumus.');
