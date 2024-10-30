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

jr_define ('_JOMRES_ICAL_EVENT', 'iCal Event');
jr_define( '_JOMRES_ICAL_FEED', 'iCal Feed' );
jr_define( '_JOMRES_ICAL_FEED_LINK', 'Adresa URL informačného kanála iCal' );
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal feed/s' );
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Vaše informačné kanály iCal môžu zobrazovať nadchádzajúce rezervácie vo vzdialenom kalendári vrátane vášho mobilného zariadenia, Kalendára Google, Kalendára Apple, Thunderbirdu, Outlooku a ďalších. Pomocou nasledujúcej adresy URL sa môžete prihlásiť na odber kanálov v softvér vášho kalendára. ');
jr_define( '_JOMRES_ICAL_ANON', 'Anonymizovaná adresa URL informačného kanála iCal' );
jr_define ('_JOMRES_ICAL_ALLOW_ANON', 'Povoliť anonymný prístup ku kanálom/kanálom iCal?');
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Ak je táto možnosť povolená, váš kanál udalostí iCal bude dostupný pre všetkých, ale bez podrobností o rezervácii alebo hosťoch.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'Import iCal' );
jr_define( '_JOMRES_ICAL_SELECT', 'Vyberte súbor na import' );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Chyba, nebol nahraný žiadny súbor.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "Pri importe súboru iCal by dátum ukončenia udalosti mal byť dátumom odchodu hosťa. Zhrnutie by malo byť meno hosťa. Popis udalosti môže obsahovať všetky ostatné podrobnosti." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Toto číslo rezervácie už v systéme existuje.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Vo vybraných dátumoch nie sú k dispozícii žiadne izby.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'V súbore ics neboli nájdené žiadne udalosti.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Udalosť bola úspešne importovaná' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Udalosť sa nepodarilo importovať' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Meno hosťa' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Popis udalosti' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Štart');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'Koniec' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Výsledok' );
jr_define ('_JOMRES_ICAL_WITHHELD', 'zadržané');
jr_define ('_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Vaše kanály iCal môžu zobrazovať nadchádzajúce rezervácie vo vzdialenom kalendári vrátane vášho mobilného zariadenia, kalendára Google, kalendára Apple, Thunderbird, Outlooku a ďalších.');
jr_define ('_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Táto funkcia vám umožňuje synchronizovať rezervácie z webov ako Airbnb, Homeway a ďalších na Jomres. Pre každú stránku, s ktorou sa chcete synchronizovať, budete musieť zadať adresu URL kanála iCal svojho vlastníctva. Ak niekto bude rezervujte si svoje ubytovanie napríklad na Airbnb, tieto dátumy sa budú zobrazovať ako zablokované (čierne rezervácie) aj na tejto stránke Jomres, takže si tieto dátumy nemôže nikto zarezervovať ani tu. Nebude sa tým synchronizovať podrobnosti rezervácie medzi stránkami (ako sú podrobnosti o hosťoch, ceny, faktúry atď.), ale je to pekný a jednoduchý spôsob, ako sa vyhnúť dvojitým rezerváciám synchronizáciou iba dostupnosti.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'Nastavenia synchronizácie iCal' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'Nastavenia iCal Feed' );
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'Externá iCal URL' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQURIES', 'Zahrnúť aj požiadavky na rezervácie?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Ak je povolená, bude zahŕňať aj rezervácie, ktoré ešte nie sú schválené (ak je povolená funkcia schvaľovania rezervácií). Ponechanie tejto možnosti zakázanej je skvelý spôsob, ako skryť rezervácie z kalendára, ktoré možno čakajú na potvrdenie v stav neschválené/dopyt. Ak rezervácie nevyžadujú schválenie (funkcia schvaľovania rezervácií je vypnutá), všetky rezervácie budú exportované.' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds' );
jr_define ('_JOMRES_ICAL_REMOTE_FEED_URL', 'vzdialená URL');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'UID miestnosti');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Názov/číslo miestnosti' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Vyberte miestnosť, ktorú tento informačný kanál ovplyvní, a adresu URL vzdialenej lokality. Pri importe súboru iCal by dátum ukončenia udalosti mal byť dátumom odchodu hosťa. V zhrnutí by malo byť meno hosťa. Udalosť popis môže obsahovať všetky ostatné podrobnosti." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Vytvorený Ical vzdialený kanál' );
jr_define ('_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical remote feed deleted');