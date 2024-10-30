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

jr_define( '_JOMRES_ICAL_EVENT', 'iCal događaj');
jr_define( '_JOMRES_ICAL_FEED', 'iCal Feed' );
jr_define( '_JOMRES_ICAL_FEED_LINK', 'URL feeda iCal');
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Vaš iCal feed/s može prikazati nadolazeće rezervacije u udaljenom kalendaru uključujući vaš mobilni uređaj, Google kalendar, Apple kalendar, Thunderbird, Outlook i više. Koristite sljedeće URL-ove da se pretplatite na feed/ove u vaš softver za kalendar. ');
jr_define( '_JOMRES_ICAL_ANON', 'Anonimizirani URL feeda iCal' );
jr_define ('_JOMRES_ICAL_ALLOW_ANON', 'Dopusti anonimni pristup iCal feedovima/s?');
jr_define ('_JOMRES_ICAL_ALLOW_ANON_DESC', 'Ako je ova opcija omogućena, vaš feed događaja iCal bit će dostupan svima, ali bez rezervacije ili podataka o gostima.');
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal Import' );
jr_define( '_JOMRES_ICAL_SELECT', 'Odaberi datoteku za uvoz');
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Pogreška, nije prenesena nijedna datoteka.' );
jr_define ('_JOMRES_ICAL_IMPORT_INFO', "Prilikom uvoza iCal datoteke datum završetka događaja trebao bi biti datum odlaska gosta. Sažetak bi trebao biti ime gosta. Opis događaja može sadržavati sve ostale detalje.");

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Ovaj broj rezervacije već postoji u sustavu.' );
jr_define ('_JOMRES_ICAL_ERROR_NO_ROOMS', 'Nema slobodnih soba na odabrane datume.');
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'Nije pronađen nijedan događaj u ics datoteci.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Događaj je uspješno uvezen' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Događaj se nije mogao uvesti');

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Ime gosta');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Opis događaja' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Početak');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_END', 'Kraj');
jr_define ('_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Rezultat');
jr_define( '_JOMRES_ICAL_WITHHELD', 'Zadržano');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Vaš iCal feed/ovi mogu prikazati nadolazeće rezervacije u udaljenom kalendaru uključujući vaš mobilni uređaj, Google kalendar, Apple kalendar, Thunderbird, Outlook i više.' );
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Ova vam značajka omogućuje sinkronizaciju rezervacija sa web mjesta poput Airbnb -a, Homewaya i drugih s Jomresom. Morat ćete unijeti iCal feed URL -a svoje nekretnine za svako web mjesto s kojim želite sinkronizirati. Ako netko želi rezervirajte svoj smještaj na Airbnb-u, na primjer, ti datumi će biti prikazani kao blokirani (crne rezervacije) i na ovoj Jomres stranici, tako da nitko ne može rezervirati te datume ovdje. Ovo neće sinkronizirati pojedinosti o rezervaciji između web-lokacija (poput pojedinosti o gostima, cijene, fakture, itd.), ali to je lijep i jednostavan način da izbjegnete dvostruke rezervacije sinkroniziranjem samo dostupnosti.' );
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS', 'iCal Sync Settings');
jr_define ('_JOMRES_ICAL_FEED_SETTINGS', 'iCal Feed Settings');
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'Vanjski iCal URL');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Uključiti i upite o rezervaciji?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Ako je omogućeno, uključivat će i rezervacije koje još nisu odobrene (ako je omogućena značajka odobravanja rezervacija). Održavanje ove opcije onemogućene odličan je način da sakrijete rezervacije iz kalendara koje možda čekaju potvrdu status neodobrenog/upita. Ako rezervacije ne zahtijevaju odobrenje (značajka odobrenja rezervacija je onemogućena), sve će rezervacije biti izvezene.' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal udaljeni izvori');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Udaljeni URL');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'UID sobe' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Naziv/broj sobe' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Odaberite sobu na koju će ovaj feed utjecati, i url udaljene stranice. Prilikom uvoza iCal datoteke, datum završetka događaja trebao bi biti datum odlaska gosta. Sažetak bi trebao biti ime gosta. Događaj opis može sadržavati sve ostale pojedinosti." );

jr_define ('_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical daljinski feed stvoren');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical daljinski feed izbrisan' );