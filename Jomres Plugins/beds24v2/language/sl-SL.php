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
// Because the server may be using a proxy for outgoing calls it's better to call the Jomres App server and ask it to respond with this server's IP address. Once we know that, then we are able to give the documentation the correct IP number to configure in Beds24's API Key N field(s)
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.ipify.org?format=json');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($cURLConnection, CURLOPT_TIMEOUT, 1);

$ip_number_response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($ip_number_response);

if (isset( $jsonArrayResponse->ip)) {
    $this_servers_ip_number = $jsonArrayResponse->ip;
} else {
    $this_servers_ip_number = 'Unknown, ask your server hosts support team';
}
jr_define ('BEDS24V2_CHANNEL_MANAGEMENT', 'Upravljanje kanalov (postelje24)');

jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Postelje24');
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Če imate račun Beds24 in želite ob rezervaciji posodobiti Beds24, izberite to možnost. Nastavite URL na https://www.beds24.com/api/json/');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'Ta uporabnik nima nastavljenih ključev API -ja, zato ne more nadaljevati. Obiščite njihovo stran na strani Upravljanje uporabnikov> Upravitelji nepremičnin in jim s pomočjo povezave na tej strani ustvarite nov ključ API.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Ta uporabnik nima lastnosti Jomresa, ki bi jih lahko dodelil lastnostim Beds24, ali obratno');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "Upravitelj, na katerega ste prijavljeni, nima računa z Beds24, zato se boste morali najprej registrirati za njihovo storitev, nato pa ta ključ API shraniti na <a href = 'https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> Spletno mesto Beds24 tukaj. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "Za nadaljevanje kopirajte in prilepite ta ključ API v polje LINK v svojem računu Beds24.");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Ko to storite, kliknite spodnji gumb za nadaljevanje.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Povezovanje nepremičnin Beds24");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', "Ta stran vam omogoča ogled lastnosti, do katerih imate dostop v tem sistemu, in tistih, ki obstajajo v upravitelju kanalov. Prav tako vam omogoča uvoz lastnosti iz upravitelja kanalov v ta sistem ali izvoz obstoječih lastnosti v upravitelju kanalov. <br/> Če imate lastnosti v tem sistemu in v posteljah24 in jih želite povezati med seboj, lahko za to uporabite apikey lastnosti. Obiščite Beds24> Nastavitve> Lastnosti (zagotovite, da lastnost, izbrana v spustnem meniju, je enaka tisti, ki jo želite povezati), nato v podmeniju Povezava shranite 'Property apikey' v polje 'propKey' v posteljah24. Ko to storite, znova naložite stran. Ta sistem bo glejte, da sta dve lastnosti povezani z istim ključem in ustvarite potrebne povezave. Ko sta povezani dve lastnosti, ne pozabite obiskati strani Pogled lastnosti, poiščite URL obvestila in ga prilepite v polje \"Obvesti URL\" na strani Povezava. To bo zagotovite, da Beds24 uporablja pravilno povezavo za sinhronizacijo rezervacij s to lastnino, ko prejme rezervacije. ");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Napaka: V posteljah24 ni lastnosti, s katerimi bi se lahko povezali. To je lahko zato, ker so vse lastnosti, za katere imate pravice, že povezane z drugim računom v tem sistemu.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Lastnost uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Ime nepremičnine");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Ime nepremičnine Beds24");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Apikey lastnosti");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "Uvoz");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Konfiguriraj vrste sob");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Tukaj morate povezati vrste sob v svojem računu Beds24 s tistimi, shranjenimi v tem sistemu.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Tip postelje24");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Te lastnosti še ni mogoče uvoziti, ker niste nastavili ključa lastnosti na strani Povezava z znamko.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Te znamke še ni mogoče uvoziti, ker nima nobene sobe. Ustvarite eno ali več sob (sobe v posteljah 24 so enake kot v Jomresu) in ne pozabite nastaviti najnižje cene) . Ko to storite, lahko tip sobe uvozite v Jomres in jih povežete s trenutnimi vrstami sob Jomres. Po tem boste lahko spremenili tarife, vendar je treba določiti najnižjo ceno. ");
jr_define ('_BEDS24_SUGGESTED_KEY', "Predlagamo, da uporabite ta ključ API. Ko to storite, znova naložite to stran.");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "Izvoz");
jr_define ('BEDS24V2_REST_API_INTRO', "Tukaj si lahko ogledate svoj par ključev API -ja REST in pot do API -ja. Če te podatke shranite v svoj račun na Beds24, se bodo lahko Beds24 24 obrnila na to spletno stran prek njegovega API -ja.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "ID odjemalca");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "Odjemalska skrivnost");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (končna točka)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "Ogled lastnosti");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "Povezave tipa sobe");

jr_define ('BEDS24_ROOM_TYPES_INFO', "Ta stran vam omogoča, da svoje vrste sob povežete s tistimi, shranjenimi v strežnikih Beds24.");
jr_define ('BEDS24_ROOM_TYPES_INFO2', "Dokler vrste sob niso povezane, ne morete prejemati podatkov o rezervacijah, ki jih pošiljajo Beds24. Če je bila vaša nepremičnina uvožena/izvožena v ali iz postelj24, smo za vas samodejno ustvarili povezave, če pa dodate novo vrsto sobe ali jo izbrišite, potem lahko to stran uporabite za zagotovitev, da je vrsta sobe pravilno povezana. ");
jr_define ('BEDS24_ROOM_TYPES_INFO3', "Izberite vrste sob Beds24, ki jih želite povezati s tipi sob v tem sistemu, in ko končate, kliknite Shrani, da posodobite spremembe na Beds24.");
jr_define ('BEDS24_ROOM_TYPES_YOURS', "Vaše vrste sob");
jr_define ('BEDS24_ROOM_TYPES_BEDS24', "Vrste sob Beds24");
jr_define ('BEDS24_ROOM_TYPES_NONE', "Ta lastnost nima nobene vrste sob, zato je ni mogoče povezati s katero koli vrsto sobe Beds24. Ali želite uvoziti vrste sob iz Beds24?");
jr_define ('BEDS24_IMPORT_ROOMS', "Uvozi sobe");
jr_define ('BEDS24_EXPORT_BOOKINGS', "Izvozi rezervacije");
jr_define ('BEDS24_IMPORT_BOOKINGS', "Uvozi rezervacije");
jr_define ('BEDS24_IMPORT_EXPORT', "Obstoječe rezervacije iz in v postelje24 lahko uvozite in izvozite s klikom na gumb. Rezervacije, uvožene iz postelj24, so uvožene od včeraj in bodo vključevale vse rezervacije za naslednje leto. Te gumbe uporabite šele po prvi uvoz ali izvoz nepremičnine v sistem. Ko se nastavitev izvede, se uvoz in/ali izvoz izvede samodejno. ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Posodobi cene na postelje24?");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Lahko se odločite, da posodobite Beds24 samo z razpoložljivostjo ali z razpoložljivostjo in cenami. Če uporabljate posebne situacije, ko želite uporabiti nadzorno ploščo Beds24 za nastavitev posebnih cen za določene kanale, pustite to nastavljeno na Št. ");
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT', "Neposredna povezava");
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS', "Če ste to lastnost uvozili v Jomres, boste morali ročno spremeniti URL za obvestila v svojih posteljah24 -> Lastnost -> Nastavitve povezave na naslednje:");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Trenutno nimate nobenih lastnosti, povezanih z lastnostmi Beds24. Ključe API -ja svojega upravitelja morate ponastaviti, preden lahko upraviteljem poskušajo vzpostaviti povezavo z Beds24. To bo zagotovilo, da imajo vsi edinstvene ključe.");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "Ponastavi ključe API -ja upravitelja zdaj");
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "Prezri opozorilo");
jr_define ('BEDS24V2_ERROR_KEYS_DONE', "Ključi API -ja upravitelja so bili ponastavljeni");

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Povezave lastnosti Beds24");
jr_define ('BEDS24_ASSIGN_MANAGER', "Upravitelj sprememb postelj24");
jr_define ('BEDS24_ASSIGN_MANAGER_DESC', "Ko si upravitelj ogleda stran Upravljanje kanalov (Bed24) v prednjem delu, se vse lastnosti, ki si delijo ključ API v Jomresu in Beds24, samodejno povežejo v Jomresu. Podobno so vse lastnosti, ki jih je upravitelj uvozil ali izvozil). Upravitelja, s katerim je povezana lastnost, lahko spremenite tako, da na tej strani spremenite spustni meni upravitelja in kliknete Shrani. ");
jr_define ('BEDS24V2_TARIFFS_TITLE', "Izvoz tarif");
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC', "Ustvarjene tarife lahko izvozite v Beds24 v določeno dnevno tarifo. Če boste uporabljali to funkcijo, morate možnost Posodobi cene na postelje24? v konfiguraciji nepremičnine nastaviti na Ne. boste morda morali nastaviti svojo nepremičnino na nadzorni plošči Beds24, da boste lahko imeli več dnevnih tarif. Če želite to narediti, pojdite v Nastavitve> Lastnosti> Sobe> Dnevne cene in nastavite \"Število dnevnih cen\" na želeno število cen. . Ko to storite, boste lahko kliknili enega od gumbov P, da nastavite to dnevno stopnjo. ");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Ime tarife");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Vrsta sobe");
jr_define ('BEDS24V2_BOOKING_RESEND', "Ponovno pošlji obvestilo");
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24', "To so podatki o rezervaciji, shranjeni na Beds24. Če niste prepričani, da so podatki napačni, vam rezervacije ni treba znova poslati na Beds24.");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24', "Zdi se, da ta rezervacija ni povezana z rezervacijo na posteljah24. Za izvoz te rezervacije v ležišča24 lahko uporabite gumb Ponovno pošlji.");

jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonimni gostje?");
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Ko so rezervacije poslane upravitelju kanala, priporočamo, da anonimizirate podatke o gostu. Če to možnost nastavite na da, ko se podatki o rezervaciji pošljejo upravitelju kanala, ime gosta, e -poštni naslov niso . OTA bodo imeli natančen zapis o vaši razpoložljivosti, ne da bi morali deliti več informacij, kot je potrebno. To pomeni, da ste v skladu z GDPR, ker če bi se gost pozneje odločil, da izbriše svoje podatke o tem sistemu (o tem niste obveščeni zgodijo), njihovi podatki ne ostanejo drugim upravljavcem podatkov, nad katerimi nimate nadzora. Če je potrebno, lahko v tem sistemu še vedno vzpostavite sklic na rezervacije s tistimi v upravitelju kanalov, stran Podrobnosti o rezervaciji vam bo pokazala številko rezervacije za to rezervacijo, saj je shranjena v upravitelju kanala. ");
jr_define ('BEDS24V2_MASTER_APIKEY', "EXPERIMENTAL FEATURE - Master Beds24 API key");
jr_define ('BEDS24V2_MASTER_APIKEY_DESC', "ČE VEČ IMATE NAMESTITEV JOMRESA Z LASTNOSTI, KI SO POVEZANE NA POSTELJINE24 TUKAJ PREBERITE VSI OPIS. Privzeto je Jomres zasnovan kot lastna platforma za rezervacijo več prodajalcev, ki lahko uvozi postelje Mana24. nepremičnine na posteljah 24 in varno. Ta nastavitev vam omogoča, da preglasite to funkcijo z enim ključem API za vse nepremičnine. To pomeni, da potrebujete samo en račun s posteljami24, vendar pa tudi pomeni, da bodo vsi stroški nastali na tem računu. Vsak upravitelj z dostopom do nepremičnine bo lahko pošiljal posodobitve za nepremičnino na strežnikih beds24. Pustite prazno, če želite prezreti to nastavitev, in prisiliti upravitelje nepremičnin, da uporabljajo lastne račune Beds24. Ključ API ima lahko poljubno obliko, tako dolgo ker se ključ tukaj ujema s ključem v <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> <em> ključu API 1 </em> </ a> polje. ČE IMATE ŽE INSTALAT ON JOMRES S LASTNOSTI, POVEZANIMI NA POSTELJE24: To funkcijo lahko preklopite, vendar bi bilo treba najprej skrajšati (izprazniti) te tabele, izbrisati obstoječe lastnosti, ki so že v Jomresu, in nato znova uvoziti lastnosti iz Beds24 v Jomres. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Ko nastavite ključ API v razdelku <em> Ključ API N </em> na strani za dostop do računa Beds24, je pomembno, da polje <em> Dostop do ključa API </em> nastavite na Dovoli samo IP na seznamu dovoljenih in nastavite številko IP na <strong>". $this_servers_ip_number. "</strong> To velja enako za konfiguracijo ključa glavnega API -ja tukaj in na sprednji strani, če upravitelj lastnosti konfigurira svoj lasten API ključi. ");
jr_define ('BEDS24V2_WHITELIST_WARNING', "Če so vaše nepremičnine že povezane z Beds24, upoštevajte, da so Beds24 pred kratkim uvedli pravilnik, po katerem morajo biti vsi strežniki, ki se povezujejo z vašim računom, na seznamu dovoljenih. To lahko storite na strani za dostop do računa, kjer vaš dostopni ključ je bil vnesen. Izberite spustni seznam IP seznama dovoljenih in nastavite številko IP na ");