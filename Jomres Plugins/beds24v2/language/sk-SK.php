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
jr_define ('BEDS24V2_CHANNEL_MANAGEMENT', 'Správa kanálov (Beds24)');

jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24');
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Ak máte účet Beds24 a chcete aktualizovať Beds24, keď máte rezerváciu, vyberte túto možnosť. Nastavte adresu URL na https://www.beds24.com/api/json/');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'Tento používateľ nemá nastavené žiadne kľúče API, takže nemôže pokračovať. Navštívte ich stránku na stránke Správa používateľov> Správcovia vlastností a vytvorte im nový kľúč API pomocou odkazu uvedeného na tejto stránke.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Tento užívateľ nemá žiadne vlastnosti Jomres, ktoré by mohol priradiť k vlastnostiam Beds24, alebo naopak');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "Zdá sa, že manažér, do ktorého ste prihlásení, nemá účet v Beds24, takže sa budete musieť najskôr zaregistrovať pre ich službu a potom uložiť tento kľúč API na <a href = 'https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> webová stránka Beds24 tu. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "Skopírujte a prilepte tento kľúč API do poľa LINK vo svojom účte Beds24, aby ste mohli pokračovať.");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Keď to urobíte, pokračujte kliknutím na tlačidlo nižšie.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "prepojenie vlastníctva s Beds24");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', "Táto stránka vám umožňuje zobraziť vlastnosti, ku ktorým máte v tomto systéme prístup, plus vlastnosti, ktoré existujú v Správcovi kanálov. Tiež vám umožňuje importovať vlastnosti zo Správcu kanálov do tohto systému alebo exportovať existujúce vlastnosti do Správcu kanálov. <br/> Ak máte vlastnosti tak v tomto systéme, ako aj v Beds24, a chcete ich navzájom prepojiť, môžete na to použiť podobné vlastníctvo. Navštívte Beds24> Nastavenia> Vlastnosti (uistite sa, že vlastnosť vybraná v rozbaľovacom zozname je rovnaká ako tá, ktorú chcete prepojiť), potom v podponuke Link uložte položku \"Property apikey\" do poľa \"propKey\" v Beds24. Keď to urobíte, znova načítajte stránku. Tento systém bude skontrolujte, či sú tieto dve vlastnosti priradené k rovnakému kľúču, a vytvorte potrebné asociácie. Keď budú tieto dve vlastnosti prepojené, navštívte stránku Zobraziť vlastníctvo, vyhľadajte webovú adresu oznámenia a prilepte ju do poľa Odkaz na stránku \"Oznámiť adresu URL\". To bude uistite sa, že Beds24 používa správny odkaz na synchronizáciu rezervácií s týmto vlastníctvom, keď prijíma rezervácie. ");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Chyba: V Beds24 nie sú žiadne vlastnosti, s ktorými by ste sa mohli prepojiť. Dôvodom môže byť to, že všetky vlastnosti, na ktoré máte práva, už boli prepojené s iným účtom v tomto systéme.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Property uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "názov vlastníctva");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "názov majetku Beds24");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Property apikey");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "Import");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Konfigurovať typy miestností");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Tu musíte prepojiť typy miestností vo svojom účte Beds24 s tými, ktoré sú uložené v tomto systéme.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "typ izby Beds24");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Toto vlastníctvo sa zatiaľ nedá importovať, pretože ste na stránke Odkaz na vlastníctvo nenastavili kľúč vlastníctva.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Toto zariadenie nemožno importovať, pretože nemá žiadne miestnosti. Vytvorte jednu alebo viac izieb (izby v Beds24 sú rovnaké ako typy izieb v Jomres) a nezabudnite nastaviť minimálnu cenu. . Potom, čo to urobíte, môžete importovať typ miestnosti do Jomres a priradiť ho k aktuálnym typom miestností Jomres. Potom budete môcť upraviť tarify, ale bude potrebné nastaviť minimálnu cenu. ");
jr_define ('_BEDS24_SUGGESTED_KEY', "Odporúčame použiť tento kľúč API. Keď to urobíte, znova načítajte túto stránku.");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "Export");
jr_define ('BEDS24V2_REST_API_INTRO', "Tu môžete vidieť svoj pár kľúčov REST API a cestu k API. Ak tieto podrobnosti uložíte do svojho účtu na Beds24, Beds24 24 bude môcť kontaktovať túto stránku prostredníctvom rozhrania API.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "ID klienta");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "Client Secret");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (koncový bod)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "Zobraziť nehnuteľnosť");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "Asociácie typu miestnosti");
    
    jr_define ('BEDS24_ROOM_TYPES_INFO', "Táto stránka vám umožňuje priradiť typy vašich miestností k tým, ktoré sú uložené na serveroch Beds24.");
jr_define ('BEDS24_ROOM_TYPES_INFO2', "Kým nebudú prepojené typy izieb, nemôžete prijímať informácie o rezervácii odoslané spoločnosťou Beds24. Ak bol váš majetok importovaný/exportovaný do alebo z Beds24, automaticky sme pre vás vytvorili odkazy, ak však pridáte nový typ miestnosti alebo jeden odstráňte, potom je možné pomocou tejto stránky zaistiť správne priradenie typu miestnosti. ");
jr_define ('BEDS24_ROOM_TYPES_INFO3', "Vyberte typy izieb Beds24, ktoré chcete priradiť k typom miestností v tomto systéme, a po dokončení aktualizujte zmeny na Beds24 kliknutím na tlačidlo Uložiť.");
jr_define ('BEDS24_ROOM_TYPES_YOURS', "Vaše typy izieb");
jr_define ('BEDS24_ROOM_TYPES_BEDS24', "typy izieb Beds24");
jr_define ('BEDS24_ROOM_TYPES_NONE', "Táto nehnuteľnosť nemá žiadne typy izieb, preto ju nemožno prepojiť so žiadnymi typmi izieb Beds24. Chcete importovať typy izieb z Beds24?");
jr_define ('BEDS24_IMPORT_ROOMS', "Importovať miestnosti");
jr_define ('BEDS24_EXPORT_BOOKINGS', "Export rezervácií");
jr_define ('BEDS24_IMPORT_BOOKINGS', "Import rezervácií");
jr_define ('BEDS24_IMPORT_EXPORT', "Existujúce rezervácie môžete importovať a exportovať z a do Beds24 kliknutím na tlačidlo. Rezervácie importované z Beds24 sa importujú zo včera a budú zahŕňať všetky rezervácie na budúci rok. Tieto tlačidlá by ste mali používať iba po prvý import alebo export majetku do systému. Po nastavení sa import a/alebo export vykoná automaticky. ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Aktualizovať ceny na Beds24?");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Môžete sa rozhodnúť aktualizovať Beds24 iba s dostupnosťou alebo s dostupnosťou aj cenami. Ak používate špecifické situácie, kedy chcete použiť ovládací panel Beds24 na stanovenie konkrétnych cien pre konkrétne kanály, nechajte túto súpravu na Č. ");
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT', "Priamy odkaz");
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS', "Ak ste importovali toto vlastníctvo do Jomres, budete musieť manuálne zmeniť adresu URL oznámenia vo vašom Beds24 -> Vlastníctve -> Nastavenia odkazu na nasledujúce:");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "V súčasnosti nemáte k vlastnostiam Beds24 priradené žiadne vlastnosti. Predtým, ako umožníte svojim manažérom pokúsiť sa spojiť s Beds24, musíte resetovať kľúče API svojho manažéra. Tým sa zabezpečí, že budú mať všetky jedinečné kľúče.");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "Teraz resetovať kľúče API správcu");
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "Ignorovať upozornenie");
jr_define ('BEDS24V2_ERROR_KEYS_DONE', "Klávesy API správcu boli resetované");

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "odkazy na majetok Beds24");
jr_define ('BEDS24_ASSIGN_MANAGER', "Beds24 Change Manager");
jr_define ('BEDS24_ASSIGN_MANAGER_DESC', "Keď si manažér zobrazí stránku Správa kanálov (Bed24) v klientskom rozhraní, všetky vlastnosti, ktoré zdieľajú kľúč API v serveroch Jomres aj Beds24, sa v rámci Jomres automaticky prepoja. Podobne všetky vlastnosti importované alebo exportované správcom sú prepojení. Správcu, s ktorým je prepojené vlastníctvo, môžete zmeniť tak, že zmeníte rozbaľovaciu ponuku správcu na tejto stránke a potom kliknete na položku Uložiť. ");
jr_define ('BEDS24V2_TARIFFS_TITLE', "Tarifný export");
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC', "Tarify, ktoré ste vytvorili, môžete exportovať do Beds24 na konkrétnu dennú sadzbu. Ak sa chystáte používať túto funkciu, v konfigurácii nehnuteľnosti nastavte možnosť Aktualizovať ceny na Beds24? môže byť tiež potrebné nakonfigurovať váš majetok na ovládacom paneli Beds24, aby ste mohli mať viacero denných sadzieb. Ak to chcete urobiť, prejdite do časti Nastavenia> Vlastnosti> Izby> Denné ceny a nakonfigurujte Počet denných cien na požadovaný počet cien. Keď to urobíte, budete môcť kliknutím na jedno z tlačidiel P nastaviť dennú sadzbu. ");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "názov tarify");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Typ miestnosti");
jr_define ('BEDS24V2_BOOKING_RESEND', "Znova odoslať upozornenie");
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24', "Toto sú informácie o rezervácii uložené na Beds24. Pokiaľ si nie ste istí, že sú údaje nesprávne, rezerváciu by ste nemali odosielať znova na Beds24.");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24', "Zdá sa, že táto rezervácia nie je spojená s rezerváciou na Beds24. Na odoslanie tejto rezervácie na postele24 môžete použiť tlačidlo Znova odoslať.");
    
    jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonymizovať hostí?");
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Keď sa rezervácie odosielajú správcovi kanálov, odporúčame vám anonymizovať údaje o hosťovi. Ak nastavíte túto možnosť na áno, pri odosielaní informácií o rezervácii správcovi kanála sa neuvádza meno hosťa, e -mailová adresa. . OTA budú mať presný záznam o vašej dostupnosti bez toho, aby ste museli zdieľať viac informácií, ako je potrebné. To znamená, že ste v súlade s GDPR, pretože ak sa hosť neskôr rozhodne odstrániť svoje údaje v tomto systéme (nebudete upozornení, keď stane sa), ich údaje nezostanú iným správcom údajov, nad ktorými nemáte žiadnu kontrolu. V prípade potreby môžete stále porovnávať rezervácie v tomto systéme s tými, ktoré sú v správcovi kanálov, stránka s podrobnosťami rezervácie vám zobrazí číslo rezervácie pre táto rezervácia je uložená v správcovi kanálov. ");
jr_define ('BEDS24V2_MASTER_APIKEY', "EXPERIMENTAL FEATURE - Master Beds24 API key");
jr_define ('BEDS24V2_MASTER_APIKEY_DESC', "AK UŽ MÁTE INŠTALÁCIU JOMRES S VLASTNOSTAMI SPOJENÝMI S POSTELAMI 24, PREČÍTAJTE SI CELÝ POPIS TU. Štandardne je Jomres navrhnutý ako platforma pre import viacerých predajcov, ktorá môže mať vlastnú predajňu. vlastnosti do a z postele24 bezpečne. Toto nastavenie vám umožňuje prepísať túto funkciu tým, že budete mať jeden kľúč API pre všetky služby. To znamená, že na Beds24 potrebujete iba jeden účet, ale tiež to znamená, že všetky poplatky sa budú hromadiť z tohto jedného účtu. Každý správca s prístupom k vlastníctvu bude môcť odosielať aktualizácie do vlastníctva na serveroch bed24. Nechajte pole prázdne, ak chcete ignorovať toto nastavenie a prinútiť správcov vlastníctva používať vlastné účty Beds24. Kľúč API môže mať ľubovoľnú požadovanú formu, tak dlho pretože kľúč sa tu zhoduje s kľúčom v <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> <em> kľúči API 1 </em> </ a> pole. AK UŽ MÁTE INSTALÁCIU NA JOMRES S VLASTNOSTIAMI SPOJENÝMI S BEDS24: Na túto funkciu môžete prepnúť, vyžadovalo by to však najskôr skrátiť (vyprázdniť) tieto tabuľky, odstrániť existujúce vlastnosti, ktoré už sú v Jomres, a potom vlastnosti znova importovať od Beds24 do Jomres. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Pri nastavovaní kľúča API v sekcii <em> Kľúč API N </em> na stránke Prístup k účtu Beds24 je dôležité, aby ste pole <em> Prístup k kľúču API </em> nastavili na hodnotu Povoliť iba IP adresy na bielom zozname a nastavíte číslo IP na <strong> ".$this_servers_ip_number ." </strong> To platí rovnako pre konfiguráciu hlavného kľúča API tu, ako aj pre frontend, ak správca vlastností konfiguruje svoje vlastné individuálne API. kľúče. ");
jr_define ('BEDS24V2_WHITELIST_WARNING', "Ak sú vaše vlastníctva už prepojené s Beds24, upozorňujeme, že Beds24 nedávno zaviedla zásadu, podľa ktorej všetky servery pripájajúce sa k vášmu účtu museli byť uvedené na bielu listinu. Môžete to urobiť na stránke Prístup k účtu, kde váš prístupový kľúč bol zadaný. Vyberte rozbaľovaciu ponuku IP Whitelist a nastavte IP číslo na ");