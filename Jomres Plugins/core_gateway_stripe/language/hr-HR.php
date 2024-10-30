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
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Ovaj pristupni trak Stripe osmišljen je posebno da vam kao upravitelju web mjesta omogući primanje dijela plaćanja upraviteljima nekretnina u vrijeme rezervacije. Prije nego što ga možete upotrijebiti, najprije morate postaviti vlastitu integraciju sa Stripom Povežite se. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Dokumentaciju za ovaj dodatak možete pronaći ovdje. </a> <br/> Ako kliknete Spremi na ovoj stranici, da biste omogućili besprijekoran rad ovog dodatka  svi drugi pristupnici bit će onemogućeni </ jako> Prije početka provjerite jeste li otišli na svoju stranicu Stripe Connect i naznačili da postavljate platformu. Nakon što to učinite, slijedite upute na zaslonu za postavljanje svog računa. Prije nego što upravitelji mogu povezati svoj račun s vašim morate posjetiti Postavke> Postavke povezivanja i u području \"Postavke OAuth\" omogućiti OAuth za standardne račune a zatim kliknite Spremi (napomena, to ćete morati učiniti i u testnom i u živom načinu rada). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Povežite se s nama!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Registrirali ste se, ali veza još nije dovršena. Morate povezati svoj Stripe račun s našom web lokacijom. Nakon što to učinite, možete dodati sve svoje nekretnine na našu web stranicu i početi primati rezervacije . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Dobro došli u");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Prije nego što počnete postavljati svoje nekretnine, morate nas povezati sa svojim Stripe računom. Kliknite na vezu za početak.");

jr_define ('STRIPE_SETUP_INFO', "Sada moramo povezati vaš račun s našim, to će nam omogućiti da primamo plaćanja u vaše ime, pa kliknite gumb Poveži da biste bili preusmjereni na Stripe gdje možete potvrditi vezu.");
jr_define ('STRIPE_SETUP_DONE', "Već ste povezani s nama, ovdje nema više što učiniti! Zatvorite ovaj prozor i nastavimo s poslovanjem.");
jr_define ('STRIPE_SETUP_THANKS', "Hvala što ste se povezali s nama! Sada možete zatvoriti ovaj prozor.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Isključite svoj račun.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Račun je isključen, sada možete zatvoriti ovaj prozor.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "ID klijenta za Stripe Connect");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "ID klijenta Stripe možete dobiti sa <ahref='https://dashboard.stripe.com/account/applications/settings'target='_blank'> nadzorne ploče> Postavke> Povežite se. API tipke se nalaze pod opcijom izbornika Developers. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Provjerite jeste li postavili URI za preusmjeravanje na <ahref='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Poveži> Postavke </a> <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Tajni ključ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Javni ključ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Vaša provizija");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Ova provizija se uzima od plaćanja poslanog upravitelju nekretnine u vrijeme rezervacije. Stripe ga zatim polaže na vaš Stripe račun. <br/> Ovo je postotak provizije koju ćete upraviteljima nekretnina naplatiti za Vaše provizije naplaćuju se na temelju CIJELIH troškova rezervacije, a ne vrijednosti pologa. <br/> Na što god postavite ovu vrijednost, preporučujemo da konfigurirate konfiguraciju web lokacije -> obrazac za rezervaciju -> iznos minimalnog depozita najmanje dvostruko više od ove brojke, pa ako želite naplatiti 10% provizije, trebali biste učiniti da minimalni depozit bude 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Naknada za pruge u Europi");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Ovo je postotak koji vam Stripe naplaćuje za plaćanje na vašoj web lokaciji. Trenutačno naplaćuju 1,4% za europske kartice, a 2,9% za neeuropske kartice. Ta je brojka potrebna za određivanje cijena prilikom rezervacije i vrijeme plaćanja. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Naknada za prugu izvan eura");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Broj kartice");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Istek (MM/GG)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Zip za naplatu");

jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Siguran obrazac plaćanja");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Pojedinosti o naplati");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Pojedinosti o kartici");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Ime vlasnika kartice");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Platite odmah");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Platiti odmah");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Ulica je obavezna i ne može biti prazna');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Ulica mora imati više od 6 i manje od 96 znakova');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Grad je obavezan i ne može biti prazan');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Poštanski broj je obavezan i ne može biti prazan');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'Zip mora imati više od 3 i manje od 12 znakova');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'Adresa e -pošte je obavezna i ne može biti prazna');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Unos nije valjana adresa e -pošte');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'E -pošta mora imati više od 6 i manje od 65 znakova');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Ime vlasnika kartice je potrebno i ne može biti prazno');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'Ime vlasnika kartice mora biti duže od 6 i manje od 70 znakova');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Broj kreditne kartice je potreban i ne može biti prazan');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Broj kreditne kartice je nevažeći');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'Mjesec isteka je potreban');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'Mjesec isteka može sadržavati samo znamenke');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Godina isteka je potrebna');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Godina isteka može sadržavati samo znamenke');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'CVV je potreban i ne može biti prazan');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Vrijednost nije važeći CVV');

jr_define ('STRIPE_PAYMENT_FAILED', "Žao nam je, trenutno nismo mogli obraditi vašu uplatu.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Pokušajte ponovno");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Plaćanje je odbijeno.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Previše zahtjeva za API prebrzo");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Neispravni parametri isporučeni su u Stripe API");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Autentifikacija s API -jem za Stripe nije uspjela");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Mrežna komunikacija sa Stripe nije uspjela (je li vaša internetska veza prekinuta?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Došlo je do neshvaćene pogreške");