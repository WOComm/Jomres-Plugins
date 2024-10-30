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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Dražbena hiša");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Nakup");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Prodaja");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Dražbe doma");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Predmeti, za katere imam ponudbo");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Dražbe na seznamu");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Nadzorna plošča nepremičnine");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Navedite svoje dražbe");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Nova dražba");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Urejanje dražbe");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Prekliči dražbo");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Predčasno zaključite dražbo");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Prosimo, izberite nepremičnino, s katero želite povezati to dražbo.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Ali na tej dražbi vključujete sobe/nepremičnine?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Prosimo, izberite sobe, ki jih želite vključiti v to dražbo. Najprej izberite datume za rezervacijo, nato lahko izberete sobe.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Izberite datume, ko želite nepremičnino rezervirati kot del dražbe.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Določila in pogoji");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Določila in pogoji");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Podrobni pogoji.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Naslov dražbe");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Opis");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Vrednost te dražbe");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Prosimo, vnesite vrednost paketa, ki ga ponujate. Kupcem ne bo prikazan.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Rezerviraj");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Rezerva ni izpolnjena");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Kupi zdaj");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Koliko dni naj traja ta dražba?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Rezervacija avkcijske hiše (ne prekliči) na dražbi:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Upoštevajte, da bo vaš račun, ko boste ponudili ponudbo, vseboval dodaten davek v višini");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Če kliknete gumb Ponudba ali Kupite zdaj, sklepate pravno zavezujočo pogodbo za nakup artikla ali paketa od prodajalca. To spletno mesto ni odgovorno za vsebino, ki jo je navedel prodajalec.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Napaka, vključiti morate naslov.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Napaka, vključiti morate opis.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Aktivne dražbe");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Dokončane dražbe");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Najvišja ponudba");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Brez ponudb");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Še preostali čas");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Daj svojo ponudbo");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Vaša ponudba je bila dana!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Na tej dražbi zmagujete!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Bili ste preseženi!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Čestitamo, zmagali ste na tej dražbi!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Žal ste izgubili to dražbo.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Dražba je končana");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Žal na tej dražbi ne morete ponuditi, ker niste prijavljeni.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Žal na tej dražbi ne morete ponuditi, ker se je končala.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Žal na tej dražbi ne morete ponuditi, te licitacije ne najdemo.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Žal je bila vaša ponudba prenizka.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Ne morete ponuditi na svoji dražbi.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Na tej dražbi še ne morete ponuditi, ker niste vnesli svojih podatkov. Najprej kliknite povezavo \"Uredi račun\", da izpolnite podatke o svojem računu.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Žal te dražbe ne morete preklicati, ker niste prijavljeni.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Žal te dražbe ne morete preklicati, ker je bila že ponujena. Le dražbe, ki nimajo ponudb, je mogoče preklicati.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Žal te dražbe ne morete preklicati, ker se je že končala.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Žal te dražbe ne morete preklicati, ker nimate pravic dostopa do te dražbe.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Vaši seznami ogledov");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Številka na seznamu");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Seznam za spremljanje");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Dodaj na seznam za spremljanje");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Dodaj seznam za spremljanje");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Vnesite novo ime seznama");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Shrani nov seznam za spremljanje");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Dražba dodana na seznam");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Nimate še nobenega seznama za ogled. Če želite ustvariti svoj prvi seznam, lahko dodate dražbo na svoj seznam za ogled ali uporabite možnost Dodaj seznam za spremljanje v meniju, da ročno dodate seznam.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Napaka, ta seznam za ogled ne obstaja.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Ta nepremičnina sodeluje v našem dražbenem programu in ponuja enega ali več paketov za dražbo, oglejte si spodnji seznam.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Podatki o");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Dražbena provizija");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Dražba:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Dali ste ponudbo za dražbo:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Dali ste ponudbo za dražbo. Dražbo si lahko ogledate na naslednji povezavi:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Bili ste preseženi! Dražba:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Bili ste na dražbi dražji. Dražino si lahko ogledate na naslednji povezavi:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Zmagali ste na dražbi! Dražba:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Zmagali ste na dražbi. Dražbo si lahko ogledate na naslednji povezavi:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Prosimo, da prodajalcu takoj plačate. Vaš račun je tukaj:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Dražba se je končala. Dražba:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Ta dražba se je končala. Dražbo si lahko ogledate tukaj:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Dražba je zaključena. Podrobnosti o zmagovalcu sledijo:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Prikaže stran dražbene hiše.");



