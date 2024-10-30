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


jr_define( '_JOMRES_ICAL_EVENT', 'iCal Event' );
jr_define( '_JOMRES_ICAL_FEED', 'iCal Feed' );
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCal Feed URL' );
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s' );
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Dina iCal-flöden kan visa kommande bokningar i en fjärrkalender inklusive din mobila enhet, Google Kalender, Apple Kalender, Thunderbird, Outlook och mer. Använd följande URL/er för att prenumerera på flöden i din kalenderprogramvara.' );
jr_define( '_JOMRES_ICAL_ANON', 'Anonymiserad iCal-feed-URL' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Tillåt anonym åtkomst till iCal-flöden?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Om det här alternativet är aktiverat kommer ditt iCal-evenemangsflöde att vara tillgängligt för alla, men utan boknings- eller gästinformation.' );
jr_define ('_JOMRES_ICAL_IMPORT', 'iCal Import');
jr_define ('_JOMRES_ICAL_SELECT', 'Select file to import');
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Fel, ingen fil laddades upp.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "När man importerar en iCal-fil bör slutdatumet för händelsen vara gästens avresedatum. Sammanfattningen ska vara gästens namn. Eventbeskrivning kan innehålla alla andra detaljer." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Detta bokningsnummer finns redan i systemet.' );
jr_define ('_JOMRES_ICAL_ERROR_NO_ROOMS', 'Inga rum finns tillgängliga på de valda datumen.');
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'Inga händelser hittades i ics-filen.' );
jr_define ('_JOMRES_ICAL_SUCCESS', 'Händelse importerad framgångsrikt');
jr_define( '_JOMRES_ICAL_FAILURE', 'Händelse kunde inte importeras' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Gästnamn' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Händelsebeskrivning' );
jr_define ('_JOMRES_ICAL_RESULT_HEADER_START', 'Start');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'Slut' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Resultat' );
jr_define( '_JOMRES_ICAL_WITHHELD', 'Intehållen' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Dina iCal-flöden kan visa kommande bokningar i en fjärrkalender inklusive din mobila enhet, Google Kalender, Apple Kalender, Thunderbird, Outlook och mer.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Den här funktionen låter dig synkronisera bokningar från sajter som Airbnb, Homeway och andra till Jomres. Du måste ange din fastighets iCal-flödes-url för varje sida du vill synkronisera med. Om någon vill boka din egendom på Airbnb till exempel, dessa datum kommer att visas som blockerade (svarta bokningar) på denna Jomres -webbplats också, så ingen kan också boka dessa datum här. Detta synkroniserar inte bokningsinformation mellan webbplatser (som gästinformation, priser, fakturor, etc) men det är ett trevligt och enkelt sätt att undvika dubbelbokningar genom att bara synkronisera tillgängligheten.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'iCal Sync-inställningar' );
jr_define ('_JOMRES_ICAL_FEED_SETTINGS', 'iCal Feed Settings');
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'Extern iCal URL' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQURIES', 'Inkludera även bokningsförfrågningar?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQURIES_DESC', 'Om den är aktiverad kommer den även att inkludera bokningar som inte är godkända ännu (om funktionen för bokningsgodkännande är aktiverad). Att hålla det här alternativet inaktiverat är ett bra sätt att dölja bokningar från kalendern som kanske väntar på bekräftelse i en status som inte är godkänd/förfrågan. Om bokningar inte kräver godkännande (funktionen för godkännande av bokningar är inaktiverad), kommer alla bokningar att exporteras.' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Fjärr-URL' );
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'Room UID');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Rumsnamn/nummer' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Välj rummet som detta flöde kommer att påverka, och fjärrplatsens url. När du importerar en iCal-fil ska slutdatumet för händelsen vara gästens avresedatum. Sammanfattningen ska vara gästens namn. Händelse beskrivning kan innehålla alla andra detaljer." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical fjärrflöde skapat' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical fjärrflöde borttaget' );