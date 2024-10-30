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


jr_define('STRIPE_TITLE',"Stripe");
jr_define('STRIPE_CONNECT_CONFIG_INFO',"Deze Stripe-gateway is speciaal ontworpen om u als sitebeheerder in staat te stellen een deel van de betalingen aan Property Managers te ontvangen op het moment van boeking. Voordat het kan worden gebruikt, moet u eerst uw eigen integratie met Stripe instellen <a href='http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class= 'btn btn-primary'>Documentatie voor deze plug-in is hier te vinden.</a><br/>Als u op deze pagina op Opslaan klikt, zodat deze plug-in naadloos werkt alle andere gateways worden uitgeschakeld</a><br/> sterk> Voordat je begint, moet je ervoor zorgen dat je naar je Stripe Connect-pagina bent gegaan en hebt aangegeven dat je een platform aan het opzetten bent. Volg daarna de instructies op het scherm om je account in te stellen. Voordat managers hun account aan die van jou kunnen koppelen, moet naar Instellingen > Instellingen verbinden en in het gebied \"OAuth-instellingen\" OAuth inschakelen voor standaardaccounts en klik vervolgens op Opslaan (let op, u moet dit zowel in de Test- als in de Live-modus doen). ");

jr_define('STRIPE_REGISTER_CONNECT',"Maak contact met ons!");
jr_define('STRIPE_REGISTER_CONNECT_BLURB',"Je hebt je geregistreerd, maar de verbinding is nog niet voltooid. Je moet je Stripe-account koppelen aan onze website. Zodra dat is gebeurd, kun je al je eigendommen toevoegen aan onze site en beginnen met het aannemen van boekingen .");

jr_define('STRIPE_REGISTER_WELCOME_EMAIL_TITLE',"Welkom bij ");
jr_define('STRIPE_REGISTER_WELCOME_EMAIL_BLURB',"Voordat u kunt beginnen met het opzetten van uw eigendom(men), moet u ons verbinden met uw Stripe-account. Klik op de link om te beginnen.");

jr_define('STRIPE_SETUP_INFO',"We moeten nu uw account aan die van ons koppelen, hierdoor kunnen we namens u betalingen aannemen, dus klik op de knop Verbinden om naar Stripe te gaan waar u de verbinding kunt bevestigen.");
jr_define('STRIPE_SETUP_DONE',"U bent al met ons verbonden, u hoeft hier niets meer te doen! Sluit dit venster en laten we verder gaan met zakendoen.");
jr_define('STRIPE_SETUP_THANKS',"Bedankt dat je contact met ons hebt opgenomen! Je kunt dit venster nu sluiten.");
jr_define('STRIPE_SETUP_DISCONNECT',"Verbreek je account.");
jr_define('STRIPE_SETUP_DISCONNECTED',"Account verbroken, u kunt dit venster nu sluiten.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID',"Stripe Connect-client-ID");
jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC',"U kunt uw Stripe-client-ID ophalen van uw <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>Dashboard > Instellingen > Connect . API sleutels bevinden zich onder de menuoptie Ontwikkelaars.</a>");
jr_define('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL',"Zorg ervoor dat u uw omleidings-URI instelt in <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>Verbinden > Instellingen</a> naar <br/> ");

jr_define('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY',"Geheime sleutel");
jr_define('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY',"Openbare sleutel");

jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION',"Uw Commissie");
jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC',"Deze commissie wordt afgetrokken van de betaling die op het moment van boeken naar de property manager is gestuurd. Het wordt vervolgens door Stripe op je Stripe-account geplaatst. <br/> Dit is het percentage commissie dat je aan property managers in rekening brengt hun boekingen. Uw commissie wordt in rekening gebracht op basis van de VOLLEDIGE kosten van de boeking, niet de aanbetalingswaarde. <br/> Waar u deze waarde ook op instelt, we raden u aan om Siteconfiguratie -> Boekingsformulier -> Minimum aanbetalingscijfer te configureren ten minste tweemaal dit cijfer, dus als u 10% commissie in rekening wilt brengen, moet u een minimale storting van 20% maken.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO',"Stripe Fee Europees");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC',"Dit is het percentage dat Stripe in rekening brengt voor het doen van betalingen op uw site. Momenteel rekenen ze 1,4% voor Europese kaarten en 2,9% voor niet-Europese kaarten. Dit cijfer is vereist voor het bepalen van prijzen bij het boeken en betalingstermijn.");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO',"Stripe Fee niet-euro");

jr_define('STRIPE_PAYMENT_FORM_CREDITCARD',"Kaartnummer");
jr_define('STRIPE_PAYMENT_FORM_EXPIRATION',"Vervaldatum (MM/YY)");
jr_define('STRIPE_PAYMENT_FORM_CVC',"CVC");
jr_define('STRIPE_PAYMENT_FORM_ZIP',"Zip voor facturering");

jr_define('STRIPE_PAYMENT_FORM_SECURE',"Beveiligd betalingsformulier");
jr_define('STRIPE_PAYMENT_FORM_BILLINGDETAILS',"Factuurgegevens");
jr_define('STRIPE_PAYMENT_FORM_CARDDETAILS',"Kaartgegevens");
jr_define('STRIPE_PAYMENT_FORM_HOLDER',"Naam kaarthouder");
jr_define('STRIPE_PAYMENT_FORM_PAYNOW',"Betaal nu");
jr_define('STRIPE_PAYMENT_FORM_TOPAY',"Om nu te betalen");

jr_define('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY','De straat is verplicht en mag niet leeg zijn');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH','De straat moet meer dan 6 en minder dan 96 tekens lang zijn');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY','De stad is verplicht en mag niet leeg zijn');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY','De zip is vereist en mag niet leeg zijn');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH','De zip moet langer zijn dan 3 en minder dan 12 tekens lang');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY','Het e-mailadres is verplicht en mag niet leeg zijn');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID','De invoer is geen geldig e-mailadres');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH','De e-mail moet langer zijn dan 6 en minder dan 65 tekens');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY','De naam van de kaarthouder is verplicht en mag niet leeg zijn');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH','De naam van de kaarthouder moet meer dan 6 en minder dan 70 tekens lang zijn');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY','Het creditcardnummer is vereist en mag niet leeg zijn');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID','Het creditcardnummer is ongeldig');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY','De vervalmaand is vereist');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS','De vervalmaand mag alleen cijfers bevatten');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY','Het vervaljaar is vereist');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS','Het vervaljaar mag alleen cijfers bevatten');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY','De cvv is vereist en mag niet leeg zijn');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID','De waarde is geen geldig CVV');

jr_define('STRIPE_PAYMENT_FAILED',"Sorry, we konden uw betaling op dit moment niet verwerken.");
jr_define('STRIPE_PAYMENT_TRY_AGAIN',"Probeer het opnieuw");

jr_define('STRIPE_PAYMENT_ERROR_DECLINED',"Betaling is geweigerd.");
jr_define('STRIPE_PAYMENT_ERROR_RATE_LIMIT',"Te veel verzoeken aan de API te snel gedaan");
jr_define('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS',"Ongeldige parameters werden geleverd aan Stripe's API");
jr_define('STRIPE_PAYMENT_ERROR_AUTH_FAILED',"Verificatie met Stripe's API mislukt");
jr_define('STRIPE_PAYMENT_ERROR_NETWORK_FAULT',"Netwerkcommunicatie met Stripe is mislukt (is uw internetverbinding weggevallen?)");
jr_define('STRIPE_PAYMENT_ERROR_UNCAUGHT',"Er is een niet-afgevangen fout opgetreden");