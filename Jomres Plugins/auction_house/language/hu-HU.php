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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Aukciós ház");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Vásárlás");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Eladás");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Aukciók haza");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Tételek, amelyekre licitáltam");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Aukciók listája");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Tulajdon irányítópult");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Sorolja fel aukcióit");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Új aukció");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Aukció szerkesztése");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Az aukció visszavonása");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Az aukció mielőbbi befejezése");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Kérjük, válassza ki azt az ingatlant, amelyhez az aukciót társítani szeretné.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "A szobákat/az ingatlant is belefoglalja ebbe az aukcióba?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Kérjük, válassza ki azokat a szobákat, amelyeket fel szeretne venni az aukcióra. Először válassza ki a foglalás dátumát, majd válassza ki a szobákat.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Kérjük, válassza ki azokat a dátumokat, amikor le szeretné foglalni az ingatlant az aukció részeként.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Feltételek");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Feltételek");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Részletes feltételek");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Aukció címe");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Leírás");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Az aukció értéke");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Kérjük, adja meg az Ön által kínált csomag értékét. Nem jelenik meg a vásárlóknak.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Foglalás");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "A tartalék nem teljesült");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Vásárlás most");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Hány napig kell futnia ennek az aukciónak?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Aukciós házfoglalás (ne mondd le) aukcióra:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Vegye figyelembe, hogy amikor licitál, a számla további adót tartalmaz");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Ha az Ajánlat vagy a Vásárlás most gombra kattint, akkor jogilag kötelező érvényű szerződést köt, hogy megvásárolja a terméket vagy csomagot az eladótól. Ez a webhely nem felelős az eladó által felsorolt ​​tartalmakért.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Hiba, meg kell adnia egy címet.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Hiba, leírást kell tartalmaznia.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Aktív aukciók");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Befejezett aukciók");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Legmagasabb ajánlat");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Nincs licit");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Hátralévő idő");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Adja meg ajánlatát");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Az Ön ajánlata megtörtént!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Ön nyeri ezt az aukciót!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Túllépték!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Gratulálunk, megnyerted ezt az aukciót!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Sajnáljuk, elvesztette ezt az aukciót.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Az aukció befejeződött");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Sajnáljuk, nem licitálhat ezen az aukción, mert nincs bejelentkezve.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Sajnáljuk, nem licitálhat erre az aukcióra, mert véget ért.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Sajnáljuk, nem licitálhat ezen az aukción, nem találjuk az aukció azonosítóját.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Sajnáljuk, az ajánlata túl alacsony volt.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Nem licitálhat saját aukcióján.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Még nem licitálhat erre az aukcióra, mert nem adta meg adatait. Kérjük, kattintson a \"Fiók szerkesztése\" fölött található linkre a fiókadatok kitöltéséhez.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Sajnáljuk, nem mondhatja le ezt az aukciót, mert nincs bejelentkezve.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Sajnáljuk, nem mondhatja le ezt az aukciót, mert már licitáltak rá. Csak azok az aukciók törölhetők, amelyekre nincs licit.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Sajnáljuk, de nem mondhatja le az aukciót, mivel az már véget ért.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Sajnáljuk, nem törölheti ezt az aukciót, mivel nincs hozzáférési joga ehhez az aukcióhoz.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Saját figyelőlisták");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Szám a listában");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Figyelőlista");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Hozzáadás a figyelési listához");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Figyelőlista hozzáadása");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Írja be az új lista nevét");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Új figyelőlista mentése");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Aukció hozzáadva a listához");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Még nincs figyelőlistája. Az aukciót hozzáadhatja a figyelőlistájához az első lista létrehozásához, vagy a menü Figyelőlista hozzáadása opciójával manuálisan hozzáadhat listát.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Hiba, a figyelőlista nem létezik.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Ez az ingatlan részt vesz az aukciós programunkban, és egy vagy több csomagot kínál aukcióra, lásd az alábbi listát.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Információ");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Aukciós jutalék");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Aukció:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Ajánlatot tett aukcióra:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Ajánlatot tett egy aukcióra. Az aukciót az alábbi linken tekintheti meg:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Túllépték! Aukció:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Ön túllicitált egy aukción. Az aukciót az alábbi linken tekintheti meg:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Ön nyert egy aukciót! Aukció:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Ön nyert egy aukciót. Az aukciót az alábbi linken tekintheti meg:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Kérjük, győződjön meg arról, hogy azonnal kifizeti az eladót. A számla itt található:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Az aukció véget ért. Aukció:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Ez az aukció véget ért. Az aukciót itt tekintheti meg:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Az aukció befejeződött. A nyertes részletei a következők:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Megjeleníti az Aukciósház oldalt.");
