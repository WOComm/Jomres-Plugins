<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Izsoļu nams");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Pērk");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Pārdošana");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Izsoļu sākums");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Vienumi, par kuriem esmu nosolījis cenu");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Sarakstu izsoles");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Īpašuma informācijas panelis");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Sarakstiet savas izsoles");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Jauna izsole");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Rediģēt izsoli");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Atcelt izsoli");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Beigt izsoli agri");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Lūdzu, izvēlieties īpašumu, ar kuru vēlaties saistīt šo izsoli.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Vai jūs šajā izsolē iekļaujat telpas/īpašumu?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Lūdzu, atlasiet telpas, kuras vēlaties iekļaut šajā izsolē. Vispirms izvēlieties rezervācijas datumus, pēc tam varat izvēlēties telpas.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Lūdzu, izvēlieties datumus, kad vēlaties rezervēt īpašumu izsoles ietvaros.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Noteikumi un nosacījumi");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Noteikumi un nosacījumi");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Detalizēti noteikumi un nosacījumi.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Izsoles nosaukums");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Apraksts");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Šīs izsoles vērtība");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Lūdzu, ievadiet piedāvātās pakas vērtību. Pircējiem tā netiks rādīta.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Rezervēt");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Rezerve nav izpildīta");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Pirkt tūlīt");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Cik dienas šai izsolei vajadzētu darboties?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Izsoļu nama rezervēšana (neatcelt) izsolē:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Ņemiet vērā, ka, nosakot cenu, jūsu rēķinā tiks iekļauts papildu nodoklis");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Noklikšķinot uz pogas Cena vai Pirkt tūlīt, jūs noslēdzat juridiski saistošu līgumu par preces vai iepakojuma iegādi no pārdevēja. Šī vietne nav atbildīga par pārdevēja norādīto saturu.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Kļūda, jums ir jāiekļauj nosaukums.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Kļūda, jums ir jāiekļauj apraksts.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Aktīvās izsoles");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Pabeigtās izsoles");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Visaugstākā cena");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Nav cenu");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Atlikušais laiks");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Novietojiet cenu");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Jūsu cena ir ievietota!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Jūs uzvarējat šajā izsolē!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Jūs esat pārspējis!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Apsveicam, jūs uzvarējāt šajā izsolē!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Atvainojiet, jūs zaudējāt šo izsoli.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Izsole ir beigusies");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Atvainojiet, jūs nevarat piedāvāt cenu šajā izsolē, jo neesat pieteicies.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Atvainojiet, jūs nevarat solīt cenu šajā izsolē, jo tā ir beigusies.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Atvainojiet, jūs nevarat solīt cenu šajā izsolē, mēs nevaram atrast šīs izsoles ID.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Diemžēl jūsu cena bija pārāk zema.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Jūs nevarat solīt cenu savā izsolē.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Jūs vēl nevarat solīt cenu šajā izsolē, jo neesat ievadījis savus datus. Lūdzu, vispirms noklikšķiniet uz saites virs \"Rediģēt kontu\", lai vispirms aizpildītu sava konta informāciju.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Diemžēl jūs nevarat atcelt šo izsoli, jo neesat pieteicies.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Atvainojiet, jūs nevarat atcelt šo izsoli, jo par to jau ir solīts. Atcelt var tikai tās izsoles, kurām nav cenu.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Atvainojiet, jūs nevarat atcelt šo izsoli, jo tā jau ir beigusies.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Diemžēl jūs nevarat atcelt šo izsoli, jo jums nav piekļuves tiesību šai izsolei.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Jūsu skatīšanās saraksti");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Skaits sarakstā");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Skatīšanās saraksts");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Pievienot skatīšanās sarakstam");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Pievienot skatīšanās sarakstu");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Ievadiet jauno saraksta nosaukumu");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Saglabāt jaunu skatīšanās sarakstu");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Izsole pievienota sarakstam");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Jums vēl nav neviena skatīšanās saraksta. Jūs varat vai nu pievienot izsoli savam skatīšanās sarakstam, lai izveidotu pirmo sarakstu, vai arī izmantot izvēlnes opciju Pievienot skatīšanās sarakstu, lai manuāli pievienotu sarakstu.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Kļūda, šis skatīšanās saraksts nepastāv.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Šis īpašums piedalās mūsu izsoles programmā un piedāvā izsolē vienu vai vairākas paketes, lūdzu, skatiet zemāk esošo sarakstu.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Informācija par");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Izsoles komisija");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Izsole:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Jūs esat ievietojis cenu izsolē:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Jūs esat ievietojis cenu izsolē. Izsoli varat redzēt, apmeklējot šo saiti:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Jūs esat pārspējis! Izsole:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Jūs esat pārsolījis izsolē. Jūs varat redzēt izsoli, apmeklējot šo saiti:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Jūs esat uzvarējis izsolē! Izsole:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Jūs esat uzvarējis izsolē. Jūs varat redzēt izsoli, apmeklējot šo saiti:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Lūdzu, nekavējoties samaksājiet pārdevējam. Jūsu rēķins ir šeit:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Izsole ir beigusies. Izsole:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Šī izsole ir beigusies. Izsoli varat redzēt šeit:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Izsole pabeigta. Seko uzvarētāja informācija:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Parāda izsoļu nama lapu.");