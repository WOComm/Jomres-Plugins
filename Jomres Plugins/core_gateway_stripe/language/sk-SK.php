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
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Táto brána Stripe je navrhnutá špeciálne tak, aby vám ako správcovi stránky umožňovala prijímať časť platieb realizovaných správcom nehnuteľnosti v čase rezervácie. Predtým, ako ju budete môcť použiť, musíte najskôr nastaviť vlastnú integráciu s programom Stripe. Pripojte sa. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Dokumentáciu k tomuto doplnku nájdete tu. </a> <br/> Ak na tejto stránke kliknete na položku Uložiť, aby tento doplnok fungoval bez problémov  všetky ostatné brány budú deaktivované </ strong> Predtým, ako začnete, sa uistite, že ste prešli na svoju stránku Stripe Connect a uviedli, že nastavujete platformu. Keď to urobíte, nastavte si účet podľa pokynov na obrazovke. Predtým, ako môžu manažéri prepojiť svoj účet s vami musíte navštíviť Nastavenia> Pripojiť nastavenia a v oblasti \"Nastavenia protokolu OAuth\" povoliť protokol OAuth pre štandardné účty a potom kliknite na položku Uložiť (poznámka, budete to musieť urobiť v testovacom aj živom režime). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Spojte sa s nami!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Zaregistrovali ste sa, ale pripojenie ešte nie je dokončené. Musíte prepojiť svoj účet Stripe s naším webom. Keď to bude hotové, môžete pridať všetky svoje vlastnosti na náš web a začať prijímať rezervácie. . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Vitajte v");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Predtým, ako začnete nastavovať svoje vlastníctvo, musíte nás prepojiť so svojim účtom Stripe. Začnite kliknutím na odkaz.");

jr_define ('STRIPE_SETUP_INFO', "Teraz potrebujeme prepojiť váš účet s naším, čo nám umožní prijímať platby vo vašom mene, takže kliknutím na tlačidlo Pripojiť sa dostanete do Stripe, kde môžete potvrdiť pripojenie.");
jr_define ('STRIPE_SETUP_DONE', "Už ste s nami prepojení, viac tu nie je čo robiť! Zatvorte toto okno a môžeme pokračovať v podnikaní.");
jr_define ('STRIPE_SETUP_THANKS', "Ďakujeme, že ste sa s nami spojili! Teraz môžete toto okno zavrieť.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Odpojte svoj účet.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Účet odpojený, toto okno môžete teraz zavrieť.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "ID klienta Stripe Connect");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Svoje ID klienta Stripe môžete získať z <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Panela> Nastavenia> Pripojiť. API klávesy sú pod možnosťou ponuky pre vývojárov. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Uistite sa, že ste nastavili svoj URI presmerovania v <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Pripojiť> Nastavenia </a> to <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "tajný kľúč");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "verejný kľúč");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Vaša provízia");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Táto provízia sa vyberá z platby odoslanej správcovi nehnuteľnosti pri rezervácii. Spoločnosť Stripe ju potom vloží na váš účet Stripe. <br/> Toto je percento provízie, za ktorú budete správcom nehnuteľnosti účtovať ich rezervácie. Vaša provízia sa účtuje na základe CELÝCH nákladov na rezerváciu, nie na základe hodnoty vkladu. <br/> Bez ohľadu na to, pre čo túto hodnotu nastavíte, odporúčame vám nakonfigurovať konfiguráciu stránky -> Rezervačný formulár -> Minimálny vklad, ktorý bude najmenej dvojnásobok tohto čísla, takže ak chcete účtovať províziu 10%, mali by ste vložiť minimálny vklad 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Toto je percento, ktoré vám spoločnosť Stripe účtuje za platby na vašom webe. V súčasnosti účtujú 1,4% za európske karty a 2,9% za neeurópske karty. Tento údaj je potrebný na určenie cien pri rezervácii a čas platby. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Stripe Fee non-euro");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "číslo karty");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Expiration (MM/YY)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Billing Zip");

jr_define ('STRIPE_PAYMENT_FORM_SECURE', "zabezpečený platobný formulár");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Fakturačné údaje");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Podrobnosti o karte");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "meno držiteľa karty");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Zaplatiť teraz");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Zaplatiť teraz");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Ulica je povinná a nemôže byť prázdna');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Ulica musí mať viac ako 6 a menej ako 96 znakov');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Mesto je povinné a nemôže byť prázdne');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Zip je povinný a nemôže byť prázdny');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'PSČ musí mať viac ako 3 a menej ako 12 znakov');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'E -mailová adresa je povinná a nemôže byť prázdna');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Vstup nie je platná e -mailová adresa');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'E -mail musí mať viac ako 6 a menej ako 65 znakov');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'meno držiteľa karty je povinné a nemôže byť prázdne');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'meno držiteľa karty musí mať viac ako 6 a menej ako 70 znakov');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Číslo kreditnej karty je povinné a nemôže byť prázdne');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Číslo kreditnej karty je neplatné');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'mesiac exspirácie je požadovaný');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'mesiac exspirácie môže obsahovať iba číslice');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Vypršaný rok je požadovaný');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Rok vypršania platnosti môže obsahovať iba číslice');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'cvv je povinný údaj a nemôže byť prázdny');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'hodnota nie je platným CVV');

jr_define ('STRIPE_PAYMENT_FAILED', "Ospravedlňujeme sa, v tejto chvíli sa nám nepodarilo spracovať vašu platbu.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Skúste to znova");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Platba bola odmietnutá.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Príliš veľa požiadaviek odoslaných do rozhrania API príliš rýchlo");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "do Stripeovho API boli dodané neplatné parametre");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Autentifikácia pomocou API Stripe zlyhala");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Sieťová komunikácia s Stripe zlyhala (vypadlo vám internetové pripojenie?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Vyskytla sa nezachytená chyba");