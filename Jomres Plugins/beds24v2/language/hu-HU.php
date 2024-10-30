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
jr_define ('BEDS24V2_CHANNEL_MANAGEMENT', 'Csatornakezelés (Beds24)');

jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24');
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Ha rendelkezik Beds24 -fiókkal, és foglalásakor frissíteni szeretné a Beds24 -et, válassza ezt a lehetőséget. Állítsa be az URL -t a https://www.beds24.com/api/json/ címre');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'Ennek a felhasználónak nincs megadva API kulcsa, ezért nem folytathatja. Látogassa meg oldalát a Felhasználókezelés> Tulajdonkezelők oldalon, és hozzon létre egy új API -kulcsot nekik az oldalon található link segítségével.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Ez a felhasználó nem rendelkezik olyan Jomres-tulajdonságokkal, amelyeket hozzárendelhet a Beds24 ingatlanokhoz, vagy fordítva');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "Úgy tűnik, hogy a bejelentkezett kezelőnek nincs fiókja a Beds24 szolgáltatással, ezért először regisztrálnia kell a szolgáltatásukra, majd el kell mentenie ezt az API -kulcsot a <a href = 'https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> Beds24 webhelye itt. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "A folytatáshoz másolja és illessze be ezt az API -kulcsot a Beds24 -fiók LINK mezőjébe.");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Ha ezt megtette, a folytatáshoz kattintson az alábbi gombra.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24 property linking");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', 'Ez az oldal lehetővé teszi azoknak a tulajdonságoknak a megtekintését, amelyekhez hozzáfér a rendszerben, valamint a Csatornakezelőben létezőket. Ezenkívül lehetővé teszi a tulajdonságok importálását a Csatornakezelőből ebbe a rendszerbe, vagy exportálást a meglévő tulajdonságokat a Csatornakezelőhöz. <br/> Ha rendelkezik tulajdonságokkal mind a rendszerben, mind a Beds24 szolgáltatásban, és össze szeretné kapcsolni őket egymással, akkor ezt a Property apikey segítségével teheti meg. Látogassa meg a Beds24> Beállítások> Tulajdonságok lehetőséget (győződjön meg arról, hogy a legördülő menüben kiválasztott tulajdonság megegyezik a linkelni kívánt tulajdonsággal), majd a Link almenüben mentse el a "Property apikey" elemet a BedS24 "propKey" mezőjében. Ha ezt megtette, töltse be újra az oldalt. Ez a rendszer nézze meg, hogy a két tulajdonság ugyanahhoz a kulcshoz van -e társítva, és hozza létre a szükséges asszociációkat. A két tulajdonság összekapcsolása után ne felejtse el felkeresni a Tulajdon megtekintése oldalt, keresse meg az értesítési URL -t, és illessze be a Hivatkozás oldal "Értesítési URL" mezőjébe. Az fog győződjön meg arról, hogy a Beds24 a megfelelő hivatkozást használja a foglalások szinkronizálásához az adott tulajdonnal, amikor foglalásokat fogad. ');
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Hiba: Nincsenek olyan ingatlanok, amelyekhez linkelhet a Beds24 -ben. Ennek az lehet az oka, hogy minden tulajdon, amelyhez joga van, már össze volt kapcsolva egy másik fiókkal ezen a rendszeren.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Property uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Tulajdon neve");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24 Property name");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Property apikey");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "Import");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Szobatípusok konfigurálása");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Itt össze kell kapcsolnia a Beds24 fiókjában található szobatípusokat a rendszerben tárolottakkal.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Beds24 szobatípus");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Ezt a tulajdonságot még nem lehet importálni, mivel nem állította be a Tulajdonságkulcsot a Tulajdonság link oldalon.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Ezt az ingatlant még nem lehet importálni, mivel nincsenek szobái. Hozzon létre egy vagy több szobát (az Beds24 szobái megegyeznek a Jomres -i szobatípusokkal), és ne felejtse el beállítani a minimális árat. . Miután ezt megtette, importálhatja a szobatípust a Jomres -ba, és társíthatja azokat a jelenlegi Jomres -szobatípusokkal. Ezt követően módosíthatja a tarifákat, de meg kell határozni a minimális árat. ");
jr_define ('_BEDS24_SUGGESTED_KEY', "Javasoljuk, hogy használja ezt az API -kulcsot. Ha ezt megtette, töltse be újra ezt az oldalt.");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "Export");
jr_define ('BEDS24V2_REST_API_INTRO', "Itt láthatja a REST API kulcspárját és az API elérési útját. Ha ezeket a részleteket a Beds24 fiókjában tárolja, a Beds24 24 képes lesz kapcsolatba lépni ezzel a webhellyel az API -n keresztül.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "Ügyfél -azonosító");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "Ügyféltitok");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (végpont)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "Tulajdon megtekintése");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "Szobatípus -társítások");

jr_define ('BEDS24_ROOM_TYPES_INFO', "Ez az oldal lehetővé teszi, hogy társítsa szobatípusait a Beds24 szervereken tárolt szobákkal.");
jr_define ('BEDS24_ROOM_TYPES_INFO2', "Amíg a szobatípusok össze vannak kapcsolva, addig nem kaphatja meg a Beds24 által küldött foglalási információkat. Ha ingatlanát importálták/exportálták a Beds24 -be vagy onnan, akkor automatikusan létrehoztunk linkeket az Ön számára, azonban ha hozzáad egy új szobatípus, vagy töröljön egyet, akkor ez az oldal használható annak biztosítására, hogy a szobatípus helyesen legyen társítva. ");
jr_define ('BEDS24_ROOM_TYPES_INFO3', "Válassza ki azokat a Beds24 szobatípusokat, amelyeket hozzá szeretne rendelni a rendszer szobatípusaihoz ebben a rendszerben, és ha végzett, kattintson a Mentés gombra a Beds24 módosításainak frissítéséhez.");
jr_define ('BEDS24_ROOM_TYPES_YOURS', "A szobatípusok");
jr_define ('BEDS24_ROOM_TYPES_BEDS24', "Beds24 szobatípusok");
jr_define ('BEDS24_ROOM_TYPES_NONE', "Ez a tulajdonság nem rendelkezik szobatípusokkal, ezért nem kapcsolható össze Beds24 szobatípusokkal. Szeretne szobatípusokat importálni a Beds24 -ből?");
jr_define ('BEDS24_IMPORT_ROOMS', "Szobák importálása");
jr_define ('BEDS24_EXPORT_BOOKINGS', "Foglalások exportálása");
jr_define ('BEDS24_IMPORT_BOOKINGS', "Foglalások importálása");
jr_define ('BEDS24_IMPORT_EXPORT', "Egy gombnyomással importálhat és exportálhat meglévő foglalásokat az Beds24 -ből és onnan. A Beds24 -ből importált foglalások tegnaptól importálódnak, és tartalmazzák a következő év összes foglalását. Ezeket a gombokat csak azután használhatja először importálja vagy exportálja a tulajdont a rendszerbe. A beállítás, az importálás és/vagy az exportálás automatikusan megtörténik. ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Frissítse az árakat az Beds24 -re?");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Választhatja a Beds24 frissítését a rendelkezésre állás vagy az elérhetőség és az árak mellett. Ha speciális helyzeteket szeretne használni, amikor a Beds24 vezérlőpultot szeretné használni bizonyos csatornák árainak beállításához, hagyja ezt a beállítást Nem.");
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT', "Közvetlen link");
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS', "Ha ezt a tulajdont Jomres -ba importálta, akkor manuálisan kell módosítania az Értesítési URL -t a Beds24 -> Property -> Link beállításokon a következőkre:");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Jelenleg nincsenek olyan tulajdonságai, amelyek a Beds24 tulajdonaival vannak kapcsolatban. Vissza kell állítania a menedzser API -kulcsait, mielőtt engedélyezi a menedzsereknek a csatlakozást a Beds24 -hez. Ez biztosítja, hogy mindegyikük egyedi kulcsokkal rendelkezzen.");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "A kezelői API -kulcsok visszaállítása most");
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "Figyelmeztetés figyelmen kívül hagyása");
jr_define ('BEDS24V2_ERROR_KEYS_DONE', "A kezelő API kulcsait visszaállítottuk");

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Beds24 property links");
jr_define ('BEDS24_ASSIGN_MANAGER', "Beds24 Change Manager");
jr_define ('BEDS24_ASSIGN_MANAGER_DESC', "Amikor egy menedzser megnézi a Csatornakezelés (Bed24) oldalt a kezelőfelületen, a Jomres -ben és a Beds24 -ben egyaránt API -kulcsot használó tulajdonságok automatikusan összekapcsolódnak a Jomres -en belül. Hasonlóképpen, a kezelő által importált vagy exportált ingatlanok A tulajdonhoz kapcsolt kezelőt úgy módosíthatja, hogy megváltoztatja ezen az oldalon a kezelő legördülő menüjét, majd a Mentés gombra kattint. ");
jr_define ('BEDS24V2_TARIFFS_TITLE', "Vámexport");
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC', 'Az általad létrehozott tarifákat exportálhatod a Beds24 -be egy adott napi árfolyamra. Ha használni szeretnéd ezt a funkciót, akkor a Tulajdonság -konfiguráció \"Árak frissítése Beds24 -re\" opcióját állítsd Nem értékre. előfordulhat, hogy a Beds24 vezérlőpulton is be kell állítania a tulajdonát, hogy több napi díjat is megadhasson. Ehhez lépjen a Beállítások> Tulajdonságok> Szobák> Napi árak menübe, és állítsa be a "Napi árak számát" a kívánt árak számához. . Ha ezt megtette, akkor a P gomb egyikére kattintva beállíthatja ezt a napi árfolyamot. ');
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Tarifa neve");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Szoba típusa");
jr_define ('BEDS24V2_BOOKING_RESEND', "Értesítés újraküldése");
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24', "Ez a Beds24-en tárolt foglalási információ. Ha nem biztos abban, hogy az adatok helytelenek, akkor nem kell újra elküldenie a foglalást a Beds24-re.");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24', "Úgy tűnik, hogy ez a foglalás nem kapcsolódik a Beds24 -en történt foglaláshoz. Az Újraküldés gombbal exportálhatja ezt a foglalást az beds24 -be.");

jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS', "Vendégek névtelenítése?");
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Amikor a foglalásokat elküldi a csatornakezelőnek, azt javasoljuk, hogy tegye névtelenné a vendég adatait. Ha ezt az opciót igen értékre állítja, akkor a foglalási adatok elküldésekor a csatornakezelőnek a vendég neve, e -mail címe nem . Az OTA -k pontosan rögzítik az Ön elérhetőségét anélkül, hogy a szükségesnél több információt kellene megosztania. Ez azt jelenti, hogy megfelel a GDPR -nak, mert ha a vendég később úgy dönt, hogy törli adatait erről a rendszerről (erről nem kap értesítést előfordulhat), adataikat nem hagyják más adatkezelők, akik felett Ön nem rendelkezik. Szükség esetén továbbra is kereszthivatkozásokat foglalhat ebben a rendszerben a csatornakezelő foglalásaival, a Foglalás részletei oldalon megjelenik a foglalási szám ezt a foglalást a csatornakezelőben tárolja. ");
jr_define ('BEDS24V2_MASTER_APIKEY', "EXPERIMENTAL FEATURE - Master Beds24 API key");
jr_define ('BEDS24V2_MASTER_APIKEY_DESC', "HA TELEPÍTETTE A JOMRES TELEPÍTÉSEIT A BEDS24-HOZ TARTALMAZOTT TULAJDONSÁGOKKAL ITT OLVASSA EL A TELJES LEÍRÁST. A Jomres alapértelmezés szerint többszemélyi importáló, aki saját foglalási platformját importálja. biztonságosan. Ez a beállítás lehetővé teszi, hogy felülbírálja ezt a funkciót azáltal, hogy minden ingatlanhoz egyetlen API -kulcsot ad. Ez azt jelenti, hogy csak egy fiókra van szüksége a Beds24 -nél, de ez azt is jelenti, hogy minden díjat az adott fiók fog felhalmozni. Bármely menedzser, aki hozzáfér egy tulajdonhoz, képes lesz frissítéseket küldeni a tulajdonhoz a Bed24 szervereken. Hagyja üresen, ha figyelmen kívül hagyja ezt a beállítást, és kényszeríti a tulajdonkezelőket, hogy saját Beds24 -fiókjaikat használják. Az API -kulcs bármilyen formát ölthet. mivel a kulcs itt megegyezik a <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> <em> API 1 kulcs </em> </kulcsával a> mező.HA VAN MOST TELEPÍTÉSE A JOMRES-BŐL, BEDS24-hez kapcsolt tulajdonságokkal: Átválthat ennek a funkciónak a használatára, azonban ehhez először meg kell csonkolnia (üresen) ezeket a táblákat, törölnie kell a Jomres-ban már meglévő tulajdonságokat, majd újra kell importálnia a tulajdonságokat. a Beds24 -ből Jomres -be. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Amikor beállítja API -kulcsát a Beds24 fiókhozzáférési oldalának <em> API Key N </em> szakaszában, elengedhetetlen, hogy az <em> API Key Access </em> mezőt Csak az engedélyezett IP -cím engedélyezése, és az IP -számot <strong>".$this_servers_ip_number ."</strong> </strong> Ez ugyanúgy vonatkozik a fő API -kulcs konfigurációjára itt, és a kezelőfelületen, ha egy ingatlankezelő saját egyéni API -ját konfigurálja kulcsok." );
jr_define ('BEDS24V2_WHITELIST_WARNING', "Ha az ingatlanokat már összekapcsolták a Beds24 -el, akkor vegye figyelembe, hogy a Beds24 nemrégiben bevezetett egy házirendet, amely szerint a fiókjához csatlakozó összes szervert engedélyezőlistára kell helyezni. Ezt a Fiókhozzáférés oldalon teheti meg válassza ki az IP -címek legördülő listáját, és állítsa az IP -számot ");