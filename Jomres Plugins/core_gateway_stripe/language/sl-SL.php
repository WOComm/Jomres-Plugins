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
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Ta prehod Stripe je zasnovan posebej, da lahko kot upravitelj spletnega mesta prejmete del plačil upraviteljem nepremičnin ob rezervaciji. Preden ga lahko uporabite, morate najprej nastaviti lastno integracijo s storitvijo Stripe Poveži se. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Dokumentacijo za ta vtičnik najdete tukaj. </a> <br/> Če kliknete Shrani na tej strani, da omogočite nemoteno delovanje vtičnika  vsi drugi prehodi bodo onemogočeni </ močno> Preden začnete, se prepričajte, da ste obiskali stran Stripe Connect in navedli, da nastavljate platformo. Ko to storite, sledite navodilom na zaslonu za nastavitev računa. Preden upravitelji lahko svoj račun povežejo z vašim morate obiskati Nastavitve> Nastavitve povezave in v območju \"Nastavitve OAuth\" omogočiti OAuth za standardne račune in nato kliknite Shrani (upoštevajte, to boste morali storiti v preskusnem in v živo). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Poveži se z nami!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Registrirali ste se, vendar povezava še ni končana. Račun Stripe morate povezati z našim spletnim mestom. Ko to storite, lahko dodate vse svoje nepremičnine na naše spletno mesto in začnete z rezervacijami");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Dobrodošli v");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Preden začnete nastavljati svoje nepremičnine, nas morate povezati s svojim računom Stripe. Za začetek kliknite povezavo. ");

jr_define ('STRIPE_SETUP_INFO', "Zdaj moramo vaš račun povezati z našim, kar nam bo omogočilo, da v vašem imenu sprejemamo plačila, zato kliknite gumb Poveži, da se odpre na Stripe, kjer lahko potrdite povezavo.");
jr_define ('STRIPE_SETUP_DONE', "Ste že povezani z nami, tukaj nimate več kaj početi! Zaprite to okno in nadaljujmo s poslovanjem.");
jr_define ('STRIPE_SETUP_THANKS', "Hvala, ker ste se povezali z nami! To okno lahko zdaj zaprete.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Prekini povezavo z računom.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Račun odklopljen, to okno lahko zaprete zdaj.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "ID odjemalca Stripe Connect");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "ID odjemalca Stripe lahko dobite na <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> nadzorni plošči> Nastavitve> Poveži. API tipke so pod možnostjo menija Razvijalci. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Poskrbite, da boste svoj URI za preusmeritev nastavili v <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Poveži> Nastavitve </a> na <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Skrivni ključ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Javni ključ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Vaša komisija");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Ta provizija se vzame iz plačila, poslanega upravitelju nepremičnine v času rezervacije. Stripe ga nato položi v vaš račun Stripe. <br/> To je odstotek provizije, ki jo boste upraviteljem nepremičnine zaračunali za Vaše provizije se zaračunavajo na podlagi CELOTNIH stroškov rezervacije, ne pa na vrednosti depozita. <br/> Karkoli nastavite na to vrednost, priporočamo, da konfigurirate konfiguracijo spletnega mesta -> obrazec za rezervacijo -> znesek minimalnega depozita vsaj dvakrat več od tega zneska, zato, če želite zaračunati 10% provizije, naj bo minimalni depozit 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Provizija za črtasto evropsko");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "To je odstotek, ki vam ga Stripe zaračuna za plačila na vašem spletnem mestu. Trenutno zaračunavajo 1,4% za evropske kartice in 2,9% za neevropske kartice. Ta številka je potrebna za določanje cen pri rezervacijah in čas plačila. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Pristojbina za črtasto neeuro");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Številka kartice");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Potek (MM/LL)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Poštna številka");

jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Obrazec za varno plačilo");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Podrobnosti o obračunu");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Podrobnosti o kartici");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Ime imetnika kartice");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Plačaj zdaj");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Plačati zdaj");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Ulica je obvezna in ne more biti prazna');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Ulica mora biti dolga več kot 6 in manj kot 96 znakov');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Mesto je obvezno in ne sme biti prazno');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Poštna številka je obvezna in ne more biti prazna');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'Zadrga mora biti dolga več kot 3 in manj kot 12 znakov');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'E -poštni naslov je obvezen in ne more biti prazen');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Vnos ni veljaven e -poštni naslov');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'E -poštno sporočilo mora biti daljše od 6 in manj kot 65 znakov');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Ime imetnika kartice je obvezno in ne more biti prazno');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'Ime imetnika kartice mora biti daljše od 6 in manj kot 70 znakov');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Številka kreditne kartice je obvezna in ne sme biti prazna');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Številka kreditne kartice je neveljavna');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'Mesec veljavnosti je obvezen');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'Mesec veljavnosti lahko vsebuje samo številke');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Leto veljavnosti je obvezno');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Leto veljavnosti lahko vsebuje samo številke');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'CVV je obvezen in ne more biti prazen');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Vrednost ni veljaven CVV');

jr_define ('STRIPE_PAYMENT_FAILED', "Žal trenutno nismo mogli obdelati vašega plačila.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Poskusite znova");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Plačilo je bilo zavrnjeno.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Preveč zahtev za API vloženih prehitro");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Neveljavni parametri so bili posredovani API -ju Stripe");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Preverjanje pristnosti z API -jem Stripe ni uspelo");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Omrežna komunikacija s Stripom ni uspela (je vaša internetna povezava prekinjena?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Prišlo je do ujete napake");