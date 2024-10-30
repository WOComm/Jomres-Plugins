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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################
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
jr_define( 'BEDS24V2_CHANNEL_MANAGEMENT', 'Kanaalbeheer (Beds24)');

jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Bedden24');
jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Als u een Beds24-account heeft en Beds24 wilt bijwerken wanneer u een boeking heeft, selecteert u deze optie. Stel de URL in op https://www.beds24.com/api/json/ ');
jr_define( 'BEDS24V2_ERROR_USER_NO_KEY', 'Deze gebruiker heeft geen API-sleutels ingesteld, dus kan niet doorgaan. Bezoek hun pagina op de pagina Gebruikersbeheer > Property Managers en maak een nieuwe API-sleutel voor hen aan met behulp van de link op die pagina.');
jr_define( 'BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Deze gebruiker heeft geen Jomres-eigenschappen die ze kunnen toewijzen aan Beds24-eigenschappen, of omgekeerd');
jr_define( 'BEDS24V2_NOT_SUBSCRIBED', "De manager waarmee u bent ingelogd, lijkt geen account te hebben bij Beds24, dus u moet zich eerst registreren voor hun service en vervolgens deze API-sleutel opslaan op <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'>Beds24's website hier.</a>" );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_KEY', "Kopieer en plak deze API-sleutel in het veld LINK in uw Beds24-account om door te gaan.");
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Als je dat hebt gedaan, klik dan op de onderstaande knop om door te gaan." );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24 eigendom koppelen");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_INFO', "Op deze pagina kunt u de eigenschappen bekijken waartoe u toegang hebt in dit systeem, plus de eigenschappen die aanwezig zijn in de Channel Manager. U kunt er ook eigenschappen uit de Channel Manager in dit systeem importeren of exporteren bestaande eigenschappen naar de Channel Manager. <br/> Als je eigenschappen zowel in dit systeem als in Beds24 hebt en je wilt ze aan elkaar koppelen, kun je de Property apikey gebruiken om dat te doen. Ga naar Beds24 > Instellingen > Eigenschappen (zorg ervoor dat de eigenschap die is geselecteerd in de vervolgkeuzelijst is dezelfde als degene die u wilt koppelen) sla vervolgens in het submenu Koppelen de 'Property apikey' op in het veld 'propKey' in Beds24. Zodra u dat hebt gedaan, laadt u de pagina opnieuw. Dit systeem zal zorg ervoor dat de twee eigenschappen aan dezelfde sleutel zijn gekoppeld en maak de benodigde koppelingen. Als de twee eigenschappen eenmaal zijn gekoppeld, vergeet dan niet om naar de pagina Eigenschappen bekijken te gaan, de meldings-URL te zoeken en die in het veld Koppelingspagina 'Url melden' te plakken. Dat zal zorg ervoor dat Beds24 de juiste link gebruikt om boekingen met die accommodatie te synchroniseren wanneer deze boekingen ontvangt. ");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Fout: Er zijn geen eigendommen waarnaar je kunt linken in Beds24. Dit kan zijn omdat alle eigendommen waarvoor je rechten hebt al gekoppeld zijn aan een ander account op dit systeem." );
jr_define('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Property uid");
jr_define('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Eigenschapnaam");
jr_define('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid");
jr_define('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24 eigenschapsnaam");
jr_define('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Property apikey");
jr_define('BEDS24_LISTPROPERTIES_IMPORT', "Importeren");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Kamertypes configureren");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Hier moet u kamertypes in uw Beds24-account koppelen aan de kamertypes die in dit systeem zijn opgeslagen.");
jr_define('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Beds24 kamertype");

jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Kan deze eigenschap nog niet importeren omdat je de eigenschapssleutel niet hebt ingesteld op de pagina Property Link.");
jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Kan deze accommodatie nog niet importeren omdat deze geen kamers heeft. Maak een of meer kamers aan (kamers in Beds24 zijn hetzelfde als kamertypes in Jomres) en vergeet niet de minimumprijs in te stellen Als je dat hebt gedaan, kun je het kamertype importeren in Jomres en ze koppelen aan de huidige Jomres kamertypes. Daarna kun je de tarieven wijzigen, maar er moet een minimumprijs worden ingesteld.");
jr_define('_BEDS24_SUGGESTED_KEY', "We raden u aan deze API-sleutel te gebruiken. Als u dat hebt gedaan, laadt u deze pagina opnieuw.");
jr_define('BEDS24_LISTPROPERTIES_EXPORT', "Exporteren");
jr_define( 'BEDS24V2_REST_API_INTRO', "Hier kunt u uw REST API-sleutelpaar en het pad naar de API zien. Als u deze gegevens opslaat in uw account op Beds24, kan Beds24 24 contact opnemen met deze site via de API." );
jr_define('BEDS24V2_REST_API_CLIENT_ID', "Client-ID");
jr_define('BEDS24V2_REST_API_CLIENT_SECRET', "Cliëntgeheim");
jr_define( 'BEDS24V2_REST_API_ENDPOINT', "URI (eindpunt)");
jr_define('BEDS24_LISTPROPERTIES_CONFIGURE', "Bekijk eigendom");
jr_define('BEDS24_ROOM_TYPES_TITLE', "Associaties van kamertypes");

jr_define('BEDS24_ROOM_TYPES_INFO', "Op deze pagina kunt u uw kamertypes koppelen aan de kamertypes die zijn opgeslagen op de Beds24-servers.");
jr_define('BEDS24_ROOM_TYPES_INFO2', "Totdat kamertypes zijn gekoppeld, kunt u geen boekingsinformatie ontvangen die door Beds24 is verzonden. Als uw accommodatie is geïmporteerd/geëxporteerd van of naar Beds24, hebben we automatisch links voor u gemaakt, maar als u een nieuw kamertype, of verwijder er een, dan kan deze pagina worden gebruikt om ervoor te zorgen dat het kamertype correct wordt gekoppeld.");
jr_define('BEDS24_ROOM_TYPES_INFO3', "Kies de Beds24 kamertypes die u wilt associëren met de kamertypes in dit systeem, en wanneer u klaar bent klikt u op Opslaan om de wijzigingen in Beds24 bij te werken.");
jr_define('BEDS24_ROOM_TYPES_YOURS', "Uw kamertypes");
jr_define('BEDS24_ROOM_TYPES_BEDS24', "Beds24 kamertypes");
jr_define('BEDS24_ROOM_TYPES_NONE', "Deze accommodatie heeft geen kamertypes, dus het kan niet worden gekoppeld aan Beds24-kamertypes. Wilt u kamertypes importeren uit Beds24?");
jr_define('BEDS24_IMPORT_ROOMS', "Importeer kamers");
jr_define('BEDS24_EXPORT_BOOKINGS', "Exporteer boekingen");
jr_define('BEDS24_IMPORT_BOOKINGS', "Reserveringen importeren");
jr_define('BEDS24_IMPORT_EXPORT', "Je kunt bestaande boekingen van en naar Beds24 met één klik op de knop importeren en exporteren. Boekingen geïmporteerd uit Beds24 worden geïmporteerd vanaf gisteren en bevatten alle boekingen van het volgende jaar. Gebruik deze knoppen pas daarna eerst importeren of exporteren van de woning in het systeem. Eenmaal ingesteld, wordt import en/of export automatisch gedaan.");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Prijzen bijwerken naar Beds24?");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "U kunt ervoor kiezen om Beds24 te updaten met alleen beschikbaarheid of zowel beschikbaarheid als prijzen. Als u specifieke situaties gebruikt waarin u het Beds24-bedieningspaneel wilt gebruiken voor het instellen van specifieke prijzen voor specifieke kanalen, moet u dit instellen op Nee.");
jr_define('_BEDS24_CONTROL_PANEL_DIRECT', "Directe link");
jr_define('BEDS24_IMPORT_NOTIFICATION_URLS', "Als je deze eigenschap in Jomres hebt geïmporteerd, moet je de Notify Url handmatig wijzigen in je Beds24 -> Property -> Link-instellingen naar het volgende:");
jr_define('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "U heeft momenteel geen eigendommen die zijn gekoppeld aan Beds24-eigendommen. U moet de API-sleutels van uw manager resetten voordat uw managers kunnen proberen verbinding te maken met Beds24. Dit zorgt ervoor dat ze allemaal unieke sleutels hebben.");
jr_define('BEDS24V2_ERROR_KEYS_REBUILD', "Reset manager API-sleutels nu");
jr_define('BEDS24V2_ERROR_KEYS_DISMISS', "Negeer waarschuwing");
jr_define('BEDS24V2_ERROR_KEYS_DONE', "Manager API-sleutels zijn opnieuw ingesteld");

jr_define('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Beds24 eigendomslinks");
jr_define('BEDS24_ASSIGN_MANAGER', "Beds24 Change Manager");
jr_define('BEDS24_ASSIGN_MANAGER_DESC', "Wanneer een manager de pagina Kanaalbeheer (Bed24) in de frontend bekijkt, worden alle eigenschappen die een API-sleutel delen in zowel Jomres als Beds24 automatisch gekoppeld binnen Jomres. Evenzo worden alle eigenschappen die door de manager worden geïmporteerd of geëxporteerd zijn gekoppeld. U kunt de beheerder waaraan een woning is gekoppeld wijzigen door de vervolgkeuzelijst voor beheerder op deze pagina te wijzigen en vervolgens op Opslaan te klikken.");
jr_define('BEDS24V2_TARIFFS_TITLE', "Tarieven exporteren");
jr_define( 'BEDS24V2_TARIFF_EXPORT_DESC', "U kunt de tarieven die u heeft gemaakt naar Beds24 exporteren naar een specifiek dagtarief. Als u deze functie gaat gebruiken, moet u de optie 'Prijzen bijwerken naar Beds24?' in de Eigenschapsconfiguratie instellen op Nee. U moet mogelijk ook uw woning configureren in het Beds24-configuratiescherm zodat u meerdere dagtarieven kunt hebben. Ga hiervoor naar Instellingen > Eigenschappen > Kamers > Dagprijzen en configureer het 'Aantal dagprijzen' naar het aantal prijzen dat u wilt . Als je dat hebt gedaan, kun je op een van de P-knoppen klikken om dat dagtarief in te stellen." );
jr_define('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Tariefnaam");
jr_define('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Kamertype");
jr_define('BEDS24V2_BOOKING_RESEND', "Melding opnieuw verzenden");
jr_define( 'BEDS24V2_BOOKING_DATA_AT_B24', "Dit is de boekingsinformatie zoals opgeslagen op Beds24. Tenzij u zeker weet dat de gegevens onjuist zijn, hoeft u de boeking niet opnieuw naar Beds24 te sturen. " );
jr_define( 'BEDS24V2_BOOKING_NO_DATA_AT_B24', "Deze boeking lijkt niet te zijn gekoppeld aan een boeking op Beds24. U kunt de knop Opnieuw verzenden gebruiken om deze boeking naar beds24 te exporteren." );

jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonimiseer gasten?" );
jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Als boekingen worden verzonden naar de kanaalbeheerder, raden we u aan de gastgegevens te anonimiseren. Als u deze optie instelt op ja, wanneer boekingsinformatie naar de kanaalbeheerder wordt verzonden, worden de naam van de gast en het e-mailadres niet OTA's hebben een nauwkeurige registratie van uw beschikbaarheid zonder dat u meer informatie hoeft te delen dan nodig is. Dit betekent dat u voldoet aan de AVG, want als de gast er later voor kiest om zijn gegevens op dit systeem te verwijderen (u krijgt geen melding wanneer dit gebeurt), worden hun gegevens niet achtergelaten bij andere gegevensbeheerders waarover u geen controle hebt. Indien nodig kunt u nog steeds boekingen in dit systeem kruisverwijzen naar die op de kanaalbeheerder, op de pagina Reserveringsdetails ziet u het boekingsnummer voor deze boeking zoals deze is opgeslagen in de channel manager." );
jr_define('BEDS24V2_MASTER_APIKEY', "EXPERIMENTELE FUNCTIE - Master Beds24 API-sleutel");
jr_define( 'BEDS24V2_MASTER_APIKEY_DESC', "ALS U AL EEN INSTALLATIE VAN JOMRES HEBT MET EIGENSCHAPPEN GEKOPPELD AAN BEDS24 LEES HIER DE VOLLEDIGE BESCHRIJVING. Standaard is Jomres ontworpen als een multi-vendor boekingsplatform. Managers die hun eigen beds24-accounts hebben, kunnen hun eigen beds24-accounts importeren. eigenschappen veilig van en naar beds24. Met deze instelling kunt u die functionaliteit overschrijven door een enkele API-sleutel voor alle eigenschappen te hebben. Dit betekent dat u slechts één account bij Beds24 nodig hebt, maar het betekent ook dat alle kosten door dat ene account worden gegenereerd. Elke beheerder met toegang tot een accommodatie kan updates naar de accommodatie sturen op de beds24-servers. Laat dit veld leeg om deze instelling te negeren en dwing propertymanagers om hun eigen Beds24-accounts te gebruiken. De API-sleutel kan elke gewenste vorm aannemen, zo lang omdat de sleutel hier overeenkomt met die in de <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'><em>API-sleutel 1</em> </ a> veld. ALS U AL EEN INSTALLATI HEBT EEN VAN JOMRES MET EIGENSCHAPPEN GEKOPPELD AAN BEDS24: u kunt overschakelen naar het gebruik van deze functie, maar het zou vereisen dat u deze tabellen eerst afkapt (leegt), de bestaande eigenschappen verwijdert die al in Jomres staan, en dat u vervolgens de eigenschappen opnieuw importeert van Beds24 naar Jomres. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Wanneer u uw API-sleutel instelt in het gedeelte <em>API-sleutel N</em> van de pagina Accounttoegang van Beds24, is het essentieel dat u het veld <em>API-sleuteltoegang</em> instelt op ' Alleen witte lijst toestaan' en u stelt het IP-nummer in op <strong>".$this_servers_ip_number ."</strong> Dit geldt zowel voor de hoofd-API-sleutelconfiguratie hier als in de frontend als een propertymanager zijn eigen individuele API configureert sleutels." );
jr_define( 'BEDS24V2_WHITELIST_WARNING', "Als uw eigendommen al zijn verbonden met Beds24, moet u er rekening mee houden dat Beds24 onlangs een beleid heeft ingevoerd waarbij alle servers die verbinding maken met uw account op de witte lijst moeten staan. U kunt dit doen op de pagina Accounttoegang, waar uw toegangssleutel is ingevoerd Selecteer de Whitelist IP dropdown en stel het IP-nummer in op " );

