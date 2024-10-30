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
jr_define ('BEDS24V2_CHANNEL_MANAGEMENT', 'Upravljanje kanalima (kreveti24)');

jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Kreveti24');
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Ako imate račun Beds24 i želite ažurirati Beds24 prilikom rezervacije, odaberite ovu opciju. Postavite URL na https://www.beds24.com/api/json/');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'Ovaj korisnik nema postavljene API ključeve pa ne može nastaviti. Posjetite njihovu stranicu na stranici Upravljanje korisnicima> Upravitelji svojstvima i izradite im novi API ključ pomoću veze navedene na toj stranici.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Ovaj korisnik nema Jomres svojstva koja može dodijeliti svojstvima Beds24 ili obrnuto');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "Čini se da upravitelj na koji ste prijavljeni nema račun s Beds24, pa ćete se prvo morati registrirati za njihovu uslugu, a zatim spremiti ovaj API ključ na <a href = 'https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> Web stranica Beds24 ovdje. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "Kopirajte i zalijepite ovaj API ključ u polje LINK na svom računu Beds24 za nastavak.");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Kada to učinite, kliknite donji gumb za nastavak.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Povezivanje svojstva Beds24");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', "Ova stranica omogućuje vam pregled svojstava kojima imate pristup u ovom sustavu, plus onih koja postoje na Upravitelju kanala. Također vam omogućuje uvoz proizvoda iz Upravitelja kanala u ovaj sustav ili izvoz postojeća svojstva za Upravitelj kanala. <br/> Ako imate svojstva i u ovom sustavu i na krevetima24 i želite ih međusobno povezati, za to možete koristiti apikey svojstava. Posjetite krevete24> Postavke> Svojstva (provjerite da svojstvo odabrano na padajućem izborniku isto je ono koje želite povezati), a zatim u podizborniku Veza spremite \"Property apikey\" u polje \"propKey\" u krevetima24. Nakon što to učinite, ponovno učitajte stranicu. Ovaj sustav će vidjeti da su dva svojstva povezana s istim ključem i stvoriti potrebne asocijacije. Nakon što su dva svojstva povezana, ne zaboravite posjetiti stranicu View Property, pronaći URL obavijesti i zalijepiti to u polje \"Notify Url\" na stranici veze. To će pobrinite se da kreveti24 koriste ispravnu vezu za sinkronizaciju rezervacija s tim nekretninom kada primaju rezervacije. ");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Pogreška: Ne postoje svojstva s kojima se možete povezati u Krevetima24. To može biti zato što su sva svojstva na koja imate prava već povezana s drugim računom u ovom sustavu.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Uid svojstva");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Naziv nekretnine");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24 Naziv nekretnine");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Apikey svojstva");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "Uvoz");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Konfiguriraj vrste soba");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Ovdje morate povezati vrste soba na svom računu Beds24 s onima pohranjenim u ovom sustavu.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Vrsta sobe Beds24");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Ovo svojstvo još nije moguće uvesti jer niste postavili ključ svojstva na stranici Veza nekretnine.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Još se ne može uvesti ovaj entitet jer nema nijednu sobu. Izradite jednu ili više soba (sobe u krevetima 24 iste su kao vrste soba u Jomresu) i ne zaboravite postaviti minimalnu cijenu) . Nakon što to učinite, možete uvesti vrstu sobe u Jomres i povezati ih s trenutnim vrstama soba u Jomresu. Nakon toga ćete moći mijenjati tarife, ali je potrebno postaviti minimalnu cijenu. ");
jr_define ('_BEDS24_SUGGESTED_KEY', "Predlažemo da koristite ovaj API ključ. Kada to učinite, ponovno učitajte ovu stranicu.");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "Izvoz");
jr_define ('BEDS24V2_REST_API_INTRO', "Ovdje možete vidjeti svoj par ključeva REST API i put do API -ja. Ako ove podatke spremite na svoj račun na Beds24, tada će Beds24 24 moći kontaktirati ovu web stranicu putem API -ja.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "ID klijenta");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "Tajna klijenta");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (krajnja točka)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "Prikaži svojstvo");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "Asocijacije tipa sobe");

jr_define ('BEDS24_ROOM_TYPES_INFO', "Ova vam stranica omogućuje povezivanje vrsta soba s onima pohranjenim na poslužiteljima Beds24.");
jr_define ('BEDS24_ROOM_TYPES_INFO2', "Dok se vrste soba ne povežu, ne možete primati podatke o rezervacijama koje šalju Beds24. Ako je vaša nekretnina uvezena/izvezena na ili s kreveta 24, automatski smo za vas stvorili veze, no ako dodate novu vrstu sobe ili je izbrišite, tada se ova stranica može koristiti za provjeru da li je tip sobe pravilno povezan. ");
jr_define ('BEDS24_ROOM_TYPES_INFO3', "Odaberite vrste soba Beds24 koje želite pridružiti tipovima soba u ovom sustavu, a kada završite kliknite Spremi da biste ažurirali promjene na Beds24.");
jr_define ('BEDS24_ROOM_TYPES_YOURS', "Vaše vrste soba");
jr_define ('BEDS24_ROOM_TYPES_BEDS24', "Vrste soba kreveta24");
jr_define ('BEDS24_ROOM_TYPES_NONE', "Ova nekretnina nema nijednu vrstu sobe pa se ne može povezati s bilo kojom vrstom sobe Beds24. Želite li uvesti vrste soba s kreveta 24?");
jr_define ('BEDS24_IMPORT_ROOMS', "Uvezi sobe");
jr_define ('BEDS24_EXPORT_BOOKINGS', "Izvoz rezervacija");
jr_define ('BEDS24_IMPORT_BOOKINGS', "Uvoz rezervacija");
jr_define ('BEDS24_IMPORT_EXPORT', "Možete uvesti i izvesti postojeće rezervacije sa i na krevete 24 jednim pritiskom na gumb. Rezervacije uvezene s kreveta 24 uvoze se od jučer i uključivat će sve rezervacije za sljedeću godinu. Ove gumbe trebate koristiti tek nakon prvi uvoz ili izvoz imovine u sustav. Nakon postavljanja, uvoz i/ili izvoz bit će obavljeni automatski. ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Ažuriraj cijene na Krevete24?");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Možete izabrati da ažurirate Beds24 samo s dostupnošću ili dostupnošću i cijenama. Ako koristite određene situacije u kojima želite koristiti upravljačku ploču Beds24 za postavljanje određenih cijena za određene kanale, ostavite ovu postavku na Ne.");
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT', "Izravna veza");
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS', "Ako ste uvezli ovo svojstvo u Jomres, morat ćete ručno promijeniti URL obavijesti u svojim krevetima24 -> Svojstvo -> Postavke veze na sljedeće:");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Trenutno nemate nijedno svojstvo povezano sa svojstvima Beds24. Morate poništiti API ključeve svog upravitelja prije nego što dopustite svojim upraviteljima da se pokušaju povezati s krevetima24. To će osigurati da svi imaju jedinstvene ključeve.");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "Odmah poništi API ključeve upravitelja");
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "Zanemari upozorenje");
jr_define ('BEDS24V2_ERROR_KEYS_DONE', "API ključevi upravitelja su poništeni");

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Veze svojstava Beds24");
jr_define ('BEDS24_ASSIGN_MANAGER', "Upravitelj promjena kreveta24");
jr_define ('BEDS24_ASSIGN_MANAGER_DESC', "Kad upravitelj pregledava stranicu Upravljanje kanalom (Bed24) na sučelju, sva svojstva koja dijele API ključ i u Jomresu i u krevetima24 automatski se povezuju unutar Jomresa. Slično, sva svojstva koja je upravitelj uvezao ili izvezao Možete promijeniti upravitelja s kojim je svojstvo povezano promjenom padajućeg izbornika upravitelja na ovoj stranici, a zatim klikom na Spremi. ");
jr_define ('BEDS24V2_TARIFFS_TITLE', "Izvoz tarifa");
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC', "Možete izvesti tarife koje ste stvorili u krevete 24 na određenu dnevnu stopu. Ako ćete koristiti ovu značajku, postavite opciju \" Ažuriraj cijene na krevete24? \" u Konfiguraciji nekretnine na Ne. Vi možda ćete također morati konfigurirati svoju nekretninu na upravljačkoj ploči Beds24 tako da možete imati više dnevnih tarifa. Da biste to učinili, idite na Postavke> Svojstva> Sobe> Dnevne cijene i konfigurirajte 'Broj dnevnih cijena' na broj željenih cijena . Nakon što to učinite, moći ćete kliknuti jedan od gumba P za postavljanje te dnevne stope. ");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Naziv tarife");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Vrsta sobe");
jr_define ('BEDS24V2_BOOKING_RESEND', "Ponovno pošalji obavijest");
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24', "Ovo su podaci o rezervaciji pohranjeni na krevetima24. Osim ako niste sigurni da su podaci netočni, ne morate ponovno slati rezervaciju na krevete 24.");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24', "Čini se da ova rezervacija nije povezana s rezervacijom na krevetima24. Možete koristiti gumb Ponovo pošalji da biste izvezli ovu rezervaciju u krevete24.");

jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonimni gosti?");
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Kada se rezervacije šalju upravitelju kanala, preporučujemo da anonimizirate podatke o gostu. Ako ovu opciju postavite na da, kada se informacije o rezervaciji šalju upravitelju kanala ime gosta, adresa e -pošte nisu . OTA -i će imati točan zapis o vašoj dostupnosti, a da ne morate dijeliti više podataka nego što je potrebno. To znači da ste usklađeni s GDPR -om jer ako gost kasnije odluči izbrisati svoje podatke o ovom sustavu (nećete biti obaviješteni kada se ovo događaji), njihovi podaci ne ostaju drugim voditeljima obrade podataka nad kojima nemate kontrolu. Ako je potrebno, još uvijek možete uporediti rezervacije u ovom sustavu s onima na upravitelju kanala, stranica Pojedinosti o rezervaciji prikazat će vam broj rezervacije za ovu rezervaciju jer je pohranjena na upravitelju kanala. ");
jr_define ('BEDS24V2_MASTER_APIKEY', "EXPERIMENTAL FEATURE - Master Beds24 API key");
jr_define ('BEDS24V2_MASTER_APIKEY_DESC', "AKO VEĆ IMATE INSTALACIJU JOMRESA S NEKRETNINAMA VEZANIMA NA KREVETE24 OVDJE PROČITAJTE CIJELI OPIS. Prema zadanim postavkama, Jomres je dizajniran tako da ima vlastite platforme za rezervacije Mana24 koje mogu uvesti krevete za rezervaciju korisnika24. svojstva na krevete i s kreveta24 na siguran način. Ova postavka omogućuje vam da nadjačate tu funkciju tako što ćete imati jedan API ključ za sve nekretnine. To znači da vam je potreban samo jedan račun s krevetima24, ali to također znači da će taj račun snositi sve troškove. Svaki upravitelj s pristupom nekretnini moći će slati ažuriranja nekretnine na poslužiteljima beds24. Ostavite prazno da biste zanemarili ovu postavku i prisilili upravitelje nekretnina da koriste vlastite račune Beds24. API ključ može imati bilo koji oblik, tako dugo budući da se ključ ovdje podudara s ključem u <ahref='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> <em> API ključu 1 </em> </ a> polje.AKO VEĆ IMATE INSTALLATI ON JOMRES SA SVOJSTVIMA POVEZANIMA NA KREVETE24: Možete se prebaciti na korištenje ove značajke, međutim to će zahtijevati da prvo skratite (ispraznite) ove tablice, izbrišete postojeća svojstva koja su već u Jomresu, a zatim ponovno uvezite svojstva od Beds24 u Jomres. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Prilikom postavljanja API ključa u odjeljku <em> API ključ N </em> na stranici Pristup računu Beds24, važno je da polje <em> Pristup ključu API </em> postavite na ' Dopusti samo IP popis dopuštenih ', a IP broj postavite na <strong> ". $this_servers_ip_number." </strong> To se jednako odnosi na konfiguraciju ključa glavnog API -ja ovdje, a na sučelju ako upravitelj svojstava konfigurira vlastiti individualni API ključevi. ");
jr_define ('BEDS24V2_WHITELIST_WARNING', "Ako su vaši objekti već povezani s Beds24, imajte na umu da su Beds24 nedavno uveli pravilo prema kojemu svi poslužitelji koji se povezuju s vašim računom moraju biti na popisu dopuštenih. To možete učiniti na stranici Pristup računu, gdje vaš pristupni ključ je unesen. Odaberite padajući izbornik Whitelist IP i postavite IP broj na ");