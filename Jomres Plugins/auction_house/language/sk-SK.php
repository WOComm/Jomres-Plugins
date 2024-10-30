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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Aukčný dom");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Nákup");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Predaj");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Aukcie domov");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Položky, na ktoré som predložil ponuku");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Zoznam aukcií");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Panel vlastností");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Zoznam vašich aukcií");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Nová aukcia");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Upraviť aukciu");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Zrušiť aukciu");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Ukončiť aukciu skôr");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Vyberte si nehnuteľnosť, s ktorou chcete spojiť túto aukciu.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Zahrňujete do tejto aukcie miestnosti/nehnuteľnosť?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Vyberte miestnosti, ktoré chcete zahrnúť do tejto aukcie. Najprv zvoľte dátumy rezervácie, potom môžete vybrať izby.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Vyberte prosím dátumy, kedy chcete nehnuteľnosť zarezervovať v rámci aukcie.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Podmienky");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Podmienky");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Podrobné zmluvné podmienky.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Názov aukcie");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Popis");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Hodnota tejto aukcie");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Zadajte hodnotu balíka, ktorý ponúkate. Nebude sa zobrazovať kupujúcim.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Rezervovať");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Rezervácia nebola splnená");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Kúpiť teraz");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Koľko dní by mala táto aukcia trvať?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Rezervácia aukčného domu (nezrušiť) pre aukciu:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Upozorňujeme, že keď ponúknete, vaša faktúra bude zahŕňať dodatočnú daň vo výške");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Ak kliknete na tlačidlo Ponuka alebo Kúpiť teraz, uzatvárate právne záväznú zmluvu o kúpe položky alebo balíka od predávajúceho. Táto stránka nezodpovedá za obsah uvedený predávajúcim.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Chyba, musíte zadať názov.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Chyba, musíte uviesť popis.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Aktívne aukcie");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Dokončené aukcie");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Najvyššia ponuka");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Žiadne ponuky");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Zostávajúci čas");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Zadať ponuku");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Vaša ponuka bola zadaná!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Vyhrávate túto aukciu!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Boli vám preplatené!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Gratulujeme, vyhrali ste túto aukciu!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Prepáčte, prišli ste o túto aukciu.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Aukcia sa skončila");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Ospravedlňujeme sa, nemôžete prihadzovať v tejto aukcii, pretože nie ste prihlásení.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Ospravedlňujeme sa, nemôžete dražiť na tejto aukcii, pretože sa skončila.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Ospravedlňujeme sa, v tejto aukcii nemôžete ponúkať, nemôžeme nájsť ID tejto aukcie.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Ospravedlňujeme sa, vaša ponuka bola príliš nízka.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Nemôžete ponúkať svoje vlastné aukcie.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "V tejto aukcii zatiaľ nemôžete predkladať ponuky, pretože ste nezadali svoje údaje. Kliknutím na odkaz vyššie \"Upraviť účet\" najskôr zadajte podrobnosti o svojom účte.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Ospravedlňujeme sa, nemôžete zrušiť túto aukciu, pretože nie ste prihlásení.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Ospravedlňujeme sa, túto aukciu nemôžete zrušiť, pretože už bola predložená ponuka. Zrušiť je možné iba aukcie, ktoré nemajú žiadne ponuky.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Ospravedlňujeme sa, túto aukciu nemôžete zrušiť, pretože už sa skončila.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Ospravedlňujeme sa, nemôžete zrušiť túto aukciu, pretože k nej nemáte prístupové práva.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Vaše zoznamy sledovaných stránok");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Číslo v zozname");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Watchlist");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Pridať do zoznamu sledovaných");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Pridať zoznam sledovaných osôb");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Zadajte nový názov zoznamu");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Uložiť nový sledovaný zoznam");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Aukcia pridaná do zoznamu");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Zatiaľ nemáte žiadne zoznamy sledovaných stránok. Buď si môžete pridať aukciu do svojho zoznamu sledovaných, aby ste vytvorili svoj prvý zoznam, alebo použite možnosť Pridať sledovaný zoznam v ponuke na manuálne pridanie zoznamu.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Chyba, tento zoznam sledovania neexistuje.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Toto vlastníctvo sa zúčastňuje nášho aukčného programu a ponúka jeden alebo viac balíkov na aukciu, pozrite si zoznam nižšie.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Informácie o");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Aukčná provízia");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Aukcia:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Zadali ste ponuku do aukcie:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Zadali ste ponuku na aukciu. Dražbu si môžete pozrieť kliknutím na nasledujúci odkaz:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Boli vám preplatené! Aukcia:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Boli vám preplatené aukcie. Dražbu môžete vidieť na nasledujúcom odkaze:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Vyhrali ste aukciu! Aukcia:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Vyhrali ste aukciu. Dražbu si môžete pozrieť na nasledujúcom odkaze:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Zaistite, aby ste predajcovi ihneď zaplatili. Vaša faktúra je tu:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Aukcia sa skončila. Aukcia:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Táto aukcia sa skončila. Dražbu si môžete pozrieť tu:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Aukcia dokončená. Nasledujú podrobnosti o víťazovi:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Zobrazí stránku aukčného domu.");
    
