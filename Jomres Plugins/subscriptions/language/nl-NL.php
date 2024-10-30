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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################

jr_define('_SUBSCRIPTIONS_ACTIVE',"Actief");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Niet actief");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Betalingsstatus");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Niveau");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Abonnement bewerken");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Stuur een herinneringsmail voor het verlopen van het abonnement?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Stuur herinneringsmail");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"dagen voordat het abonnement verloopt");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"E-mail verzenden wanneer abonnement is verlopen?");
jr_define('_SUBSCRIPTIONS_MY',"Mijn abonnementen");
jr_define('_SUBSCRIPTIONS_HRENEW',"Vernieuwen");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Abonnement verlengen");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Je bent al geabonneerd, koop in plaats daarvan een verlenging.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Bewerk abonnementspakket");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Typ de eerste paar letters van de gebruikersnaam en u ziet een vervolgkeuzelijst met gebruikersnamen. Klik op een gebruikersnaam om deze te selecteren.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Dit abonnementspakket is niet langer beschikbaar, dus het kan niet worden verlengd, overweeg om het te upgraden.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"U bent niet geabonneerd op dit pakket, dus u kunt het niet verlengen.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Er zijn geen verlengingsopties voor dit pakket");
jr_define('_SUBSCRIPTIONS_CANCEL',"Abonnement opzeggen");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Frequentie (dagen)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Abonnementsduur in dagen");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Verlengingen niet toegestaan ​​voor dit pakket.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Verlengingsprijs");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Stel dit in op 0 om verlengingen voor dit pakket uit te schakelen of voer een prijs in voor de verlenging");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Pakket opties");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Pakketdetails");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Uw abonnementspakket");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Uw abonnementspakket omvat geen toegang tot deze functie. Om deze functie te gebruiken, moet u uw abonnement upgraden.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Uw abonnement is verlopen en al uw vermeldingen zijn niet meer gepubliceerd. Uw vermeldingen zijn niet meer zichtbaar voor gasten en u kunt geen online boekingen meer van onze website ontvangen. Om onze diensten te blijven gebruiken, publiceert u uw aanbiedingen en begin met het ontvangen van online boekingen, log in op uw account en koop een verlenging." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Uw abonnement op" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"is verlopen" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Dit is een melding om u te laten weten dat uw abonnement binnenkort verloopt. Als u onze services wilt blijven gebruiken, logt u in op uw account en koopt u een verlenging.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Abonnement pakketten" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Naam" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Beschrijving" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Gepubliceerd" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Frequentie");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Prijs" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Bedrijfslimiet");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Maximum aantal bedrijven dat kan worden toegevoegd met dit abonnementspakket" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Abonneren" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Gebruik functionaliteit voor het afhandelen van abonnementen");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Sorry, maar die pakket-ID wordt niet herkend." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Het lijkt erop dat u uw accountgegevens nog niet heeft ingevuld. Om uw woning op de site te plaatsen, moeten we uw accountgegevens invullen voordat we verder kunnen gaan." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"U heeft alle beschikbare plaatsen in uw abonnementspakket gebruikt, dus u kunt geen nieuwe aanbiedingen maken. Upgrade uw pakket als u meer aanbiedingen wilt maken." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Inkomen per jaar/maand");
jr_define('_SUBSCRIPTION_WARNING',"Je hebt abonnementen ingeschakeld, maar het lijkt erop dat je nog geen abonnementspakketten hebt gemaakt. Eigenaren kunnen geen eigendommen op je site registreren totdat er ten minste één abonnementspakket is gemaakt.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API-toegang");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"U krijgt toegang tot deze functie door te upgraden naar de ");
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Abonnementspakket. ");
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Upgraden');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Geabonneerd');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Abonnementsgateway-instellingen');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'U bent momenteel niet geabonneerd op een abonnementspakket. Abonneer u op een pakket om onze services te blijven gebruiken.');
