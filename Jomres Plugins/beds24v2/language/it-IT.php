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

jr_define( 'BEDS24V2_CHANNEL_MANAGEMENT', 'Gestione canali (Beds24)' );

jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24' );
jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Se hai un account Beds24 e vuoi aggiornare Beds24 quando hai una prenotazione, seleziona questa opzione. Imposta l\'URL su https://www.beds24.com/api/json/ ' );
jr_define( 'BEDS24V2_ERROR_USER_NO_KEY', 'Questo utente non ha chiavi API impostate, quindi non può continuare. Visita la loro pagina nella pagina Gestione utenti > Gestori proprietà e crea una nuova chiave API per loro utilizzando il link fornito in quella pagina.' );
jr_define( 'BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Questo utente non ha proprietà Jomres che può assegnare alle proprietà Beds24, o viceversa' );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED', "Il manager con cui hai effettuato l'accesso non sembra avere un account con Beds24, quindi dovrai prima registrarti per il loro servizio, quindi salvare questa chiave API su <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'>Sito web di Beds24 qui.</a>" );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_KEY', "Copia e incolla questa chiave API nel campo LINK del tuo account Beds24 per continuare." );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Quando lo hai fatto, clicca sul pulsante qui sotto per continuare." );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Collegamento proprietà Beds24" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_INFO', "Questa pagina ti permette di visualizzare le proprietà a cui hai accesso in questo sistema, più quelle che esistono nel Channel Manager. Ti permette anche di importare proprietà dal Channel Manager in questo sistema, o esportare proprietà esistenti al Channel Manager. <br/> Se hai proprietà sia in questo sistema che in Beds24 e vuoi collegarle tra loro, puoi usare l'apikey Proprietà per farlo. Visita Beds24 > Impostazioni > Proprietà (assicurati che la proprietà selezionata nel menu a tendina è uguale a quella che vuoi collegare) quindi nel sottomenu Link salva la 'Property apikey' nel campo 'propKey' in Beds24. Fatto ciò, ricarica la pagina. Questo sistema vedere che le due proprietà sono associate alla stessa chiave e creare le associazioni necessarie.Una volta collegate le due proprietà, ricordarsi di visitare la pagina Visualizza proprietà, trovare l'URL di notifica e incollarlo nel campo 'Notifica URL' della pagina Collegamento. quello sarà assicurati che Beds24 utilizzi il collegamento corretto per sincronizzare le prenotazioni con quella struttura quando riceve le prenotazioni. ");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Errore: non ci sono proprietà a cui puoi collegarti in Beds24. Ciò può essere dovuto al fatto che tutte le proprietà di cui hai i diritti sono già state collegate a un altro account su questo sistema." );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Proprietà uid" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Nome proprietà" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Uid proprietà Beds24" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Nome proprietà Beds24" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Proprietà apikey" );
jr_define('BEDS24_LISTPROPERTIES_IMPORT', "Importa");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Configura i tipi di stanza");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Qui devi collegare i tipi di camera nel tuo account Beds24 con quelli memorizzati in questo sistema.");
jr_define('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Tipo di camera Beds24");

jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Non posso ancora importare questa proprietà perché non hai impostato la Chiave Proprietà nella pagina Link Proprietà.");
jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Non è ancora possibile importare questa proprietà perché non ha stanze. Crea una o più stanze (le stanze in Beds24 sono le stesse di quelle in Jomres) e non dimenticare di impostare il prezzo minimo . Una volta fatto ciò puoi importare la tipologia di camera in Jomres e associarla alle tipologie di camera Jomres attuali. Dopodiché potrai modificare le tariffe, ma è necessario impostare un prezzo minimo.");
jr_define('_BEDS24_SUGGESTED_KEY', "Ti consigliamo di utilizzare questa chiave API. Quando l'hai fatto, ricarica questa pagina.");
jr_define('BEDS24_LISTPROPERTIES_EXPORT', "Esporta");
jr_define( 'BEDS24V2_REST_API_INTRO', "Qui puoi vedere la tua coppia di chiavi API REST e il percorso dell'API. Se salvi questi dettagli nel tuo account su Beds24, Beds24 24 sarà in grado di contattare questo sito tramite la sua API.");
jr_define( 'BEDS24V2_REST_API_CLIENT_ID', "ID cliente" );
jr_define( 'BEDS24V2_REST_API_CLIENT_SECRET', "Segreto cliente" );
jr_define( 'BEDS24V2_REST_API_ENDPOINT', "URI (endpoint)" );
jr_define('BEDS24_LISTPROPERTIES_CONFIGURE', "Visualizza proprietà");
jr_define('BEDS24_ROOM_TYPES_TITLE', "Associazioni tipo stanza");

jr_define('BEDS24_ROOM_TYPES_INFO', "Questa pagina ti permette di associare le tue tipologie di camere a quelle memorizzate nei server di Beds24.");
jr_define('BEDS24_ROOM_TYPES_INFO2', "Fino a quando i tipi di camera non saranno collegati, non potrai ricevere informazioni sulla prenotazione inviate da Beds24. Se la tua struttura è stata importata/esportata da o verso Beds24, abbiamo creato automaticamente dei link per te, tuttavia se aggiungi un nuova tipologia di camera, o cancellarne una, allora questa pagina può essere utilizzata per assicurarsi che le tipologie di camera siano correttamente associate.");
jr_define('BEDS24_ROOM_TYPES_INFO3', "Scegli i tipi di camera Beds24 che vuoi associare ai tipi di camera in questo sistema, e quando hai fatto clicca su Salva per aggiornare le modifiche a Beds24.");
jr_define('BEDS24_ROOM_TYPES_YOURS', "I tuoi tipi di camera");
jr_define('BEDS24_ROOM_TYPES_BEDS24', "Tipi di camera Beds24");
jr_define('BEDS24_ROOM_TYPES_NONE', "Questa proprietà non ha tipologie di camere, quindi non può essere collegata ad alcuna tipologia di camera Beds24. Vuoi importare tipologie di camera da Beds24?");
jr_define('BEDS24_IMPORT_ROOMS', "Importa stanze");
jr_define('BEDS24_EXPORT_BOOKINGS', "Esporta prenotazioni");
jr_define('BEDS24_IMPORT_BOOKINGS', "Importa prenotazioni");
jr_define('BEDS24_IMPORT_EXPORT', "Puoi importare ed esportare le prenotazioni esistenti da e verso Beds24 con un clic. Le prenotazioni importate da Beds24 vengono importate da ieri e includeranno tutte le prenotazioni dell'anno successivo. Dovresti usare questi pulsanti solo dopo prima importare o esportare la proprietà nel sistema. Una volta impostata, l'importazione e/o l'esportazione verranno eseguite automaticamente.");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Aggiorna prezzi a Beds24?");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Puoi scegliere di aggiornare Beds24 solo con la disponibilità o con disponibilità e prezzi. Se utilizzi situazioni specifiche in cui desideri utilizzare il pannello di controllo di Beds24 per impostare prezzi specifici per canali specifici dovresti lasciare questo set a No.");
jr_define('_BEDS24_CONTROL_PANEL_DIRECT', "Collegamento diretto");
jr_define('BEDS24_IMPORT_NOTIFICATION_URLS', "Se hai importato questa proprietà in Jomres, dovrai modificare manualmente l'URL di notifica in Beds24 -> Proprietà -> Collega le impostazioni al seguente:");
jr_define('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Attualmente non hai alcuna proprietà associata alle proprietà di Beds24. Devi reimpostare le chiavi API del tuo manager prima di consentire ai tuoi manager di tentare di connettersi con Beds24. Questo assicurerà che tutti abbiano chiavi univoche.");
jr_define('BEDS24V2_ERROR_KEYS_REBUILD', "Reimposta le chiavi API del gestore ora");
jr_define('BEDS24V2_ERROR_KEYS_DISMISS', "Ignora avviso");
jr_define('BEDS24V2_ERROR_KEYS_DONE', "Le chiavi API Manager sono state reimpostate");

jr_define( 'BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Link alle proprietà di Beds24" );
jr_define('BEDS24_ASSIGN_MANAGER', "Gestore cambio Beds24");
jr_define('BEDS24_ASSIGN_MANAGER_DESC', "Quando un manager visualizza la pagina Channel Management (Bed24) nel frontend, tutte le proprietà che condividono una chiave API sia in Jomres che in Beds24 vengono automaticamente collegate all'interno di Jomres. Allo stesso modo, tutte le proprietà importate o esportate dal manager sono collegati. Puoi cambiare il gestore a cui è collegata una proprietà modificando il menu a discesa del gestore in questa pagina e facendo clic su Salva.");
jr_define( 'BEDS24V2_TARIFFS_TITLE', "Esportazione tariffa" );
jr_define( 'BEDS24V2_TARIFF_EXPORT_DESC', "Puoi esportare le tariffe che hai creato su Beds24 a una tariffa giornaliera specifica. Se intendi utilizzare questa funzione dovresti impostare l'opzione 'Aggiorna prezzi a Beds24?' nella Configurazione della proprietà su No. Tu potrebbe anche essere necessario configurare la tua proprietà nel pannello di controllo di Beds24 in modo da poter avere più tariffe giornaliere.Per farlo vai su Impostazioni> Proprietà> Camere> Prezzi giornalieri e configura il 'Numero di prezzi giornalieri' al numero di prezzi che desideri . Una volta fatto ciò, potrai fare clic su uno dei pulsanti P per impostare quella tariffa giornaliera.");
jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Nome tariffa" );
jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Tipo di camera" );
jr_define( 'BEDS24V2_BOOKING_RESEND', "Reinvia notifica" );
jr_define( 'BEDS24V2_BOOKING_DATA_AT_B24', "Queste sono le informazioni sulla prenotazione memorizzate su Beds24. A meno che tu non sia sicuro che i dati non siano corretti, non dovresti inviare nuovamente la prenotazione a Beds24.");
jr_define( 'BEDS24V2_BOOKING_NO_DATA_AT_B24', "Questa prenotazione non sembra essere associata ad una prenotazione su Beds24. Puoi usare il pulsante Reinvia per esportare questa prenotazione su letti24." );

jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonimi ospiti?" );
jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Quando le prenotazioni vengono inviate al channel manager, ti consigliamo di rendere anonimi i dettagli dell'ospite. Se imposti questa opzione su sì, quando le informazioni di prenotazione vengono inviate al channel manager il nome dell'ospite, l'indirizzo email non sono Le OTA avranno una registrazione accurata della tua disponibilità senza che tu debba condividere più informazioni del necessario.Ciò significa che sei conforme al GDPR perché se l'ospite dovesse successivamente scegliere di cancellare i propri dati su questo sistema (non verrai avvisato quando questo accade), i loro dati non vengono lasciati ad altri titolari del trattamento sui quali non hai alcun controllo.Se necessario, puoi comunque incrociare le prenotazioni in questo sistema con quelle del channel manager, la pagina Dettagli Prenotazione ti mostrerà il numero di prenotazione per questa prenotazione così come è memorizzata nel channel manager." );
jr_define( 'BEDS24V2_MASTER_APIKEY', "CARATTERISTICA SPERIMENTALE - Chiave API Master Beds24" );
jr_define( 'BEDS24V2_MASTER_APIKEY_DESC', "SE HAI GIÀ UN'INSTALLAZIONE DI JOMRES CON PROPRIETÀ COLLEGATE A BEDS24 LEGGI L'INTERA DESCRIZIONE QUI. Per impostazione predefinita Jomres è progettato per essere una piattaforma di prenotazione multi-vendor. I gestori che hanno i propri account bed24 possono importare i propri proprietà da e verso Beds24 in modo sicuro. Questa impostazione ti consente di ignorare tale funzionalità avendo un'unica chiave API per tutte le proprietà. Ciò significa che hai bisogno di un solo account con Beds24, tuttavia significa anche che tutte le spese verranno accumulate da quell'unico account. Qualsiasi gestore con accesso a una proprietà sarà in grado di inviare aggiornamenti alla proprietà sui server di bed24. Lascia vuoto per ignorare questa impostazione e costringere i gestori di proprietà a utilizzare i propri account Beds24. La chiave API può assumere qualsiasi forma tu voglia, quindi a lungo poiché la chiave qui corrisponde a quella nella <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'><em>Chiave API 1</em> </ a> SE HAI GIÀ UN'INSTALLAZIONE SU JOMRES CON PROPRIETÀ COLLEGATE A BEDS24 : Puoi passare all'utilizzo di questa funzione, tuttavia sarebbe necessario prima troncare (svuotare) queste tabelle, eliminare le proprietà esistenti che sono già in Jomres e quindi reimportare le proprietà da Beds24 a Jomres. XXXXX_jomres_beds24_contract_booking_number_xref , XXXXX_jomres_beds24_property_uid_xref , XXXXX_jomres_beds24_rest_api_key_xref , XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Quando imposti la tua chiave API nella sezione <em>Chiave API N</em> della pagina Accesso all'account di Beds24, è fondamentale impostare il campo <em>Accesso chiave API</em> su ' Consenti solo IP nella whitelist' e imposti il ​​numero IP su <strong>".$this_servers_ip_number ."</strong> Questo vale anche per la configurazione della chiave API principale qui e nel frontend se un gestore di proprietà sta configurando la propria API individuale chiavi.");
jr_define( 'BEDS24V2_WHITELIST_WARNING', "Se le tue proprietà sono già state connesse a Beds24, tieni presente che Beds24 ha recentemente introdotto una politica in base alla quale tutti i server che si collegano al tuo account devono essere stati autorizzati. Puoi farlo nella pagina Accesso all'account, dove la tua chiave di accesso è stata inserita. Seleziona il menu a tendina Whitelist IP e imposta il numero IP su " );