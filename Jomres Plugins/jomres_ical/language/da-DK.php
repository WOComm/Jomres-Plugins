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


jr_define( '_JOMRES_ICAL_EVENT', 'iCal Event' );
jr_define( '_JOMRES_ICAL_FEED', 'iCal Feed' );
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCal Feed URL');
jr_define ('_JOMRES_ICAL_FEEDS', 'iCal Feed/s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Dine iCal-feeds kan vise kommende reservationer i en fjernkalender, inklusive din mobilenhed, Google Kalender, Apple Kalender, Thunderbird, Outlook og mere. Brug følgende URL\'er til at abonnere på feeds i din kalendersoftware.' );
jr_define( '_JOMRES_ICAL_ANON', 'Anonymiseret iCal-feed-URL');
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Tillade anonym adgang til iCal-feeds?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Hvis denne mulighed er aktiveret, vil dit iCal-begivenhedsfeed være tilgængeligt for alle, men uden reservation eller gæsteoplysninger.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal Import' );
jr_define( '_JOMRES_ICAL_SELECT', 'Vælg fil til import' );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Fejl, ingen fil blev uploadet.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Når du importerer en iCal-fil, skal begivenhedens slutdato være gæstens afrejsedato. Resuméet skal være gæstens navn. Begivenhedsbeskrivelse kan indeholde alle andre detaljer." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Dette reservationsnummer findes allerede i systemet.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Der er ingen ledige værelser på de valgte datoer.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'Ingen hændelser blev fundet i ics-filen.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Begivenhed importeret med succes' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Begivenhed kunne ikke importeres' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Gæstnavn' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Begivenhedsbeskrivelse' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Start' );
jr_define ('_JOMRES_ICAL_RESULT_HEADER_END', 'End');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Resultat' );
jr_define ('_JOMRES_ICAL_WITHHELD', 'tilbageholdt');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Din/dine iCal-feeds kan vise kommende reservationer i en fjernkalender inklusive din mobilenhed, Google Kalender, Apple Kalender, Thunderbird, Outlook og mere.' );
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Denne funktion giver dig mulighed for at synkronisere bookinger fra websteder som Airbnb, Homeway og andre til Jomres. Du skal indtaste din ejendoms iCal feed -url for hvert websted, du vil synkronisere med. Hvis nogen vil book din bolig på Airbnb for eksempel, vil disse datoer også blive vist som blokerede (sorte bookinger) på denne Jomres-side, så ingen kan også booke disse datoer her. Dette vil ikke synkronisere reservationsdetaljer mellem websteder (såsom gæsteoplysninger, priser, fakturaer osv.), men det er en god og nem måde at undgå dobbeltbookinger ved kun at synkronisere tilgængeligheden.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'iCal Sync-indstillinger' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'iCal-feedindstillinger' );
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'Ekstern iCal URL');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQURIES', 'Inkluderer også reservationsforespørgsler?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQURIES_DESC', 'Hvis den er aktiveret, vil den også inkludere reservationer, der ikke er godkendt endnu (hvis reservationsgodkendelsesfunktionen er aktiveret). At holde denne mulighed deaktiveret er en fantastisk måde at skjule reservationer fra kalenderen, som måske afventer bekræftelse i en ikke-godkendt/forespørgselsstatus. Hvis reservationer ikke kræver godkendelse (reservationsgodkendelsesfunktionen er deaktiveret), vil alle reservationer blive eksporteret.' );

jr_define ('_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Fjern URL' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'Rums-UID' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Rumsnavn/nummer' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Vælg det lokale, som dette feed vil påvirke, og det eksterne websteds url. Når du importerer en iCal-fil, skal begivenhedens slutdato være gæstens afrejsedato. Resuméet skal være gæstens navn. Begivenhed beskrivelse kan indeholde alle andre detaljer." );

jr_define ('_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical remote feed created');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical fjernfeed slettet' );