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
jr_define('_SUBSCRIPTIONS_EXPIRED',"Nicht aktiv");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Zahlungsstatus");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Stufe");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Abonnement bearbeiten");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Erinnerungs-E-Mail zum Ablauf des Abonnements senden?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Erinnerungs-E-Mail senden");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"Tage vor Ablauf des Abonnements");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"E-Mail senden, wenn das Abonnement abgelaufen ist?");
jr_define('_SUBSCRIPTIONS_MY',"Meine Abonnements");
jr_define('_SUBSCRIPTIONS_HRENEW',"Erneuern");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Abonnementverlängerung");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Sie haben sich bereits abonniert, kaufen Sie stattdessen bitte eine Verlängerung.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Abonnementpaket bearbeiten");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Geben Sie die ersten Buchstaben des Benutzernamens ein und Sie sehen eine Dropdown-Liste mit Benutzernamen. Klicken Sie auf einen Benutzernamen, um ihn auszuwählen.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Dieses Abonnementpaket ist nicht mehr verfügbar und kann daher nicht verlängert werden. Bitte erwägen Sie ein Upgrade.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Sie haben dieses Paket nicht abonniert, daher können Sie es nicht erneuern.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Es gibt keine Verlängerungsoptionen für dieses Paket");
jr_define('_SUBSCRIPTIONS_CANCEL',"Abonnement kündigen");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Häufigkeit (Tage)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Abonnementdauer in Tagen");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Verlängerungen sind für dieses Paket nicht erlaubt.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Verlängerungspreis");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Setzen Sie dies auf 0, um Verlängerungen für dieses Paket zu deaktivieren oder geben Sie einen Preis für die Verlängerung ein");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Paketoptionen");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Paketdetails");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Ihr Abonnementpaket");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Ihr Abonnementpaket beinhaltet keinen Zugriff auf diese Funktion. Um diese Funktion zu nutzen, müssen Sie Ihr Abonnement aktualisieren.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Ihr Abonnement ist abgelaufen und alle Ihre Einträge wurden nicht mehr veröffentlicht. Ihre Einträge sind für Gäste nicht mehr sichtbar und Sie können keine Online-Buchungen mehr von unserer Website erhalten. Um unsere Dienste weiterhin zu nutzen, veröffentlichen Sie Ihre Inserate und beginnen Sie, Online-Buchungen zu erhalten, loggen Sie sich bitte in Ihr Konto ein und kaufen Sie eine Verlängerung." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Ihr Abonnement bei" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"ist abgelaufen");
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Dies ist eine Benachrichtigung, um Sie darüber zu informieren, dass Ihr Abonnement bald abläuft. Um unsere Dienste weiterhin zu nutzen, melden Sie sich bitte bei Ihrem Konto an und kaufen Sie eine Verlängerung." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Abonnementpakete");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Name" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Beschreibung");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Veröffentlicht");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Frequenz");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Preis");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Geschäftslimit");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Maximale Anzahl von Unternehmen, die mit diesem Abonnementpaket hinzugefügt werden können" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Abonnieren");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Benutze die Abonnementverwaltungsfunktionalität");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Entschuldigung, aber diese Paket-ID wird nicht erkannt." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Sie scheinen Ihre Kontodaten noch nicht eingegeben zu haben. Um Ihre Unterkunft auf der Website aufzuführen, müssen Sie Ihre Kontodaten vervollständigen, bevor wir fortfahren können." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Sie haben alle verfügbaren Immobilienplätze in Ihrem Abonnementpaket verwendet, daher können Sie keine neuen Angebote erstellen. Bitte aktualisieren Sie Ihr Paket, wenn Sie weitere Angebote erstellen möchten." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Einkommen nach Jahr/Monat");
jr_define('_SUBSCRIPTION_WARNING',"Sie haben Abonnements aktiviert, aber anscheinend noch keine Abonnementpakete erstellt. Besitzer können keine Eigenschaften auf Ihrer Site registrieren, bis mindestens ein Abonnementpaket erstellt wurde.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API-Zugriff");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Sie können auf diese Funktion zugreifen, indem Sie ein Upgrade auf " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Abonnementpaket. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Upgrade');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Abonniert');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Abonnement-Gateway-Einstellungen');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Sie haben derzeit keine Abonnementpakete abonniert. Bitte abonnieren Sie ein Paket, um unsere Dienste weiterhin nutzen zu können.');

