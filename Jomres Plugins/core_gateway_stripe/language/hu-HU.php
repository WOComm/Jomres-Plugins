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

jr_define ('STRIPE_TITLE', "Csík");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Ezt a Stripe -átjárót kifejezetten úgy tervezték, hogy Ön, mint webhelykezelő, megkaphassa a tulajdonkezelőknek a foglaláskor fizetett összegek egy részét. Használat előtt először be kell állítania saját integrációját a Stripe -vel Csatlakozás. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Mielőtt elkezdené, győződjön meg arról, hogy elérte a Stripe Connect oldalt, és jelezte, hogy platformot állít be.</a> Ha ez megtörtént, kövesse a képernyőn megjelenő utasításokat a fiók beállításához. Mielőtt a kezelők összekapcsolhatják a fiókjukat Önnel fel kell keresnie a Beállítások> Csatlakozási beállítások elemet, és az \"OAuth beállítások\" területen engedélyezni kell az OAuth szabványos fiókok számára majd kattintson a Mentés gombra (vegye figyelembe, hogy ezt teszt és élő módban is meg kell tennie). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Csatlakozz hozzánk!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Regisztráltál, de a kapcsolat még nem fejeződött be. Össze kell kapcsolnod Stripe -fiókodat a weboldalunkkal. Ha ez megtörtént, felveheted az összes ingatlanodat a webhelyünkre, és elkezdheted a foglalásokat.");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Üdvözöljük");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Mielőtt hozzákezdene a tulajdon (ok) beállításához, össze kell kapcsolnia minket a Stripe -fiókjával. A kezdéshez kattintson a linkre.");

jr_define ('STRIPE_SETUP_INFO', "Most össze kell kapcsolnunk a fiókját a miénkkel, ez lehetővé teszi számunkra, hogy fizetéseket fogadjunk el az Ön nevében, ezért kattintson a Csatlakozás gombra a Stripe -hez való eljutáshoz, ahol megerősítheti a kapcsolatot.");
jr_define ('STRIPE_SETUP_DONE', "Ön már kapcsolatban van velünk, nincs több tennivaló! Zárja be ezt az ablakot, és folytassuk az üzleti tevékenységet.");
jr_define ('STRIPE_SETUP_THANKS', "Köszönjük, hogy kapcsolatba lépett velünk! Most bezárhatja ezt az ablakot.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Fiók leválasztása.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Fiók leválasztva, most bezárhatja ezt az ablakot.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Stripe Connect ügyfél -azonosító");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "A Stripe ügyfél -azonosítót a <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Irányítópult> Beállítások> Csatlakozás API -ból kaphatja meg gombok a Fejlesztők menüpont alatt találhatók. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Kérjük, győződjön meg arról, hogy az átirányítási URI -t a <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Csatlakozás> Beállítások </a> oldalon állította be <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Titkos kulcs");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Nyilvános kulcs");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Az Ön bizottsága");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Ezt a jutalékot a foglaláskor az ingatlankezelőnek küldött befizetésből vonják le. Ezt követően a Stripe elhelyezi a Stripe -fiókjában. <br/> Ez a jutalék százaléka, amelyet az ingatlankezelőktől számítanak fel a jutalékot a foglalás TELJES költsége alapján számítják fel, nem pedig a letét értékét. <br/> Bármit is állít be erre az értékre, azt javasoljuk, hogy konfigurálja a Webhely konfiguráció -> Foglalási űrlap -> Minimális letét értéket ennek a számnak legalább kétszerese, tehát ha 10% jutalékot akar felszámítani, akkor a minimális befizetést 20% -nak kell tennie. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Ez az a százalék, amelyet a Stripe számít fel a webhelyén történő fizetésért. Jelenleg 1,4% -ot számítanak fel az európai kártyákért, és 2,9% -ban a nem európai kártyákért. Ez a szám szükséges a foglaláskor és az árak meghatározásakor. fizetési idő. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Stripe Fee non-euro");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Kártya száma");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Lejárat (HH/ÉÉ)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Számlázási irányítószám");
    
jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Biztonságos fizetési űrlap");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Számlázási részletek");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Kártya részletek");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Kártyabirtokos neve");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Fizess most");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Fizetni most");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Az utca kötelező, és nem lehet üres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Az utcának 6 -nál hosszabbnak és 96 karakternél rövidebbnek kell lennie');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'A város kötelező, és nem lehet üres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'A zip kötelező, és nem lehet üres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'A zip -nek 3 -nál többnek és 12 karakternél rövidebbnek kell lennie');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'Az e -mail cím kötelező, és nem lehet üres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'A bevitel nem érvényes e -mail cím');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'Az e -mailnek 6 -nál hosszabbnak és 65 karakternél rövidebbnek kell lennie');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'A kártya tulajdonosának neve kötelező, és nem lehet üres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'A kártyatulajdonos nevének 6 -nál több és 70 karakternél rövidebbnek kell lennie');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'A hitelkártya száma kötelező, és nem lehet üres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'A hitelkártya száma érvénytelen');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'A lejárati hónap kötelező');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'A lejárati hónap csak számjegyeket tartalmazhat');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'A lejárati év kötelező');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'A lejárati év csak számjegyeket tartalmazhat');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'A cvv kötelező, és nem lehet üres');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Az érték nem érvényes CVV');

jr_define ('STRIPE_PAYMENT_FAILED', "Sajnáljuk, jelenleg nem tudtuk feldolgozni a befizetését.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Kérjük, próbálja újra");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "A fizetés elutasítva.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Túl sok kérés érkezett túl gyorsan az API -hoz");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Érvénytelen paramétereket adtunk a Stripe API -jához");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "A Stripe API -val történő hitelesítés sikertelen");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "A hálózati kommunikáció a Stripe -el nem sikerült (megszakadt az internetkapcsolat?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Elkapott hiba történt");