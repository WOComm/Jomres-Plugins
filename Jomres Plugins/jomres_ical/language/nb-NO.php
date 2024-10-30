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
jr_define ('_JOMRES_ICAL_EVENT', 'iCal -hendelse');
jr_define( '_JOMRES_ICAL_FEED', 'iCal Feed' );
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCal Feed URL' );
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal-feed/s' );
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'iCal-feedene dine kan vise kommende bestillinger i en ekstern kalender, inkludert mobilenheten din, Google Kalender, Apple-kalender, Thunderbird, Outlook og mer. Bruk følgende URL-er for å abonnere på feed/er i kalenderprogramvaren din.' );
jr_define ('_JOMRES_ICAL_ANON', 'Anonymisert iCal Feed URL');
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Tillate anonym tilgang til iCal-feed/er?' );
jr_define ('_JOMRES_ICAL_ALLOW_ANON_DESC', 'Hvis dette alternativet er aktivert, vil iCal -hendelsesfeeden din være tilgjengelig for alle, men uten booking eller gjesteopplysninger.');
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal Import' );
jr_define( '_JOMRES_ICAL_SELECT', 'Velg fil som skal importeres' );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Feil, ingen fil ble lastet opp.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Når du importerer en iCal-fil, bør sluttdatoen for begivenheten være gjestens avreisedato. Sammendraget skal være gjestens navn. Begivenhetsbeskrivelse kan inneholde alle andre detaljer." );

jr_define ('_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Dette bestillingsnummeret finnes allerede i systemet.');
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Ingen rom er tilgjengelige på de valgte datoene.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'Ingen hendelser ble funnet i ics-filen.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Hendelse importert vellykket' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Hendelse kunne ikke importeres' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Gjestens navn' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Begivenhetsbeskrivelse' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Start' );
jr_define ('_JOMRES_ICAL_RESULT_HEADER_END', 'End');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Resultat' );
jr_define( '_JOMRES_ICAL_WITHHELD', 'Tilbakeholdt' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'iCal-feedene dine kan vise kommende bestillinger i en ekstern kalender inkludert mobilenheten din, Google Kalender, Apple-kalender, Thunderbird, Outlook og mer.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Denne funksjonen lar deg synkronisere bestillinger fra nettsteder som Airbnb, Homeway og andre til Jomres. Du må angi eiendommens iCal-feed-url for hvert nettsted du vil synkronisere med. Hvis noen vil bestill eiendommen din på Airbnb for eksempel, vil disse datoene vises som blokkerte (svarte bestillinger) på denne Jomres-siden også, så ingen kan også bestille disse datoene her. Dette vil ikke synkronisere bestillingsdetaljer mellom nettsteder (som gjestedetaljer, priser, fakturaer osv.), men det er en fin og enkel måte å unngå dobbeltbestillinger ved å synkronisere bare tilgjengeligheten.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'iCal Sync-innstillinger' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'iCal-feedinnstillinger' );
jr_define ('_JOMRES_ICAL_SYNC_URL1', 'Ekstern iCal URL');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQURIES', 'Ta også med bestillingsforespørsler?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQURIES_DESC', 'Hvis aktivert, vil det også inkludere bestillinger som ikke er godkjent ennå (hvis funksjonen for bestillingsgodkjenning er aktivert). Å holde dette alternativet deaktivert er en fin måte å skjule bestillinger fra kalenderen som kanskje venter på bekreftelse i en status som ikke er godkjent/forespørsel. Hvis bestillinger ikke krever godkjenning (funksjonen for godkjenning av bestillinger er deaktivert), vil alle bestillinger bli eksportert. ');

jr_define ('_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Ekstern URL' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'Rom-UID' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Romnavn/nummer' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Velg rommet som denne feeden vil påvirke, og den eksterne sidens url. Når du importerer en iCal-fil, skal sluttdatoen for arrangementet være gjestens avreisedato. Sammendraget skal være gjestens navn. Hendelse beskrivelse kan inneholde alle andre detaljer." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical ekstern feed opprettet' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical ekstern feed slettet' );