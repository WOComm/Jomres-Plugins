<?php
/**
 * Plugin
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable. 
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define( '_JOMRES_ICAL_EVENT', "Evento iCal" );
jr_define( '_JOMRES_ICAL_FEED', "Feed iCal" );
jr_define( '_JOMRES_ICAL_FEED_LINK', "URL del Feed iCal" );
jr_define( '_JOMRES_ICAL_FEEDS', "Feeds iCal" );
jr_define( '_JOMRES_ICAL_FEEDS_DESC', "I tuoi feed iCal possono visualizzare le prenotazioni imminenti in un calendario remoto incluso il tuo dispositivo mobile, Google Calendar, Apple Calendar, Thunderbird, Outlook e altro. Utilizza i seguenti URL per iscriverti ai feed nel tuo software di calendario." );
jr_define( '_JOMRES_ICAL_ANON', "URL del Feed iCal anonimizzato" );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', "Consentire l'accesso anonimo ai feed iCal?" );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', "Se questa opzione è abilitata, il tuo feed eventi iCal sarà disponibile per tutti, ma senza i dettagli della prenotazione o degli ospiti." );
jr_define( '_JOMRES_ICAL_IMPORT', "Importazione iCal" );
jr_define( '_JOMRES_ICAL_SELECT', "Selezionare il file da importare" );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', "Errore, nessun file caricato." );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Quando importi un file iCal, la data di termine dell'evento dovrebbe essere la data di partenza dell'ospite. Il Riepilogo dovrebbe essere il nome dell'ospite. La descrizione dell'evento può contenere tutti gli altri dettagli." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', "Questo numero di prenotazione esiste già nel sistema." );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', "Nessuna camera disponibile nelle date selezionate." );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', "Nessun evento trovato nel file ics." );
jr_define( '_JOMRES_ICAL_SUCCESS', "Evento importato con successo" );
jr_define( '_JOMRES_ICAL_FAILURE', "Impossibile importare l'evento" );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', "Nome dell'ospite" );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', "Descrizione dell'evento" );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', "Inizio" );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', "Termine" );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', "Risultato" );
jr_define( '_JOMRES_ICAL_WITHHELD', "Trattenuto" );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', "I tuoi feed iCal possono visualizzare le prenotazioni imminenti in un calendario remoto incluso il tuo dispositivo mobile, Google Calendar, Apple Calendar, Thunderbird, Outlook e altro." );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', "Questa funzione ti consente di sincronizzare le prenotazioni da siti come Airbnb, Homeway e altri su Jomres. Dovrai inserire l'URL del feed iCal della tua struttura per ogni sito con cui desideri sincronizzarti. Se qualcuno prenoterà la tua struttura su Airbnb, ad esempio, quelle date verranno visualizzate come bloccate (prenotazioni bloccate) anche su Jomres, quindi nessuno potrà prenotare per quelle date da qui. Questo non sincronizzerà i dettagli della prenotazione tra i siti (come i dettagli degli ospiti, i prezzi, le fatture, ecc.) Ma è un modo piacevole e semplice per evitare doppie prenotazioni sincronizzando solo la disponibilità." );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', "Impostazioni di sincronizzazione iCal" );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', "Impostazioni feed iCal" );
jr_define( '_JOMRES_ICAL_SYNC_URL1', "External iCal URL" );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', "Includere anche richieste di prenotazione?" );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', "Se abilitato, includerà anche le prenotazioni non ancora approvate (se la funzione di approvazione delle prenotazioni è abilitata). Mantenere questa opzione disabilitata è un ottimo modo per nascondere le prenotazioni dal calendario che potrebbero essere in attesa di conferma in uno status non approvato/richiesta. Se le prenotazioni non richiedono l'approvazione (la funzione di approvazione delle prenotazioni è disabilitata), tutte le prenotazioni verranno esportate." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', "Feeds Remoti iCal" );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', "URL Remoto" );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', "ID della Camera" );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', "Nome/Numero della camera" );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Selezionare la camera su cui questo feed avrà effetto e l'URL del sito remoto. Quando importi un file iCal, la data di termine dell'evento dovrebbe essere la data di partenza dell'ospite. Il Riepilogo dovrebbe essere il nome dell'ospite. La descrizione dell'evento può contenere tutti gli altri dettagli." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', "Feed remoto Ical creato" );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', "Feed remoto Ical eliminato" );
