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


jr_define ('STRIPE_TITLE', "Stripe");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Denne Stripe -gateway er specielt designet til at give dig som stedleder mulighed for at modtage en del af de betalinger, der er foretaget til ejendomsadministratorer på bookingtidspunktet. Inden den kan bruges, skal du først konfigurere din egen integration med Stripe Tilslut. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'> Dokumentation for dette plugin findes her. </a> <br/> Hvis du klikker på Gem på denne side, vil dette plugin fungere problemfrit  alle andre gateways deaktiveres </ strong> Inden du går i gang, skal du sørge for at have gået til din Stripe Connect -side og angivet, at du opretter en platform. Når det er gjort, skal du følge instruktionerne på skærmen for at konfigurere din konto. Før ledere kan forbinde deres konto med din dig skal besøge Indstillinger> Tilslut indstillinger og i \"OAuth -indstillinger\" -området aktiveret OAuth for standardkonti og klik derefter på Gem (bemærk, du bliver nødt til at gøre dette i både test- og live -tilstand). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Opret forbindelse til os!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Du har registreret, men forbindelsen er ikke fuldført endnu. Du skal forbinde din Stripe -konto med vores websted. Når det er gjort, kan du tilføje alle dine ejendomme til vores websted og begynde at tage bookinger . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Velkommen til");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Før du kan begynde at konfigurere dine ejendomme, skal du forbinde os med din Stripe -konto. Klik på linket for at komme i gang.");

jr_define ('STRIPE_SETUP_INFO', "Vi har nu brug for at forbinde din konto til vores, dette giver os mulighed for at tage betalinger på dine vegne, så klik på knappen Tilslut for at blive ført til Stripe, hvor du kan bekræfte forbindelsen.");
jr_define ('STRIPE_SETUP_DONE', "Du er allerede forbundet med os, intet mere at gøre her! Luk dette vindue, og lad os fortsætte med at drive forretning.");
jr_define ('STRIPE_SETUP_THANKS', "Tak fordi du kontaktede os! Du kan lukke dette vindue nu.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Afbryd din konto.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Kontoen er afbrudt, du kan lukke dette vindue nu.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Stripe Connect Client ID");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Du kan få dit Stripe Client ID fra dit <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> betjeningspanel> Indstillinger> Connect. API. nøgler er under menuen Udviklere. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Sørg for, at du indstiller din Omdirigerings -URI i <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Forbind> Indstillinger </a> til <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Hemmelig nøgle");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Offentlig nøgle");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Din kommission");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Denne kommission trækkes fra den betaling, der blev sendt til ejendomsadministratoren ved bookingtidspunktet. Den indsættes derefter på din Stripe -konto af Stripe. <br/> Dette er procentdelen af ​​provision, du vil opkræve ejendomsadministratorer for deres bestillinger. Din provision debiteres baseret på HELE omkostningerne ved reservationen, ikke depositumsværdien. <br/> Uanset hvad du angiver denne værdi til, anbefaler vi, at du konfigurerer webstedskonfiguration -> reservationsformular -> minimumindbetalingstal til at være mindst to gange dette tal, så hvis du vil opkræve 10% kommission, skal du gøre minimumsindbetaling til 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Dette er den procentdel, Stripe opkræver dig for at foretage betalinger på dit websted. I øjeblikket opkræver de 1,4% for europæiske kort og 2,9% for ikke-europæiske kort. Dette tal er påkrævet for at bestemme priser ved booking og betalingstid. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Stripe Fee non-euro");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Kortnummer");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Udløb (MM/ÅÅ)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Faktureringszip");
jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Sikker betalingsformular");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Faktureringsoplysninger");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Kortoplysninger");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Kortholderens navn");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Betal nu");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "At betale nu");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Gaden er påkrævet og må ikke være tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Gaden skal være mere end 6 og mindre end 96 tegn lang');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Byen er påkrævet og må ikke være tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Zip er påkrævet og må ikke være tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'ZIP skal være mere end 3 og mindre end 12 tegn lang');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'E -mailadressen er påkrævet og må ikke være tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Input er ikke en gyldig e -mail -adresse');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'E -mailen skal være mere end 6 og mindre end 65 tegn lang');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Kortholderens navn er påkrævet og må ikke være tomt');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'Kortholderens navn skal være mere end 6 og mindre end 70 tegn');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Kreditkortnummeret er påkrævet og må ikke være tomt');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Kreditkortnummeret er ugyldigt');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'Udløbsmåneden er påkrævet');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'Udløbsmåneden kan kun indeholde cifre');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Udløbsåret er påkrævet');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Udløbsåret kan kun indeholde cifre');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'Cvv er påkrævet og må ikke være tom');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Værdien er ikke en gyldig CVV');

jr_define ('STRIPE_PAYMENT_FAILED', "Beklager, vi kunne ikke behandle din betaling på nuværende tidspunkt.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Prøv venligst igen");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Betaling blev afvist.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "For mange anmodninger er sendt til API for hurtigt");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Ugyldige parametre blev leveret til Stripes API");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Godkendelse med Stripes API mislykkedes");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Netværkskommunikation med Stripe mislykkedes (er din internetforbindelse afbrudt?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Der opstod en uopfanget fejl");