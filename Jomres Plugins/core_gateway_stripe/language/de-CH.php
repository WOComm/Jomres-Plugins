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

jr_define('STRIPE_TITLE',"Streifen");
jr_define('STRIPE_CONNECT_CONFIG_INFO',"Dieses Stripe-Gateway wurde speziell entwickelt, damit Sie als Site-Manager einen Teil der Zahlungen erhalten, die zum Buchungszeitpunkt an Property-Manager geleistet werden. Bevor es verwendet werden kann, müssen Sie zuerst Ihre eigene Integration mit Stripe einrichten Verbinden <a href='http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class= 'btn btn-primary'>Dokumentation zu diesem Plugin finden Sie hier.</a><br/>Wenn Sie auf dieser Seite auf Speichern klicken, damit dieses Plugin reibungslos funktioniert, werden alle anderen Gateways deaktiviert</ stark> Bevor Sie beginnen, stellen Sie sicher, dass Sie zu Ihrer Stripe Connect-Seite gegangen sind und angegeben haben, dass Sie eine Plattform einrichten. Befolgen Sie anschließend die Anweisungen auf dem Bildschirm, um Ihr Konto einzurichten. Bevor Manager ihr Konto mit Ihrem verbinden können Sie muss auf Einstellungen > Verbindungseinstellungen gehen und im Bereich \"OAuth-Einstellungen\" OAuth für Standardkonten aktiviert haben und klicken Sie dann auf Speichern (beachten Sie, dass Sie dies sowohl im Test- als auch im Live-Modus tun müssen). ");

jr_define('STRIPE_REGISTER_CONNECT',"Verbinden Sie sich mit uns!");
jr_define('STRIPE_REGISTER_CONNECT_BLURB',"Sie haben sich registriert, aber die Verbindung ist noch nicht abgeschlossen. Sie müssen Ihr Stripe-Konto mit unserer Website verbinden. Danach können Sie alle Ihre Unterkünfte zu unserer Website hinzufügen und Buchungen annehmen .");

jr_define('STRIPE_REGISTER_WELCOME_EMAIL_TITLE',"Willkommen bei ");
jr_define('STRIPE_REGISTER_WELCOME_EMAIL_BLURB',"Bevor Sie mit der Einrichtung Ihrer Unterkunft(en) beginnen können, müssen Sie uns mit Ihrem Stripe-Konto verbinden. Klicken Sie auf den Link, um zu beginnen.");

jr_define('STRIPE_SETUP_INFO',"Wir müssen jetzt Ihr Konto mit unserem verbinden. Dadurch können wir Zahlungen in Ihrem Namen entgegennehmen. Klicken Sie also auf die Schaltfläche Verbinden, um zu Stripe zu gelangen, wo Sie die Verbindung bestätigen können.");
jr_define('STRIPE_SETUP_DONE',"Sie sind bereits mit uns verbunden, hier ist nichts mehr zu tun! Schließen Sie dieses Fenster und lassen Sie uns mit dem Geschäft beginnen.");
jr_define('STRIPE_SETUP_THANKS',"Vielen Dank für Ihre Kontaktaufnahme! Sie können dieses Fenster jetzt schließen.");
jr_define('STRIPE_SETUP_DISCONNECT',"Trenne dein Konto.");
jr_define('STRIPE_SETUP_DISCONNECTED',"Konto getrennt, Sie können dieses Fenster jetzt schließen.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID',"Stripe Connect Client-ID");
jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC',"Sie können Ihre Stripe-Client-ID von Ihrem <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>Dashboard > Einstellungen > Connect . API abrufen Schlüssel befinden sich unter der Menüoption \"Entwickler\".</a>");
jr_define('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL',"Bitte stellen Sie sicher, dass Sie Ihre Weiterleitungs-URI in <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>Verbinden > Einstellungen</a> festlegen zu <br/> ");

jr_define('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY',"Geheimer Schlüssel");
jr_define('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY',"Öffentlicher Schlüssel");

jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION',"Ihre Provision");
jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC',"Diese Provision wird von der Zahlung abgezogen, die zum Zeitpunkt der Buchung an den Hausverwalter gesendet wird. Sie wird dann von Stripe Ihrem Stripe-Konto gutgeschrieben. <br/> Dies ist der Prozentsatz der Provision, den Sie den Hausverwaltern berechnen ihre Buchungen. Ihre Provision wird auf der Grundlage der GESAMTEN Kosten der Buchung berechnet, nicht auf dem Wert der Anzahlung. <br/> Wie auch immer Sie diesen Wert festlegen, wir empfehlen, dass Sie Site-Konfiguration -> Buchungsformular -> Mindesteinzahlungsbetrag so konfigurieren mindestens das Doppelte dieser Zahl. Wenn Sie also eine Provision von 10 % verlangen möchten, sollten Sie eine Mindesteinzahlung von 20 % vornehmen.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO',"Stripe-Gebühr europäisch");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC',"Dies ist der Prozentsatz, den Stripe Ihnen für Zahlungen auf Ihrer Website berechnet. Derzeit werden 1,4 % für europäische Karten und 2,9 % für nicht-europäische Karten berechnet Zahlungsfrist.");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO',"Stripe-Gebühr nicht in Euro");

