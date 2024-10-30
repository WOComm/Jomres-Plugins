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
jr_define ('_JOMRES_ICAL_EVENT', 'iCal esemény');
jr_define( '_JOMRES_ICAL_FEED', 'iCal feed' );
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCal feed URL' );
jr_define ('_JOMRES_ICAL_FEEDS', 'iCal Feed/s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Az iCal hírcsatornája megjelenítheti a közelgő foglalásokat egy távoli naptárban, beleértve a mobileszközt, a Google Naptárat, az Apple Calendart, a Thunderbirdot, az Outlookot és egyebeket. A következő URL-címekkel iratkozhat fel hírcsatornákra a naptár szoftvere.' );
jr_define( '_JOMRES_ICAL_ANON', 'Anonimizált iCal feed URL' );
jr_define ('_JOMRES_ICAL_ALLOW_ANON', 'Engedélyezi a névtelen hozzáférést az iCal feedhez/fájlokhoz?');
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Ha ez az opció be van kapcsolva, az iCal eseménytáblázata mindenki számára elérhető lesz, de foglalás vagy vendégadatok nélkül.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal import' );
jr_define( '_JOMRES_ICAL_SELECT', 'Importálandó fájl kiválasztása' );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Hiba, nincs fájl feltöltve.' );
jr_define ('_JOMRES_ICAL_IMPORT_INFO', "iCal fájl importálásakor az esemény befejező dátumának a vendég indulási dátumának kell lennie. Az összefoglaló legyen a vendég neve. Az eseményleírás minden egyéb részletet tartalmazhat.");

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Ez a foglalási szám már létezik a rendszerben.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Nincs szabad szoba a kiválasztott dátumokon.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'Nem találhatók események az ics fájlban.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Az esemény sikeresen importálva' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Az eseményt nem sikerült importálni' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Vendég neve' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Esemény leírása' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Kezdés' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'Vége' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Eredmény' );
jr_define ('_JOMRES_ICAL_WITHHELD', 'Visszatartva');
jr_define ('_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Az iCal feedjei megjeleníthetik a közelgő foglalásokat egy távoli naptárban, beleértve a mobileszközt, a Google Naptárat, az Apple Naptárat, a Thunderbirdet, az Outlookot és még sok mást.');
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Ez a funkció lehetővé teszi, hogy szinkronizálja a foglalásokat az olyan webhelyekről, mint az Airbnb, a Homeway és mások a Jomres -hez. Meg kell adnia a tulajdon iCal feed -URL -jét minden olyan webhelyhez, amelyet szinkronizálni szeretne. Ha valaki foglalja le ingatlanát például az Airbnb-n, ezek a dátumok letiltottként (fekete foglalások) jelennek meg ezen a Jomres webhelyen is, így senki sem tudja itt lefoglalni ezeket a dátumokat. Ez nem szinkronizálja a foglalási adatokat a webhelyek között (például a vendégek adatai, árak, számlák stb.), de ez egy szép és egyszerű módja annak, hogy elkerülje a dupla foglalásokat a rendelkezésre állás szinkronizálásával.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'iCal szinkronizálási beállítások' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'iCal feed beállításai' );
jr_define ('_JOMRES_ICAL_SYNC_URL1', 'Külső iCal URL');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Tartalmazzák a foglalási kérdéseket is?' );
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Ha engedélyezve van, akkor még nem jóváhagyott foglalásokat is tartalmaz (ha a foglalás -jóváhagyási funkció engedélyezve van). Ennek az opciónak a letiltása nagyszerű módja annak, hogy elrejtse azokat a foglalásokat a naptárból, amelyek esetleg megerősítésre várnak nem jóváhagyott/lekérdezés állapot. Ha a foglalásokhoz nincs szükség jóváhagyásra (a foglalás-jóváhagyási funkció le van tiltva), akkor az összes foglalás exportálásra kerül.' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal távoli hírcsatornák' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Távoli URL' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'Szoba UID' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Szoba neve/száma' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Válassza ki a szobát, amelyet ez a hírcsatorna érinteni fog, és a távoli webhely URL-jét. iCal fájl importálásakor az Esemény befejezési dátumának a vendég távozásának dátumának kell lennie. Az Összegzésnek a vendég nevének kell lennie. Esemény a leírás minden egyéb részletet tartalmazhat." );

jr_define ('_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical távoli hírcsatorna létrehozva');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical távoli hírfolyam törölve' );