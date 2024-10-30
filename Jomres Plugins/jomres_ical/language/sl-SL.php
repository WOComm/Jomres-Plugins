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



jr_define( '_JOMRES_ICAL_EVENT', 'iCal dogodek');
jr_define ('_JOMRES_ICAL_FEED', 'iCal Feed');
jr_define( '_JOMRES_ICAL_FEED_LINK', 'URL vira iCal');
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Vaš vir iCal lahko prikaže prihajajoče rezervacije v oddaljenem koledarju, vključno z vašo mobilno napravo, Google Calendar, Apple Calendar, Thunderbird, Outlook in več. Uporabite naslednje URL-je, da se naročite na vire v programska oprema za koledar.');
jr_define( '_JOMRES_ICAL_ANON', 'Anonimiziran URL vira iCal');
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Dovoliti anonimni dostop do vira/-ov iCal?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Če je ta možnost omogočena, bo vaš vir dogodkov iCal na voljo vsem, vendar brez podrobnosti o rezervaciji ali gostu.' );
jr_define ('_JOMRES_ICAL_IMPORT', 'iCal uvoz');
jr_define( '_JOMRES_ICAL_SELECT', 'Izberi datoteko za uvoz');
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Napaka, nobena datoteka ni bila naložena.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Pri uvozu datoteke iCal mora biti končni datum dogodka datum odhoda gosta. Povzetek mora biti ime gosta. Opis dogodka lahko vsebuje vse druge podrobnosti." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Ta številka rezervacije že obstaja v sistemu.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Na izbrane datume ni na voljo nobena soba.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'V datoteki ics ni bilo najdenih dogodkov.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Dogodek je bil uspešno uvožen');
jr_define( '_JOMRES_ICAL_FAILURE', 'Dogodka ni bilo mogoče uvoziti');

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Ime gosta');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Opis dogodka');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Začetek');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'Konec');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Rezultat');
jr_define( '_JOMRES_ICAL_WITHHELD', 'Zadržano');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Vaš vir iCal lahko prikaže prihajajoče rezervacije v oddaljenem koledarju, vključno z vašo mobilno napravo, Google Calendar, Apple Calendar, Thunderbird, Outlook in več.');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Ta funkcija vam omogoča sinhronizacijo rezervacij s spletnih mest, kot so Airbnb, Homeway in drugih, z Jomresom. Za vsako spletno mesto, s katerim želite sinhronizirati, boste morali vnesti iCal naslov svoje nepremičnine. Če bo kdo če na primer rezervirate svojo lastnino na Airbnbu, bodo ti datumi prikazani kot blokirani (črne rezervacije) tudi na tem spletnem mestu Jomres, zato teh datumov nihče ne more rezervirati tudi tukaj. To ne bo sinhroniziralo podrobnosti rezervacije med spletnimi mesti (kot so podatki o gostu, cene, računi itd.), vendar je to lep in enostaven način, da se izognete dvojnim rezervacijam s sinhronizacijo samo razpoložljivosti.');
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS', 'Nastavitve sinhronizacije iCal');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'Nastavitve vira iCal');
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'Zunanji iCal URL');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Vključiti tudi poizvedbe o rezervaciji?' );
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Če je omogočeno, bo vključevalo tudi rezervacije, ki še niso odobrene (če je omogočena funkcija odobritve rezervacij). Če je ta možnost onemogočena, je odličen način, da skrijete rezervacije iz koledarja, ki morda čakajo na potrditev v status neodobren/poizvedba. Če za rezervacije ni potrebna odobritev (funkcija odobritve rezervacij je onemogočena), bodo vse rezervacije izvožene. ');

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal oddaljeni viri');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_URL', 'Oddaljeni URL');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'UID sobe');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Ime/številka sobe');
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Izberite sobo, na katero bo ta vir vplival, in url oddaljenega mesta. Pri uvozu datoteke iCal mora biti končni datum dogodka datum odhoda gosta. Povzetek mora biti ime gosta. Dogodek opis lahko vsebuje vse druge podrobnosti. ");

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical oddaljeni vir ustvarjen' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical oddaljeni vir izbrisan');