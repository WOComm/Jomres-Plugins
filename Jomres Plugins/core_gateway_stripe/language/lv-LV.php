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
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Šī Stripe vārteja ir īpaši izstrādāta, lai ļautu jums kā vietnes pārvaldniekam saņemt daļu no maksājumiem, kas veikti īpašuma pārvaldniekiem rezervācijas laikā. Lai to varētu izmantot, vispirms jāizveido sava integrācija ar Stripe Savienojiet. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Šī spraudņa dokumentāciju var atrast šeit. </a> <br/> Ja šajā lapā noklikšķināsit uz Saglabāt, lai spraudnis darbotos nevainojami  visas pārējās vārtejas tiks atspējotas </ strong> Pirms darba sākšanas pārliecinieties, vai esat atvēris lapu Stripe Connect un norādījis, ka veidojat platformu. Kad tas ir izdarīts, izpildiet ekrānā redzamos norādījumus, lai iestatītu savu kontu. Pirms pārvaldnieki var savienot savu kontu ar jums ir jāapmeklē Iestatījumi> Savienot iestatījumus un apgabalā \"OAuth settings\" ir iespējota OAuth standarta kontiem un pēc tam noklikšķiniet uz Saglabāt (ņemiet vērā, ka tas būs jādara gan testa, gan tiešraides režīmā). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Savienojiet ar mums!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Jūs esat reģistrējies, bet savienojums vēl nav pabeigts. Jums ir jāsavieno Stripe konts ar mūsu vietni. Kad tas ir izdarīts, varat mūsu vietnei pievienot visus savus īpašumus un sākt rezervāciju pieņemšanu." );

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Laipni lūdzam");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Pirms jūs varat sākt iestatīt savu īpašumu (-us), jums ir jāsaista mūs ar savu Stripe kontu. Lai sāktu, noklikšķiniet uz saites.");

jr_define ('STRIPE_SETUP_INFO', "Tagad mums ir jāpievieno jūsu konts mūsu kontam, tas ļaus mums veikt maksājumus jūsu vārdā, tāpēc noklikšķiniet uz pogas Savienot, lai nokļūtu Stripe, kur jūs varat apstiprināt savienojumu.");
jr_define ('STRIPE_SETUP_DONE', "Jūs jau esat ar mums saistīts, nekas vairāk šeit nav jādara! Aizveriet šo logu un sāksim uzņēmējdarbību.");
jr_define ('STRIPE_SETUP_THANKS', "Paldies, ka sazinājāties ar mums! Jūs varat tūlīt aizvērt šo logu.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Atvienot savu kontu.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Konts ir atvienots, jūs varat aizvērt šo logu tūlīt.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Stripe Connect klienta ID");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Stripe klienta ID varat iegūt no sava <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> informācijas paneļa> Iestatījumi> Savienot API taustiņi atrodas izvēlnes Izstrādātāji opcijā. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Lūdzu, pārliecinieties, vai esat iestatījis novirzīšanas URI vietnē <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Savienot> Iestatījumi </a> uz <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Slepenā atslēga");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Publiskā atslēga");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Jūsu komisija");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Šī komisijas maksa tiek ņemta no maksājuma, kas rezervējuma laikā tika nosūtīts īpašuma pārvaldniekam. Pēc tam Stripe to ievieto jūsu Stripe kontā. <br/> Šī ir komisijas procentuālā daļa, par kuru iekasēsiet īpašuma pārvaldniekus. jūsu komisijas tiek iekasētas, pamatojoties uz VISĀM rezervācijas izmaksām, nevis depozīta vērtību. <br/> Neatkarīgi no šīs vērtības iestatīšanas mēs iesakām konfigurēt vietnes konfigurāciju -> rezervācijas veidlapu -> minimālo depozītu. vismaz divas reizes lielāks par šo skaitli, tādēļ, ja vēlaties iekasēt komisijas maksu 10% apmērā, minimālajam depozītam ir jābūt 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Šī ir procentuālā daļa, ko Stripe iekasē no jums par maksājumu veikšanu jūsu vietnē. Pašlaik par Eiropas kartēm tiek iekasēta maksa 1,4% un ārpus Eiropas kartēm-2,9%. Šis skaitlis ir nepieciešams, lai noteiktu cenas rezervēšanas laikā un maksājuma laiks. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Stripe Fee non-euro");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Kartes numurs");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Derīguma termiņš (MM/GG)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Norēķinu pasta indekss");
    
jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Droša maksājuma veidlapa");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Norēķinu informācija");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Kartes informācija");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Kartes īpašnieka vārds");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Maksāt tūlīt");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Maksāt tūlīt");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Iela ir obligāta un nevar būt tukša');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Ielai jābūt garākai par 6 un mazāk par 96 rakstzīmēm');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Pilsēta ir obligāta, un tā nedrīkst būt tukša');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Zip ir obligāts un nevar būt tukšs');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'Pasta indeksam jābūt garākam par 3 un mazāk par 12 rakstzīmēm');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'E -pasta adrese ir obligāta, un tā nevar būt tukša');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Ievadītā informācija nav derīga');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'E -pastam jābūt garākam par 6 un mazāk par 65 rakstzīmēm');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Kartes īpašnieka vārds ir jānorāda, un tas nevar būt tukšs');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'Kartes īpašnieka vārdam jābūt garākam par 6 un mazāk par 70 rakstzīmēm');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Kredītkartes numurs ir obligāts un nevar būt tukšs');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Kredītkartes numurs nav derīgs');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'Derīguma termiņš ir obligāts');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'Derīguma termiņa mēnesī var būt tikai cipari');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Derīguma termiņš ir obligāts');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Derīguma termiņš var saturēt tikai ciparus');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'Cvv ir obligāts un nevar būt tukšs');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Vērtība nav derīgs CVV');

jr_define ('STRIPE_PAYMENT_FAILED', "Diemžēl mēs nevarējām apstrādāt jūsu maksājumu šobrīd.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Lūdzu, mēģiniet vēlreiz");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Maksājums tika noraidīts.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Pārāk daudz pieprasījumu API tika iesniegts pārāk ātri");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Stripe API tika piegādāti nederīgi parametri");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Autentifikācija ar Stripe API neizdevās");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Tīkla saziņa ar Stripe neizdevās (vai interneta savienojums ir pārtraukts?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Notika nepieķerta kļūda");