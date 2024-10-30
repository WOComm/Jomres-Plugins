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
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCal Feed URL link' );
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/ovi' );
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Vaši iCal feed/ovi mogu prikazati predstojeće rezervacije u udaljenom kalendaru, uključujući vaš mobilni uređaj, Google kalendar, Apple kalendar, Thunderbird, Outlook i još mnogo toga. Koristite sledeće linkovee da biste se pretplatili na feed/ove u softveru vašeg kalendara.' );
jr_define( '_JOMRES_ICAL_ANON', 'Anonimizirni iCal Feed URL' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Dozvoliti anonimni pristup iCal fidovima?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Ako je ova opcija omogućena, vaš fid iCal događaja biće dostupan svima, ali bez podataka o rezervaciji ili gostima.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal Uvoz' );
jr_define( '_JOMRES_ICAL_SELECT', 'Izaberi fajl za dodavanje' );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Greška, nijedna datoteka nije otpremljena.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Prilikom uvoza iCal datoteke, datum završetka događaja treba da bude datum odlaska gosta. Rezime treba da bude ime gosta. Opis događaja može sadržati sve ostale detalje." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Ovaj broj rezervacije već postoji u sistemu.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Nema slobodnih soba za izabrane datume.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'Nije pronađen nijedan događaj u ics datoteci.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Događaj je uspešno uvezen' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Nije moguće uvesti događaj' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Ime gosta' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Opis događaja' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Start' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'End' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Result' );
jr_define( '_JOMRES_ICAL_WITHHELD', 'Withheld' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Vaši iCal feedovi mogu prikazati predstojeće rezervacije u udaljenom kalendaru, uključujući vaš mobilni uređaj, Google kalendar, Apple kalendar, Thunderbird, Outlook i još mnogo toga.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'This feature allows you to sync bookings from sites like Airbnb, Homeway and others to Jomres. You`ll have to enter your property`s iCal feed url for each site you want to sync with. If somebody will book your property on Airbnb for example, those dates will be shown as blocked (black bookings) on this Jomres site too, so nobody can also book those dates here. This won`t sync booking details between sites (like guest details, prices, invoices, etc) but it`s a nice and easy way to avoid double bookings by syncing just the availability.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'iCal Sync Settings' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'iCal Feed Settings' );
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'External iCal URL' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Also include booking enquiries?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Ako je omogućeno, uključiće i rezervacije koje još uvek nisu odobrene (ako je omogućena funkcija odobravanja rezervacija). Ostavljanje ove opcije onemogućeno je odličan način da sakrijete rezervacije iz kalendara koje možda čekaju potvrdu u statusu neodobrenog/upita. Ako rezervacije ne zahtevaju odobrenje (funkcija odobravanja rezervacija je onemogućena), sve rezervacije će biti izvezene.' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal daljinski Feedovi' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Daljinski URL' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'ID Sobe' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Soba Ime/broj' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Izaberite sobu na koju će ovaj fid uticati i url udaljenog sajta. Prilikom uvoza iCal datoteke, datum završetka događaja treba da bude datum odlaska gosta. Rezime treba da bude ime gosta. Opis događaja može sadržati sve ostale detalje." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical daljinski feed kreiran' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical daljinski feed obrisan' );