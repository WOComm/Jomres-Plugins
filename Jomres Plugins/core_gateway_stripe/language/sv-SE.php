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

jr_define ('STRIPE_TITLE', "Stripe");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Denna Stripe -gateway är utformad specifikt för att du som platschef ska kunna ta emot en del av de betalningar som gjorts till fastighetsförvaltare vid bokningstidpunkten. Innan den kan användas måste du först konfigurera din egen integration med Stripe Anslut. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Dokumentation för det här pluginprogrammet hittar du här. </a> <br/> Om du klickar på Spara på den här sidan, för att göra det här pluginet sömlöst  kommer alla andra gateways att inaktiveras </ strong> Innan du sätter igång, se till att du har gått till din Stripe Connect -sida och angett att du installerar en plattform. När det har gjorts följ instruktionerna på skärmen för att konfigurera ditt konto. Innan chefer kan ansluta sitt konto till ditt du måste besöka Inställningar> Anslut inställningar och i området \"OAuth -inställningar\" aktiveras OAuth för standardkonton och klicka sedan på Spara (notera, du måste göra detta i både Test- och Live -lägen). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Anslut oss!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Du har registrerat dig men anslutningen är inte klar än. Du måste ansluta ditt Stripe -konto till vår webbplats. När det är klart kan du lägga till alla dina fastigheter till vår webbplats och börja ta bokningar . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Välkommen till");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Innan du kan börja konfigurera din egendom (er) måste du ansluta oss till ditt Stripe -konto. Klicka på länken för att komma igång.");

jr_define ('STRIPE_SETUP_INFO', "Vi måste nu ansluta ditt konto till vårt, detta gör att vi kan ta emot betalningar för dina räkning så klicka på knappen Anslut för att tas till Stripe där du kan bekräfta anslutningen.");
jr_define ('STRIPE_SETUP_DONE', "Du är redan ansluten till oss, inget mer att göra här! Stäng det här fönstret och låt oss fortsätta att göra affärer.");
jr_define ('STRIPE_SETUP_THANKS', "Tack för att du kontaktade oss! Du kan stänga det här fönstret nu.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Koppla bort ditt konto.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Account disconnected, you can close this window now.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Stripe Connect Client ID");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Du kan få ditt Stripe Client ID från ditt <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> instrumentpanel> Inställningar> Anslut. API. nycklarna finns under menyalternativet Utvecklare. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Se till att du ställer in din omdirigerings -URI i <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Anslut> Inställningar </a> till <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Hemlig nyckel");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Offentlig nyckel");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Din kommission");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Denna provision tas från betalningen som skickades till fastighetsförvaltaren vid bokningstillfället. Den läggs sedan in på ditt Stripe -konto av Stripe. <br/> Detta är procentsatsen du kommer att debitera fastighetsförvaltare för deras bokningar. Din provision debiteras baserat på HELA kostnaden för bokningen, inte insättningsvärdet. <br/> Oavsett vad du ställer in detta värde rekommenderar vi att du konfigurerar webbplatskonfiguration -> bokningsformulär -> Minsta insättningsvärde minst två gånger denna siffra, så om du vill ta ut 10% provision, bör du göra Minsta insättning till 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Detta är den procentandel som Stripe tar ut för betalningar på din webbplats. För närvarande tar de ut 1,4% för europeiska kort och 2,9% för icke-europeiska kort. Denna siffra krävs för att bestämma priser vid bokning och betalningstid. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Stripe Fee non-euro");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Kortnummer");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Utgångsdatum (MM/ÅÅ)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Faktureringszipp");

jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Säkert betalningsformulär");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Faktureringsinformation");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Kortuppgifter");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Kortinnehavarens namn");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Betala nu");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Att betala nu");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Gatan krävs och får inte vara tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'The street must be more than 6 and less than 96 characters long');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Staden krävs och får inte vara tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Zipen krävs och får inte vara tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'Zipen måste vara mer än 3 och mindre än 12 tecken lång');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'E -postadressen krävs och kan inte vara tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Inmatningen är inte en giltig e -postadress');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'E -postadressen måste vara mer än 6 och kortare än 65 tecken');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Kortinnehavarens namn krävs och kan inte vara tomt');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'Kortinnehavarens namn måste vara mer än 6 och kortare än 70 tecken');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Kreditkortsnumret krävs och kan inte vara tomt');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Kreditkortsnumret är ogiltigt');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'Utgångsmånaden krävs');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'Utgångsmånaden kan endast innehålla siffror');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Utgångsåret krävs');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Utgångsåret kan endast innehålla siffror');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'CV: n krävs och kan inte vara tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Värdet är inte ett giltigt CVV');

jr_define ('STRIPE_PAYMENT_FAILED', "Vi kunde tyvärr inte behandla din betalning just nu.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Försök igen");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Betalning avvisades.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "För många förfrågningar har gjorts för snabbt för API");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Ogiltiga parametrar levererades till Stripes API");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Autentisering med Stripes API misslyckades");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Nätverkskommunikation med Stripe misslyckades (har din internetanslutning avbrutits?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Ett okänt fel uppstod");
