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


jr_define( '_JOMRES_ICAL_EVENT', 'Eveniment iCal' );
jr_define( '_JOMRES_ICAL_FEED', 'iCal Feed');
jr_define( '_JOMRES_ICAL_FEED_LINK', 'Adresa URL a fluxului iCal');
jr_define ('_JOMRES_ICAL_FEEDS', 'iCal Feed / s');
jr_define ("_JOMRES_ICAL_FEEDS_DESC", "Feed-urile dvs. iCal pot afișa rezervările viitoare într-un calendar la distanță, inclusiv dispozitivul dvs. mobil, Google Calendar, Apple Calendar, Thunderbird, Outlook și multe altele. Utilizați următoarele URL-uri pentru a vă abona la feed-uri în software-ul dvs. de calendar.");
jr_define ('_JOMRES_ICAL_ANON', 'URL anonimizat pentru iCal Feed');
jr_define ('_JOMRES_ICAL_ALLOW_ANON', 'Permiteți acces anonim la feed-uri iCal?');
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Dacă această opțiune este activată, fluxul de evenimente iCal va fi disponibil pentru toată lumea, dar fără detalii despre rezervare sau oaspeți.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal Import' );
jr_define( '_JOMRES_ICAL_SELECT', 'Selectează fişierul de importat');
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Eroare, nu a fost încărcat niciun fișier.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "La importarea unui fișier iCal, data de încheiere a evenimentului ar trebui să fie data de plecare a oaspetelui. Rezumatul ar trebui să fie numele invitatului. Descrierea evenimentului poate conține toate celelalte detalii." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Acest număr de rezervare există deja în sistem.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Nu sunt camere disponibile la datele selectate.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'Nu au fost găsite evenimente în fișierul ICS.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Eveniment importat cu succes' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Evenimentul nu a putut fi importat' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Nume oaspete');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Descrierea evenimentului');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Start' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'End');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Rezultat');
jr_define( '_JOMRES_ICAL_WITHHELD', 'Retins' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Feedurile dvs. iCal pot afișa rezervările viitoare într-un calendar de la distanță, inclusiv dispozitivul dvs. mobil, Google Calendar, Apple Calendar, Thunderbird, Outlook și multe altele.');
jr_define ("_JOMRES_ICAL_SYNC_SETTINGS_DESC", "Această caracteristică vă permite să sincronizați rezervările de la site-uri precum Airbnb, Homeway și altele la Jomres. Va trebui să introduceți adresa URL de alimentare iCal a proprietății dvs. pentru fiecare site cu care doriți să sincronizați. Dacă cineva o va face Rezervați-vă proprietatea pe Airbnb, de exemplu, acele date vor fi afișate ca blocate (rezervări negre) și pe acest site Jomres, așa că nimeni nu poate rezerva acele date aici. Acest lucru nu va sincroniza detaliile rezervării între site-uri (cum ar fi detaliile oaspeților, prețurile, facturi, etc) dar este o modalitate plăcută și ușoară de a evita rezervările duble prin sincronizarea doar a disponibilității." );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'Setări de sincronizare iCal' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'Setări iCal Feed' );
jr_define ('_JOMRES_ICAL_SYNC_URL1', 'URL iCal extern');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Include și întrebări privind rezervarea?' );
jr_define ("_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC", "Dacă este activat, va include și rezervări care nu sunt încă aprobate (dacă funcția de aprobare a rezervărilor este activată). Menținerea acestei opțiuni dezactivată este o modalitate excelentă de a ascunde rezervările din calendar care probabil așteaptă confirmarea în o stare neaprobată / cerere. Dacă rezervările nu necesită aprobare (funcția de aprobare a rezervărilor este dezactivată), toate rezervările vor fi exportate. ");

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'URL de la distanță' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'Room UID' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Numele/numărul camerei' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Selectați camera pe care o va afecta acest feed și adresa URL a site-ului la distanță. Când importați un fișier iCal, data de încheiere a evenimentului ar trebui să fie data de plecare a oaspetelui. Rezumatul ar trebui să fie numele oaspetelui. Eveniment descrierea poate conține toate celelalte detalii." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Feed Ical la distanță creat');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Feed-ul de la distanță Ical a fost șters');