jr_define('STRIPE_PAYMENT_FORM_CREDITCARD',"Kartennummer");
jr_define('STRIPE_PAYMENT_FORM_EXPIRATION',"Ablauf (MM/YY)");
jr_define('STRIPE_PAYMENT_FORM_CVC',"CVC");
jr_define('STRIPE_PAYMENT_FORM_ZIP',"Rechnungszip");
jr_define('STRIPE_PAYMENT_FORM_SECURE',"Sicheres Zahlungsformular");
jr_define('STRIPE_PAYMENT_FORM_BILLINGDETAILS',"Rechnungsdetails");
jr_define('STRIPE_PAYMENT_FORM_CARDDETAILS',"Kartendetails");
jr_define('STRIPE_PAYMENT_FORM_HOLDER',"Name des Karteninhabers");
jr_define('STRIPE_PAYMENT_FORM_PAYNOW',"Jetzt bezahlen");
jr_define('STRIPE_PAYMENT_FORM_TOPAY',"Jetzt bezahlen");

jr_define('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY','Die Straße ist erforderlich und darf nicht leer sein');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH','Die Straße muss mehr als 6 und weniger als 96 Zeichen lang sein');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY','Die Stadt ist erforderlich und darf nicht leer sein');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY','Die Zip-Datei ist erforderlich und darf nicht leer sein');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH','Die Postleitzahl muss mehr als 3 und weniger als 12 Zeichen lang sein');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY','Die E-Mail-Adresse ist erforderlich und darf nicht leer sein');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID','Die Eingabe ist keine gültige E-Mail-Adresse');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH','Die E-Mail muss mehr als 6 und weniger als 65 Zeichen lang sein');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY','Der Name des Karteninhabers ist erforderlich und darf nicht leer sein');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH','Der Name des Karteninhabers muss mehr als 6 und weniger als 70 Zeichen lang sein');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY','Die Kreditkartennummer ist erforderlich und darf nicht leer sein');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID','Die Kreditkartennummer ist ungültig');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY','Der Ablaufmonat ist erforderlich');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS','Der Ablaufmonat darf nur Ziffern enthalten');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY','Das Ablaufjahr ist erforderlich');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS','Das Ablaufjahr darf nur Ziffern enthalten');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY','Der Lebenslauf ist erforderlich und darf nicht leer sein');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID','Der Wert ist kein gültiger CVV');

jr_define('STRIPE_PAYMENT_FAILED',"Leider konnten wir Ihre Zahlung derzeit nicht verarbeiten.");
jr_define('STRIPE_PAYMENT_TRY_AGAIN',"Bitte versuchen Sie es erneut");

jr_define('STRIPE_PAYMENT_ERROR_DECLINED',"Zahlung wurde abgelehnt.");
jr_define('STRIPE_PAYMENT_ERROR_RATE_LIMIT',"Zu viele Anfragen an die API zu schnell gestellt");
jr_define('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS',"Ungültige Parameter wurden an Stripes API übergeben");
jr_define('STRIPE_PAYMENT_ERROR_AUTH_FAILED',"Authentifizierung mit Stripes API fehlgeschlagen");
jr_define('STRIPE_PAYMENT_ERROR_NETWORK_FAULT',"Netzwerkkommunikation mit Stripe fehlgeschlagen (ist Ihre Internetverbindung abgebrochen?)");
jr_define('STRIPE_PAYMENT_ERROR_UNCAUGHT',"Ein nicht abgefangener Fehler ist aufgetreten");