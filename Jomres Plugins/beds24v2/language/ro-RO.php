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

jr_define ('BEDS24V2_CHANNEL_MANAGEMENT', 'Management canal (Beds24)');

jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24');
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Dacă aveți un cont Beds24 și doriți să actualizați Beds24 când faceți o rezervare, selectați această opțiune. Setați adresa URL la https://www.beds24.com/api/json/');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'Acest utilizator nu are setate chei API, deci nu poate continua. Vă rugăm să vizitați pagina lor în pagina Administrare utilizator> Administratori de proprietăți și să creați o nouă cheie API pentru ei utilizând linkul furnizat pe pagina respectivă.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Acest utilizator nu are proprietăți Jomres pe care să le poată atribui proprietăților Beds24 sau invers');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "Managerul la care sunteți conectat nu pare să aibă un cont la Beds24, deci va trebui să vă înregistrați mai întâi pentru serviciul lor, apoi să salvați această cheie API pe <a href = 'https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> site-ul web Beds24 aici. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "Copiați și lipiți această cheie API în câmpul LINK din contul dvs. Beds24 pentru a continua.");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "După ce ați făcut acest lucru, faceți clic pe butonul de mai jos pentru a continua.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24 linking property");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', "Această pagină vă permite să vizualizați proprietățile la care aveți acces în acest sistem, plus cele care există în Channel Manager. De asemenea, vă permite să importați proprietăți din Channel Manager în acest sistem sau să exportați proprietățile existente la Channel Manager. <br/> Dacă aveți proprietăți atât în ​​acest sistem, cât și în Beds24 și doriți să le conectați între ele, puteți utiliza Proprietatea pentru a face acest lucru. Accesați Beds24> Setări> Proprietăți (asigurați-vă că proprietatea selectată în meniul derulant este aceeași cu cea pe care doriți să o conectați), apoi în submeniul Link salvați \"Proprietatea apikey\" în câmpul \"propKey\" din Beds24. După ce ați făcut acest lucru, reîncărcați pagina. vedeți că cele două proprietăți sunt asociate cu aceeași cheie și creați asociațiile necesare. Odată ce cele două proprietăți sunt conectate, nu uitați să vizitați pagina Vizualizare proprietate, găsiți adresa URL de notificare și lipiți-o în câmpul \"Notificați adresa URL\" a paginii Link. Asta va fi asigurați-vă că Beds24 folosește linkul corect pentru a sincroniza rezervările cu proprietatea respectivă atunci când primește rezervări. ");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Eroare: nu există proprietăți pe care să le puteți lega în Beds24. Acest lucru se poate datora faptului că toate proprietățile pe care aveți drepturi să le fi fost deja conectate la un alt cont pe acest sistem.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Uid de proprietate");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Numele proprietății");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Numele proprietății Beds24");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Proprietate apikey");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "Import");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Configurarea tipurilor de cameră");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Aici trebuie să legați tipurile de camere din contul dvs. Beds24 cu cele stocate în acest sistem.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Beds24 tip cameră");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Nu se poate importa încă această proprietate deoarece nu ați setat cheia de proprietate în pagina Link de proprietate.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Nu se poate importa încă această proprietate deoarece nu are camere. Vă rugăm să creați una sau mai multe camere (camerele din Beds24 sunt aceleași cu tipurile de camere din Jomres) și nu uitați să setați prețul minim După ce ați făcut acest lucru, puteți importa tipul de cameră în Jomres și le puteți asocia cu tipurile de camere Jomres actuale. După aceea, veți putea modifica tarifele, dar trebuie stabilit un preț minim. ");
jr_define ('_BEDS24_SUGGESTED_KEY', "Vă sugerăm să utilizați această cheie API. După ce ați făcut acest lucru, reîncărcați această pagină.");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "Export");
jr_define ('BEDS24V2_REST_API_INTRO', "Aici puteți vedea perechea de chei REST API și calea către API. Dacă salvați aceste detalii în contul dvs. pe Beds24, Beds24 24 va putea contacta acest site prin intermediul API-ului său.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "ID client");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "Secretul clientului");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (punct final)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "Vizualizare proprietate");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "Asocieri tip cameră");

jr_define ('BEDS24_ROOM_TYPES_INFO', "Această pagină vă permite să asociați tipurile de camere cu cele stocate în serverele Beds24.");
jr_define ('BEDS24_ROOM_TYPES_INFO2', "Până când tipurile de camere nu sunt conectate, nu puteți primi informații despre rezervare trimise de Beds24. Dacă proprietatea dvs. a fost importată / exportată în sau din Beds24, atunci am creat automat linkuri pentru dvs., totuși, dacă adăugați un nou tip de cameră sau ștergeți unul, atunci această pagină poate fi utilizată pentru a vă asigura că tipul de cameră este corect asociat. ");
jr_define ('BEDS24_ROOM_TYPES_INFO3', "Alegeți tipurile de camere Beds24 pe care doriți să le asociați cu tipurile de camere din acest sistem și, când ați terminat, faceți clic pe Salvare pentru a actualiza modificările la Beds24.");
jr_define ('BEDS24_ROOM_TYPES_YOURS', "Tipurile dvs. de cameră");
jr_define ('BEDS24_ROOM_TYPES_BEDS24', "Tipuri de camere cu 24 de paturi");
jr_define ('BEDS24_ROOM_TYPES_NONE', "Această proprietate nu are niciun tip de cameră, deci nu poate fi legată de niciun tip de cameră Beds24. Doriți să importați tipuri de camere din Beds24?");
jr_define ('BEDS24_IMPORT_ROOMS', "Importa camere");
jr_define ('BEDS24_EXPORT_BOOKINGS', "Exportați rezervări");
jr_define ('BEDS24_IMPORT_BOOKINGS', "Import rezervări");
jr_define ('BEDS24_IMPORT_EXPORT', "Puteți importa și exporta rezervările existente din și în Beds24 cu doar un clic. Rezervările importate din Beds24 sunt importate de ieri și vor include toate rezervările din anul următor. Trebuie să utilizați aceste butoane numai după mai întâi importul sau exportul proprietății în sistem. După configurare, importul și / sau exportul se vor face automat. ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Actualizați prețurile la Beds24?");
jr_define ("_ BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC", "Puteți alege să actualizați Beds24 cu doar disponibilitate sau atât disponibilitate, cât și prețuri. Dacă utilizați situații specifice în care doriți să utilizați panoul de control Beds24 pentru stabilirea prețurilor specifice pentru anumite canale, ar trebui să lăsați acest set Nu.");
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT', "Link direct");
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS', "Dacă ați importat această proprietate în Jomres, va trebui să modificați manual adresa URL de notificare din Beds24 -> Proprietate -> Setări link la următoarele:");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "În prezent nu aveți nicio proprietate asociată cu proprietățile Beds24. Trebuie să resetați cheile API ale managerului înainte de a permite managerilor dvs. să încerce să se conecteze cu Beds24. Acest lucru vă va asigura că toți au chei unice.");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "Resetează acum cheile managerului API");
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "Ignorați avertizarea");
jr_define ('BEDS24V2_ERROR_KEYS_DONE', "Cheile API Manager au fost resetate");

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Legături de proprietate Beds24");
jr_define ('BEDS24_ASSIGN_MANAGER', "Beds24 Change Manager");
jr_define ('BEDS24_ASSIGN_MANAGER_DESC', "Când un manager vizualizează pagina Channel Management (Bed24) din frontend, orice proprietăți care partajează o cheie API atât în ​​Jomres, cât și în Beds24 sunt conectate automat în Jomres. La fel, orice proprietăți importate sau exportate de manager sunt conectate. Puteți schimba managerul la care este legată o proprietate modificând meniul derulant manager de pe această pagină, apoi făcând clic pe Salvare. ");
jr_define ('BEDS24V2_TARIFFS_TITLE', "Export tarifar");
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC', "Puteți exporta tarifele pe care le-ați creat către Beds24 la o anumită rată zilnică. Dacă urmează să utilizați această caracteristică, ar trebui să setați opțiunea \"Actualizați prețurile la Beds24?\" din Configurarea proprietății la Nu. poate fi necesar, de asemenea, să vă configurați proprietatea în panoul de control Beds24, astfel încât să puteți avea mai multe tarife zilnice. Pentru aceasta, accesați Setări> Proprietăți> Camere> Prețuri zilnice și configurați \"Numărul de prețuri zilnice\" la numărul de prețuri dorite. După ce ați făcut acest lucru, veți putea face clic pe unul dintre butoanele P pentru a seta rata zilnică respectivă. ");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Numele tarifului");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Tip cameră");
jr_define ('BEDS24V2_BOOKING_RESEND', "Retrimiteți notificarea");
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24', "Acestea sunt informațiile de rezervare așa cum sunt stocate pe Beds24. Dacă nu sunteți sigur că datele sunt incorecte, nu ar trebui să retrimiteți rezervarea către Beds24.");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24', "Această rezervare nu pare să fie asociată cu o rezervare pe Beds24. Puteți utiliza butonul Retrimiteți pentru a exporta această rezervare în beds24.");
    
    jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonimizează oaspeții?");
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Când rezervările sunt trimise către managerul canalului, vă recomandăm să anonimizați detaliile oaspeților. Dacă setați această opțiune la da, atunci când informațiile de rezervare sunt trimise către managerul canalului, numele oaspetelui, adresa de e-mail nu sunt . OTA-urile vor avea o evidență exactă a disponibilității dvs. fără a fi nevoie să distribuiți mai multe informații decât este necesar. Aceasta înseamnă că sunteți conform cu GDPR, deoarece dacă oaspeții ar trebui să aleagă ulterior să-și șteargă detaliile din acest sistem (nu veți fi notificat când se întâmplă), detaliile lor nu sunt lăsate la alți controlori de date asupra cărora nu aveți niciun control. Dacă este necesar, puteți face referințe încrucișate în acest sistem cu cele din managerul canalului, pagina Detalii rezervare vă va arăta numărul rezervării pentru această rezervare, deoarece este stocată în managerul de canal. ");
jr_define ('BEDS24V2_MASTER_APIKEY', "CARACTERISTICĂ EXPERIMENTALĂ - cheie API Master Beds24");
jr_define ("BEDS24V2_MASTER_APIKEY_DESC", "DACĂ DEȚINEȚI DEJA O INSTALARE DE JOMRES CU PROPRIETĂȚI LEGATE DE BEDS24 CITIȚI AICI ÎNTREGUL DESCRIERE. În mod implicit, Jomres este conceput pentru a fi o platformă de rezervare cu mai mulți vânzători. Managerii care au propriile lor paturi24. proprietăți către și de la beds24 în siguranță. Această setare vă permite să înlocuiți acea funcționalitate având o singură cheie API pentru toate proprietățile. Aceasta înseamnă că aveți nevoie doar de un singur cont cu Beds24, însă înseamnă, de asemenea, că toate taxele vor fi acumulate de acel cont. Orice administrator cu acces la o proprietate va putea trimite actualizări la proprietate pe serverele beds24. Lăsați necompletat pentru a ignora această setare și forțați administratorii de proprietăți să folosească propriile conturi Beds24. Cheia API poate lua orice formă doriți, atât timp deoarece cheia se potrivește aici cu cea din <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> <em> API Key 1 </em> </ a> câmp.DACĂ DEȚI AȚI UN INSTALAT ON OF JOMRES CU PROPRIETĂȚI LEGATE DE BEDS24: Puteți trece la utilizarea acestei caracteristici, cu toate acestea ar fi necesar să trunchiați (gol) aceste tabele, să ștergeți proprietățile existente care sunt deja în Jomres și apoi să reimportați proprietățile de la Beds24 la Jomres. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Când vă setați cheia API în secțiunea <em> Cheia API N </em> a paginii de acces la cont Beds24 este vital să setați câmpul <em> Acces cheie API </em> la Permiteți numai lista albă IP și setați numărul IP la <strong> ". $this_servers_ip_number." </strong> Acest lucru se aplică în mod egal pentru configurarea cheii API master aici și în frontend dacă un administrator de proprietăți își configurează propriul API individual chei. ");
jr_define ('BEDS24V2_WHITELIST_WARNING', "Dacă proprietățile dvs. au fost deja conectate la Beds24, rețineți că Beds24 a introdus recent o politică în care toate serverele care se conectează la contul dvs. trebuie să fi fost listate în alb. Puteți face acest lucru pe pagina Acces la cont, unde cheia dvs. de acces a fost introdusă. Selectați meniul drop-list IP alb și setați numărul IP la ");