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


jr_define('_SUBSCRIPTIONS_ACTIVE',"Activ");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Nu este activ");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Starea plății");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Nivel");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Editați abonament");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Trimite e-mail de memento de expirare a abonamentului?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Trimite e-mail de memento");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"cu zile înainte ca abonamentul să expire");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Trimite e-mail când abonamentul a expirat?");
jr_define('_SUBSCRIPTIONS_MY',"Abonamentele mele");
jr_define('_SUBSCRIPTIONS_HRENEW',"Reînnoiți");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Reînnoire abonament");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"V-ați abonat deja, vă rugăm să cumpărați o reînnoire.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Editați pachetul de abonament");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Tastați primele litere ale numelui de utilizator și veți vedea un meniu derulant cu nume de utilizator. Faceți clic pe un nume de utilizator pentru a-l selecta.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Acest pachet de abonament nu mai este disponibil, așa că nu poate fi reînnoit, vă rugăm să luați în considerare upgrade-ul.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Nu sunteți abonat la acest pachet, așa că nu îl puteți reînnoi.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Nu există opțiuni de reînnoire pentru acest pachet");
jr_define('_SUBSCRIPTIONS_CANCEL',"Anulați abonamentul");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Frecvența (zile)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Durata abonamentului în zile");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Reînnoiri nu sunt permise pentru acest pachet.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Preț de reînnoire");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Setați acest lucru la 0 pentru a dezactiva reînnoirile pentru acest pachet sau introduceți un preț pentru reînnoire");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Opțiuni pachet");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Detalii pachet");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Pachetul dvs. de abonament");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Pachetul dvs. de abonament nu include acces la această caracteristică. Pentru a utiliza această caracteristică, va trebui să vă actualizați abonamentul.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Abonamentul dvs. a expirat și toate înregistrările dvs. au fost nepublicate. Listările dvs. nu mai sunt vizibile pentru oaspeți și nu veți mai putea primi rezervări online de pe site-ul nostru. Pentru a continua să utilizați serviciile noastre, publicați înregistrările dvs. și începeți să primiți rezervări online, vă rugăm să vă conectați la contul dvs. și să cumpărați o reînnoire." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Abonamentul dvs. la" );
jr_define('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"a expirat");
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Aceasta este o notificare pentru a vă anunța că abonamentul dvs. va expira în curând. Pentru a continua să utilizați serviciile noastre, vă rugăm să vă conectați la contul dvs. și să cumpărați o reînnoire." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Pachete de abonament" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Nume" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Descriere" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Publicat" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Frecvență" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Preț" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Limita de afaceri");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Numărul maxim de companii care pot fi adăugate cu acest pachet de abonament" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Abonare" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Utilizați funcționalitatea de gestionare a abonamentelor" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Ne pare rău, dar acel ID de pachet nu este recunoscut." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Se pare că nu ați completat încă detaliile contului dvs. Pentru a vă lista proprietatea pe site, trebuie să completați detaliile contului înainte de a putea merge mai departe." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Ați folosit toate spațiile de proprietate disponibile în pachetul dvs. de abonament, așa că nu veți putea crea nicio listă nouă. Vă rugăm să actualizați pachetul dacă doriți să creați mai multe înregistrări." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Venit pe an/luna");
jr_define('_SUBSCRIPTION_WARNING',"Ați activat abonamentele, dar se pare că nu ați creat încă niciun pachet de abonament. Proprietarii nu vor putea să înregistreze proprietăți pe site-ul dvs. până când nu este creat cel puțin un pachet de abonament.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"Acces API" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Puteți accesa această funcție făcând upgrade la " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Pachet de abonament. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Upgrade');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Abonat');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Setări gateway abonament');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'În prezent nu sunteți abonat la niciun pachet de abonament. Vă rugăm să vă abonați la un pachet pentru a continua să utilizați serviciile noastre.');
