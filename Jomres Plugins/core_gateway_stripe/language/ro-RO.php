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
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Acest gateway Stripe este conceput special pentru a vă permite, în calitate de manager de site, să primiți o parte din plățile efectuate către administratorii de proprietăți la momentul rezervării. Înainte de a putea fi utilizată, trebuie să vă configurați mai întâi propria integrare cu Stripe Conectați-vă. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Documentația pentru acest plugin poate fi găsită aici. </a> <br/> Dacă faceți clic pe Salvați pe această pagină, pentru a activa acest plugin să funcționeze perfect  toate celelalte gateway-uri vor fi dezactivate </ puternic> Înainte de a începe, asigurați-vă că ați accesat pagina dvs. Stripe Connect și ați indicat că configurați o platformă. Odată ce ați făcut acest lucru, urmați instrucțiunile de pe ecran pentru a vă configura contul. Înainte ca managerii să își poată conecta contul cu al dvs. trebuie să accesați Setări> Setări conectare și în zona \"Setări OAuth\" activați OAuth pentru conturi standard și apoi faceți clic pe Salvare (notă, va trebui să faceți acest lucru atât în ​​modurile Test, cât și în modul Live). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Conectează-te cu noi!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "V-ați înregistrat, dar conexiunea nu este încă completă. Trebuie să vă conectați contul Stripe la site-ul nostru. Odată ce ați făcut acest lucru, puteți adăuga toate proprietățile dvs. pe site-ul nostru și puteți începe să faceți rezervări . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Bun venit la");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Înainte de a începe să vă configurați proprietățile, trebuie să ne conectați la contul dvs. Stripe. Faceți clic pe link pentru a începe.");

jr_define ('STRIPE_SETUP_INFO', "Acum trebuie să vă conectăm contul la al nostru, acest lucru ne va permite să efectuăm plăți în numele dvs., așa că faceți clic pe butonul Conectare pentru a fi dus la Stripe unde puteți confirma conexiunea.");
jr_define ('STRIPE_SETUP_DONE', "Sunteți deja conectat cu noi, nimic mai mult de făcut aici! Închideți această fereastră și să continuăm cu afacerea de a face afaceri.");
jr_define ('STRIPE_SETUP_THANKS', "Vă mulțumim că v-ați conectat cu noi! Puteți închide această fereastră acum.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Deconectați-vă contul.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Cont deconectat, puteți închide această fereastră acum.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Stripe Connect ID client");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Puteți obține codul dvs. Stripe Client din <a href='https://dashboard.stripe.com/account/applications/settings' target='__blank'> Tabloul de bord> Setări> Conectare. API. tastele se află sub opțiunea meniului Dezvoltatori. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Vă rugăm să vă asigurați că setați URI-ul de redirecționare în <a href='https://dashboard.stripe.com/account/applications/settings' target='__blank'> Conectare> Setări </a> la <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Cheie secretă");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Cheie publică");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Comisia dvs.");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Acest comision este preluat din plata trimisă administratorului proprietății la momentul rezervării. Este apoi plasat în contul dvs. Stripe de către Stripe. <br/> Acesta este procentul de comision pentru care veți percepe administratorii de proprietăți pentru rezervările lor. Comisionul dvs. se percepe în funcție de costul INTEGRAL al rezervării, nu de valoarea depozitului. <br/> Indiferent de setarea acestei valori, vă recomandăm să configurați Configurarea site-ului -> Formularul de rezervare -> Cifra depozitului minim să fie cel puțin de două ori această cifră, deci dacă doriți să percepeți 10% comision, atunci ar trebui să faceți ca Depozitul minim să fie de 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Acesta este procentul pe care Stripe îl percepe pentru efectuarea plăților pe site-ul dvs. În prezent, acestea percep 1,4% pentru cardurile europene și 2,9% pentru cardurile non-europene. Această cifră este necesară pentru stabilirea prețurilor la rezervare și timpul de plată. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Stripe Fee non-euro");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Număr card");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Expirare (LL / AA)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Zip de facturare");
    
jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Formular de plată securizat");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Detalii de facturare");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Detalii card");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Numele titularului cardului");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Plătește acum");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "A plăti acum");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Strada este obligatorie și nu poate fi goală');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Strada trebuie să aibă mai mult de 6 și mai puțin de 96 de caractere');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Orașul este obligatoriu și nu poate fi gol');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Codul zip este obligatoriu și nu poate fi gol');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'Codul zip trebuie să aibă mai mult de 3 și mai puțin de 12 caractere');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'Adresa de e-mail este obligatorie și nu poate fi goală');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Introducerea nu este o adresă de e-mail validă');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'E-mailul trebuie să aibă mai mult de 6 și mai puțin de 65 de caractere');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Numele titularului cardului este obligatoriu și nu poate fi gol');
jr_define ("STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH", "Numele titularului cardului trebuie să aibă mai mult de 6 și mai puțin de 70 de caractere");
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Numărul cardului de credit este obligatoriu și nu poate fi gol');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Numărul cardului de credit este nevalid');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'Este necesară luna de expirare');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'Luna de expirare poate conține numai cifre');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Anul de expirare este necesar');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Anul de expirare poate conține numai cifre');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'CV-ul este obligatoriu și nu poate fi gol');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Valoarea nu este un CVV valid');

jr_define ('STRIPE_PAYMENT_FAILED', "Ne pare rău, nu am putut procesa plata dvs. în acest moment.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Vă rugăm să încercați din nou");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Plata a fost refuzată.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Prea multe solicitări făcute către API prea repede");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Parametrii nevalizi au fost furnizați API-ului Stripe");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Autentificarea cu API-ul Stripe a eșuat");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Comunicarea în rețea cu Stripe a eșuat (conexiunea dvs. la internet a renunțat?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "A apărut o eroare neaprinsă");