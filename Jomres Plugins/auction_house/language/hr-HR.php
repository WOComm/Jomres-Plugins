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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Aukcijska kuća");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Kupnja");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Prodaja");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Aukcije kuće");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Stavke za koje imam licitaciju");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Aukcije popisa");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Nadzorna ploča nekretnine");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Navedite svoje dražbe");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Nova aukcija");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Uredi dražbu");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Otkaži dražbu");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Prijevremeno završi dražbu");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Molimo odaberite nekretninu s kojom želite povezati ovu dražbu.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Uključujete li sobe/nekretninu na ovu dražbu?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Molimo odaberite sobe koje želite uključiti u ovu dražbu. Prvo odaberite datume za rezervaciju, a zatim možete odabrati sobe.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Odaberite datume za koje želite rezervirati nekretninu kao dio aukcije.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Uvjeti i odredbe");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Uvjeti i odredbe");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Detaljni uvjeti i odredbe.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Naslov dražbe");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Opis");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Vrijednost ove dražbe");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Molimo unesite vrijednost paketa koji nudite. Neće biti prikazan kupcima.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Rezerviraj");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Rezerva nije ispunjena");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Kupi sada");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Koliko dana bi trebala trajati ova aukcija?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Rezervacija aukcijske kuće (ne odustati) za dražbu:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Imajte na umu da će vaša faktura uključivati ​​dodatni porez u iznosu od");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Ako kliknete gumb Ponudi ili Kupi odmah, sklapate pravno obvezujući ugovor o kupnji artikla ili paketa od prodavatelja. Ova web stranica nije odgovorna za sadržaj koji je naveden od strane prodavatelja.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Pogreška, morate uključiti naslov.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Pogreška, morate uključiti opis.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Aktivne aukcije");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Završene aukcije");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Najviša ponuda");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Nema ponuda");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Preostalo vrijeme");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Postavite svoju ponudu");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Vaša je ponuda stavljena!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Pobjeđujete na ovoj dražbi!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Bili ste nadmašeni!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Čestitamo, pobijedili ste na ovoj aukciji!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Nažalost, izgubili ste ovu dražbu.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Aukcija je završena");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Nažalost, ne možete licitirati na ovoj dražbi jer niste prijavljeni.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Nažalost, ne možete licitirati na ovoj dražbi jer je završila.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Nažalost, ne možete licitirati na ovoj dražbi, ne možemo pronaći taj ID dražbe.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Žao nam je, vaša je ponuda bila preniska.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Ne možete licitirati na vlastitoj dražbi.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Još ne možete licitirati na ovoj dražbi jer niste unijeli svoje podatke. Molimo kliknite na gornju vezu \"Uredi račun\" da biste prvo popunili podatke o svom računu.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Nažalost, ne možete otkazati ovu dražbu jer niste prijavljeni.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Žao nam je, ne možete otkazati ovu dražbu jer je već ponuđena. Samo dražbe bez ponuda se mogu otkazati.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Nažalost, ne možete otkazati ovu dražbu jer je već završila.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Nažalost, ne možete otkazati ovu dražbu jer nemate prava pristupa ovoj dražbi.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Vaši popisi za gledanje");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Broj na popisu");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Popis za gledanje");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Dodaj na popis za praćenje");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Dodaj popis za praćenje");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Unesite novi naziv popisa");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Spremi novi popis za praćenje");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Aukcija je dodana na popis");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Još nemate popise za gledanje. Možete dodati dražbu na popis za gledanje kako biste izradili svoj prvi popis, ili upotrijebite opciju Dodaj popis za praćenje u izborniku za ručno dodavanje popisa.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Pogreška, taj popis za gledanje ne postoji.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Ova nekretnina sudjeluje u našem programu dražbi i nudi jedan ili više paketa za dražbu, pogledajte donji popis.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Podaci o");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Aukcijska provizija");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Aukcija:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Dali ste ponudu za dražbu:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Dali ste ponudu za dražbu. Dražbu možete vidjeti ako posjetite sljedeću vezu:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Bili ste nadmašeni! Aukcija:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Bili ste nadmašeni na aukciji. Aukciju možete vidjeti ako posjetite sljedeću vezu:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Dobili ste aukciju! Aukcija:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Pobijedili ste na dražbi. Aukciju možete vidjeti ako posjetite sljedeću vezu:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Molimo vas da prodavatelju platite odmah. Vaša je faktura ovdje:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Dražba je završila. Aukcija:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Ova je dražba završila. Dražbu možete vidjeti ovdje:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Aukcija je dovršena. Slijede detalji pobjednika:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Prikazuje stranicu aukcijske kuće.");
