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
jr_define( '_JOMRES_ICAL_EVENT', 'Událost iCal');
jr_define ('_JOMRES_ICAL_FEED', 'iCal Feed');
jr_define ('_JOMRES_ICAL_FEED_LINK', 'iCal Feed URL');
jr_define ('_JOMRES_ICAL_FEEDS', 'iCal Feed/s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Vaše zdroje iCal mohou zobrazovat nadcházející rezervace ve vzdáleném kalendáři, včetně vašeho mobilního zařízení, Kalendáře Google, Kalendáře Apple, Thunderbirdu, Outlooku a dalších. Pomocí následujících adres URL se můžete přihlásit k odběru zdrojů v váš kalendářový software.' );
jr_define( '_JOMRES_ICAL_ANON', 'Anonymizovaná adresa URL zdroje iCal' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Povolit anonymní přístup ke zdrojům iCal?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Pokud je tato možnost povolena, váš kanál událostí iCal bude dostupný všem, ale bez podrobností o rezervaci nebo hostech.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'Import iCal');
jr_define( '_JOMRES_ICAL_SELECT', 'Vyberte soubor k importu' );
jr_define ('_JOMRES_ICAL_NO_FILE_UPLOADED', 'Chyba, nebyl nahrán žádný soubor.');
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Při importu souboru iCal by koncovým datem události mělo být datum odjezdu hosta. Souhrnem by mělo být jméno hosta. Popis události může obsahovat všechny ostatní podrobnosti." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Toto číslo rezervace již v systému existuje.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Ve zvoleném termínu nejsou k dispozici žádné pokoje.' );
jr_define ('_JOMRES_ICAL_ERROR_NO_EVENTS', 'V souboru ics nebyly nalezeny žádné události.');
jr_define( '_JOMRES_ICAL_SUCCESS', 'Událost úspěšně importována' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Událost nelze importovat' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Jméno hosta');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Popis události' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Start');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'Konec');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Výsledek');
jr_define( '_JOMRES_ICAL_WITHHELD', 'Zadrženo');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Vaše kanály iCal mohou zobrazovat nadcházející rezervace ve vzdáleném kalendáři včetně vašeho mobilního zařízení, Kalendáře Google, Kalendáře Apple, Thunderbirdu, Outlooku a dalších.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Tato funkce vám umožňuje synchronizovat rezervace ze stránek jako Airbnb, Homeway a dalších do Jomres. Pro každou stránku, se kterou chcete synchronizovat, budete muset zadat adresu URL vašeho zařízení iCal. rezervujte si nemovitost například na Airbnb, tato data se budou zobrazovat jako blokovaná (černé rezervace) i na tomto webu Jomres, takže zde nikdo také nemůže rezervovat tato data. Tím se nesynchronizují podrobnosti rezervace mezi weby (jako jsou podrobnosti o hostu, ceny, faktury atd.), ale je to pěkný a snadný způsob, jak se vyhnout dvojitým rezervacím synchronizací pouze dostupnosti.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'Nastavení synchronizace iCal' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'Nastavení iCal Feed' );
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'Externí iCal URL' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQURIES', 'Zahrnout také dotazy na rezervace?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Pokud je povoleno, bude zahrnovat i rezervace, které ještě nejsou schváleny (pokud je povolena funkce schvalování rezervací). Ponechat tuto možnost deaktivovanou je skvělý způsob, jak skrýt rezervace z kalendáře, které možná čekají na potvrzení v stav neschváleno/dotaz. Pokud rezervace nevyžadují schválení (funkce schvalování rezervací je vypnutá), budou exportovány všechny rezervace.' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Vzdálená URL' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'UID místnosti');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Room name/number');
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Vyberte místnost, kterou tento zdroj ovlivní, a adresu URL vzdáleného webu. Při importu souboru iCal by koncovým datem události mělo být datum odjezdu hosta. Souhrn by měl být jméno hosta. Událost popis může obsahovat všechny další podrobnosti." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical vzdálený zdroj vytvořen' );
jr_define ('_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical remote feed deleted');