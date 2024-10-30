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
jr_define('_SUBSCRIPTIONS_ACTIVE',"Ակտիվ");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Ակտիվ չէ");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Վճարման կարգավիճակ");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Մակարդակ");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Խմբագրել բաժանորդագրությունը");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Ուղարկել բաժանորդագրության ժամկետի ավարտի հիշեցման նամակ?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Ուղարկել հիշեցման նամակ");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"Բաժանորդագրության ժամկետը կլրանա օրեր առաջ");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Ուղարկել էլ-նամակ, երբ բաժանորդագրության ժամկետը լրանա?");
jr_define('_SUBSCRIPTIONS_MY',"Իմ բաժանորդագրությունները");
jr_define('_SUBSCRIPTIONS_HRENEW',"Նորացնել");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Բաժանորդագրության նորացում");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Դուք արդեն բաժանորդագրվել եք, փոխարենը գնեք նորացում:");
jr_define('_SUBSCRIPTIONS_HEDIT',"Խմբագրել բաժանորդագրության փաթեթը");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Մուտքագրեք օգտվողի անվան առաջին մի քանի տառերը և կտեսնեք օգտվողի անուններով բացվող ցանկ: Սեղմեք օգտվողի անվան վրա այն ընտրելու համար:");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Բաժանորդագրության այս փաթեթն այլևս հասանելի չէ, ուստի այն հնարավոր չէ թարմացնել, խնդրում ենք մտածել այն թարմացնելու մասին:");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Դուք բաժանորդագրված չեք այս փաթեթին, ուստի չեք կարող թարմացնել այն:");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Այս փաթեթի համար նորացման տարբերակներ չկան");
jr_define('_SUBSCRIPTIONS_CANCEL',"Չեղարկել բաժանորդագրությունը");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Հաճախականություն (օրեր)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Բաժանորդագրության տևողությունը օրերով");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Այս փաթեթի համար նորացումներ չեն թույլատրվում:");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Վերականգնման գին");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Սահմանել 0' այս փաթեթի թարմացումներն անջատելու կամ նորացման գինը մուտքագրելու համար");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Փաթեթի ընտրանքներ");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Փաթեթի մանրամասներ");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Ձեր բաժանորդագրության փաթեթը");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Ձեր բաժանորդագրության փաթեթը չի ներառում մուտք դեպի այս հնարավորությունը: Այս հատկությունն օգտագործելու համար դուք պետք է թարմացնեք ձեր բաժանորդագրությունը:");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Ձեր բաժանորդագրության ժամկետը լրացել է, և ձեր բոլոր ցանկերը չհրապարակված են: Ձեր ցուցակներն այլևս տեսանելի չեն հյուրերին, և դուք այլևս չեք կարողանա առցանց ամրագրումներ ստանալ մեր կայքից: Մեր ծառայություններից օգտվելը շարունակելու համար հրապարակեք ձեր ցուցակները և սկսեք առցանց ամրագրումներ ստանալ, խնդրում ենք մուտք գործել ձեր հաշիվ և գնել նորացում:");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Ձեր բաժանորդագրությունը ժամը" );
jr_define('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"սպառվել է");
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Սա ծանուցում է, որպեսզի իմանաք, որ ձեր բաժանորդագրության ժամկետը շուտով կլրանա: Մեր ծառայություններից օգտվելը շարունակելու համար մուտք գործեք ձեր հաշիվ և գնեք նորացում:");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Բաժանորդագրության փաթեթներ" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Անուն" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Նկարագրություն" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Հրապարակված" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Հաճախականություն" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Գին" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Բիզնեսի սահմանաչափ" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Բիզնեսների առավելագույն թիվը, որոնք կարող են ավելացվել այս բաժանորդային փաթեթով" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Բաժանորդագրվել" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Օգտագործել բաժանորդագրությունների մշակման գործառույթը" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Ներողություն, բայց փաթեթի այդ ID-ն չի ճանաչվել:");
jr_define('_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Դուք կարծես թե դեռ չեք լրացրել ձեր հաշվի տվյալները: Ձեր գույքը կայքում ցուցակագրելու համար մենք պետք է լրացնեք ձեր հաշվի տվյալները, նախքան հետագա գնալը:");
jr_define('_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Դուք օգտագործել եք ձեր բաժանորդագրության փաթեթում հասանելի բոլոր գույքի տեղանքները, ուստի չեք կարողանա որևէ նոր ցուցակ ստեղծել: Խնդրում ենք թարմացնել ձեր փաթեթը, եթե ցանկանում եք ստեղծել ավելի շատ ցուցակներ:");
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Եկամուտ ըստ տարվա/ամիս");
jr_define('_SUBSCRIPTION_WARNING',"Դուք միացրել եք բաժանորդագրությունները, բայց կարծես դեռ չեք ստեղծել բաժանորդագրության փաթեթներ: Սեփականատերերը չեն կարողանա գրանցել սեփականություն ձեր կայքում մինչև չստեղծվի առնվազն մեկ բաժանորդային փաթեթ:");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS', "API Access" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Դուք կարող եք մուտք գործել այս հատկությունը՝ թարմացնելով « );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2', Բաժանորդագրության փաթեթ. " );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Թարմացնել');
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Բաժանորդագրված');
jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Բաժանորդագրության դարպասի կարգավորումներ');
jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Դուք ներկայումս բաժանորդագրված չեք ոչ մի փաթեթի: Խնդրում ենք բաժանորդագրվել փաթեթի, որպեսզի շարունակեք օգտվել մեր ծառայություններից:');
