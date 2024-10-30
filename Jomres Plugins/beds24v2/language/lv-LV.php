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
jr_define ('BEDS24V2_CHANNEL_MANAGEMENT', 'Kanālu pārvaldība (Beds24)');

jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24');
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Ja jums ir Beds24 konts un vēlaties atjaunināt Beds24, veicot rezervāciju, lūdzu, atlasiet šo opciju. Iestatiet URL uz https://www.beds24.com/api/json/');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'Šim lietotājam nav iestatītas API atslēgas, tāpēc nevar turpināt. Lūdzu, apmeklējiet viņu lapu Lietotāju pārvaldība> Īpašuma pārvaldnieki un izveidojiet viņiem jaunu API atslēgu, izmantojot šajā lapā sniegto saiti.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Šim lietotājam nav Jomres rekvizītu, ko viņi varētu piešķirt Beds24 īpašumiem, vai otrādi');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "Pārvaldniekam, kuram esat pieteicies, šķiet, nav konta ar Beds24, tāpēc jums vispirms būs jāreģistrējas viņa pakalpojumam, pēc tam jāsaglabā šī API atslēga vietnē <a href = 'https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> Beds24 vietne šeit. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "Lai turpinātu, kopējiet un ielīmējiet šo API atslēgu laukā LINK savā Beds24 kontā.");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Kad esat to izdarījis, lūdzu, noklikšķiniet uz tālāk esošās pogas, lai turpinātu.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24 īpašuma saistīšana");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', 'Šī lapa ļauj apskatīt šajā sistēmā pieejamos rekvizītus, kā arī kanālu pārvaldniekā esošos rekvizītus. Tā arī ļauj importēt rekvizītus no kanālu pārvaldnieka šajā sistēmā vai eksportēt esošos rekvizītus uz kanālu pārvaldnieku. <br/> Ja jums ir rekvizīti gan šajā sistēmā, gan Beds24 un vēlaties tos savstarpēji saistīt, varat to izmantot, izmantojot īpašumu. Apmeklējiet vietni Beds24> Iestatījumi> Rekvizīti (pārliecinieties, vai nolaižamajā izvēlnē atlasītais īpašums ir tas pats, kuru vēlaties saistīt), tad apakšizvēlnē Saite saglabājiet Beds24 laukā "propKey" "Property apikey". Kad esat to izdarījis, atkārtoti ielādējiet lapu. Šī sistēma pārliecinieties, ka abi rekvizīti ir saistīti ar vienu un to pašu atslēgu, un izveidojiet nepieciešamās asociācijas. Kad abi rekvizīti ir saistīti, noteikti apmeklējiet lapu Skatīt īpašumu, atrodiet paziņojuma URL un ielīmējiet to laukā Saites lapa "Paziņot URL". Tas būs pārliecinieties, ka Beds24 izmanto pareizo saiti, lai sinhronizētu rezervācijas ar šo īpašumu, kad tā saņem rezervācijas. ');
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Kļūda: vietnē Beds24 nav neviena īpašuma, ar kuru varētu saistīt. Tas var notikt tāpēc, ka visi jums piederošie īpašumi jau ir bijuši saistīti ar citu šīs sistēmas kontu.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Īpašuma ID");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Īpašuma nosaukums");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24 Īpašuma nosaukums");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Īpašuma apikey");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "Importēt");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Telpu tipu konfigurēšana");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Šeit jums ir jāsasaista istabu tipi savā Beds24 kontā ar šajā sistēmā saglabātajiem.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Beds24 istabas tips");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Šo īpašumu vēl nevar importēt, jo lapā Īpašuma saite neesat iestatījis īpašuma atslēgu.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Šo īpašumu vēl nevar importēt, jo tajā nav nevienas telpas. Lūdzu, izveidojiet vienu vai vairākas istabas (istabas Beds24 ir tādas pašas kā Jomresa istabu tipi) un neaizmirstiet iestatīt minimālo cenu . Kad esat to izdarījis, varat importēt telpas tipu Jomres un saistīt tos ar pašreizējiem Jomres istabu veidiem. Pēc tam jūs varēsit mainīt tarifus, bet ir jānosaka minimālā cena. ");
jr_define ('_BEDS24_SUGGESTED_KEY', "Mēs iesakām izmantot šo API atslēgu. Kad esat to izdarījis, atkārtoti ielādējiet šo lapu.");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "Eksportēt");
jr_define ('BEDS24V2_REST_API_INTRO', "Šeit jūs varat redzēt savu REST API atslēgu pāri un ceļu uz API. Ja saglabājat šo informāciju savā kontā vietnē Beds24, tad Beds24 24 varēs sazināties ar šo vietni, izmantojot tās API.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "Klienta ID");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "Klienta noslēpums");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (galapunkts)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "Skatīt īpašumu");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "Istabas tipa asociācijas");

jr_define ('BEDS24_ROOM_TYPES_INFO', "Šī lapa ļauj jums saistīt savus istabu tipus ar tiem, kas tiek glabāti Beds24 serveros.");
jr_define ('BEDS24_ROOM_TYPES_INFO2', "Kamēr istabu veidi nav saistīti, jūs nevarat saņemt Beds24 nosūtīto rezervācijas informāciju. Ja jūsu īpašums ir importēts/eksportēts uz Beds24 vai no tās, mēs esam jums automātiski izveidojuši saites, tomēr, ja pievienojat jaunu istabas veidu vai dzēst vienu, tad šo lapu var izmantot, lai nodrošinātu, ka telpas tips ir pareizi saistīts. ");
jr_define ('BEDS24_ROOM_TYPES_INFO3', "Izvēlieties Beds24 istabu tipus, kurus vēlaties saistīt ar šīs sistēmas telpu tipiem, un, kad esat pabeidzis, noklikšķiniet uz Saglabāt, lai atjauninātu Beds24 izmaiņas.");
jr_define ('BEDS24_ROOM_TYPES_YOURS', "Jūsu istabu veidi");
jr_define ('BEDS24_ROOM_TYPES_BEDS24', "Beds24 istabu veidi");
jr_define ('BEDS24_ROOM_TYPES_NONE', "Šajā īpašumā nav neviena istabas tipa, tāpēc to nevar saistīt ar nevienu Beds24 istabu tipu. Vai vēlaties importēt istabu tipus no Beds24?");
jr_define ('BEDS24_IMPORT_ROOMS', "Importēt telpas");
jr_define ('BEDS24_EXPORT_BOOKINGS', "Eksportēt rezervācijas");
jr_define ('BEDS24_IMPORT_BOOKINGS', "Importēt rezervācijas");
jr_define ('BEDS24_IMPORT_EXPORT', "Jūs varat importēt un eksportēt esošās rezervācijas no un uz Beds24, noklikšķinot uz pogas. Rezervācijas, kas importētas no Beds24, tiek importētas no vakardienas un ietver visas nākamā gada rezervācijas. Šīs pogas jāizmanto tikai pēc vispirms importējot vai eksportējot īpašumu sistēmā. Kad iestatīšana, importēšana un/vai eksportēšana tiks veikta automātiski. ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Atjaunināt cenas uz Beds24?");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Jūs varat izvēlēties atjaunināt Beds24 tikai ar pieejamību vai gan pieejamību, gan cenām. Ja izmantojat īpašas situācijas, kad vēlaties izmantot Beds24 vadības paneli, lai noteiktu cenas konkrētiem kanāliem, atstājiet šo iestatījumu Nē.");
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT', "Tiešā saite");
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS', "Ja jūs importējāt šo īpašumu Jomresā, jums manuāli jāmaina paziņojumu URL jūsu Beds24 -> Īpašums -> Saites iestatījumi uz šādiem:");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Jums pašlaik nav neviena rekvizīta, kas saistīts ar Beds24 rekvizītiem. Pirms atļaujat vadītājiem mēģināt izveidot savienojumu ar Beds24, jums ir jāatiestata sava vadītāja API atslēgas. Tas nodrošinās, ka viņiem visiem ir unikālas atslēgas.");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "Atiestatīt pārvaldnieka API atslēgas tūlīt");
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "Ignorēt brīdinājumu");
jr_define ('BEDS24V2_ERROR_KEYS_DONE', "Pārvaldnieka API atslēgas ir atiestatītas");

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Beds24 īpašuma saites");
jr_define ('BEDS24_ASSIGN_MANAGER', "Beds24 Change Manager");
jr_define ('BEDS24_ASSIGN_MANAGER_DESC', "Kad pārvaldnieks priekšpusē skatās lapu Kanālu pārvaldība (Bed24), visi rekvizīti, kuriem ir kopīga API atslēga gan Jomres, gan Beds24, tiek automātiski saistīti ar Jomres. Tāpat arī visi pārvaldnieka importētie vai eksportētie rekvizīti. Jūs varat mainīt pārvaldnieku, ar kuru īpašums ir saistīts, šajā lapā mainot pārvaldnieka nolaižamo izvēlni un pēc tam noklikšķinot uz Saglabāt. ");
jr_define ('BEDS24V2_TARIFFS_TITLE', "Tarifu eksports");
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC', "Izveidotos tarifus varat eksportēt uz Beds24 uz noteiktu dienas likmi. Ja izmantosit šo funkciju, īpašuma konfigurācijā iestatiet opciju \"Atjaunināt cenas uz Beds24?\" uz Nē. Jūs iespējams, būs arī jākonfigurē jūsu īpašums Beds24 vadības panelī, lai jums varētu būt vairākas dienas likmes. Lai to izdarītu, dodieties uz Iestatījumi> Rekvizīti> Istabas> Dienas cenas un konfigurējiet 'Dienas cenu skaitu' vēlamajam cenu skaitam. . Kad esat to izdarījis, varēsit noklikšķināt uz vienas no P pogām, lai iestatītu šo dienas likmi. ");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Tarifa nosaukums");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Istabas tips");
jr_define ('BEDS24V2_BOOKING_RESEND', "Paziņojuma atkārtota nosūtīšana");
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24', "Šī ir rezervācijas informācija, kas tiek glabāta vietnē Beds24. Ja neesat pārliecināts, ka dati ir nepareizi, jums nevajadzētu atkārtoti nosūtīt rezervāciju uz Beds24.");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24', "Šķiet, ka šī rezervācija nav saistīta ar rezervāciju vietnē Beds24. Varat izmantot pogu Nosūtīt vēlreiz, lai eksportētu šo rezervāciju uz beds24.");

jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonimizēt viesus?");
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Kad rezervācijas tiek nosūtītas kanāla pārvaldniekam, iesakām anonimizēt viesa informāciju. Ja iestatāt šo opciju uz jā, tad, ja rezervācijas informācija tiek nosūtīta kanāla pārvaldniekam, netiek norādīts viesa vārds, e -pasta adrese . OTAs precīzi reģistrēs jūsu pieejamību, un jums nevajadzēs dalīties ar vairāk informācijas, nekā nepieciešams. Tas nozīmē, ka jūs atbilstat VDAR prasībām, jo, ja viesis vēlāk izvēlēsies dzēst savu informāciju šajā sistēmā (jums netiks paziņots, gadās), to informācija netiek atstāta citiem datu pārziņiem, kurus jūs nevarat kontrolēt. Ja nepieciešams, jūs joprojām varat savstarpēji salīdzināt rezervācijas šajā sistēmā ar kanālu pārvaldnieka rezervācijām, lapā Rezervācijas informācija tiks parādīts rezervācijas numurs šī rezervācija tiek saglabāta kanālu pārvaldniekā. ");
jr_define ('BEDS24V2_MASTER_APIKEY', "EKSPERIMENTĀLĀ ĪPAŠĪBA - Master Beds24 API atslēga");
jr_define ('BEDS24V2_MASTER_APIKEY_DESC', "JA JUMS JAU IR JOMRES UZSTĀDĪŠANA AR ĪPAŠĪBĀM, KAS SAISTĪTAS AR BEDS24, IZLASIET VISU APRAKSTU ŠEIT. Pēc noklusējuma Jomres ir paredzēts, lai pārvaldītu daudzpārdevēju rezervēšanas platformas. īpašumus uz un no gultas24 droši. Šis iestatījums ļauj ignorēt šo funkcionalitāti, visiem īpašumiem piešķirot vienu API atslēgu. Tas nozīmē, ka jums ir nepieciešams tikai viens konts pakalpojumā Beds24, taču tas nozīmē arī to, ka visas izmaksas tiks uzkrātas no šī viena konta. Jebkurš pārvaldnieks, kuram ir piekļuve īpašumam, varēs nosūtīt īpašuma atjauninājumus gultas24 serveros. Atstājiet tukšu, lai ignorētu šo iestatījumu, un piespiediet īpašumu pārvaldniekus izmantot savus Beds24 kontus. Tik ilgi API atslēga var būt jebkurā vēlamajā formā jo atslēga šeit sakrīt ar <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> <em> API 1. atslēga </em> </ a> lauks.Ja jums jau ir instalācija ON OF JOMRES AR ĪPAŠĪBĀM, KAS SAISTĪTAS AR BEDS24: Jūs varat pāriet uz šīs funkcijas izmantošanu, taču vispirms ir jāapgriež (jāiztukšo) šīs tabulas, jāizdzēš esošie rekvizīti, kas jau atrodas Jomres, un pēc tam atkārtoti jāimportē rekvizīti no Beds24 uz Jomres. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Iestatot API atslēgu Beds24 konta piekļuves lapas sadaļā <em> API atslēga N </em>, ir svarīgi iestatīt lauku <em> API atslēgas piekļuve </em> uz Atļaut tikai baltā saraksta IP, un jūs iestatāt IP numuru uz <strong>". $this_servers_ip_number. "</strong> Tas vienādi attiecas uz galvenās API atslēgas konfigurāciju šeit un priekšgalā, ja īpašuma pārvaldnieks konfigurē savu individuālo API atslēgas. ");
jr_define ('BEDS24V2_WHITELIST_WARNING', "Ja jūsu īpašumi jau ir pievienoti Beds24, ņemiet vērā, ka Beds24 nesen ir ieviesusi politiku, saskaņā ar kuru visiem serveriem, kas savienojas ar jūsu kontu, ir jābūt iekļautam baltajā sarakstā. To var izdarīt lapā Konta piekļuve, kur ir ievadīta jūsu piekļuves atslēga. Atlasiet nolaižamo izvēlni Baltā saraksta IP un iestatiet IP numuru uz ");