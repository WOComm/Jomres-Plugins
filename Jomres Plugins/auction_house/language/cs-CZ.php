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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Aukční dům");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Nákup");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Prodej");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Aukce domů");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Položky, na které jsem podal nabídku");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Seznam aukcí");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Panel vlastností");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Seznam vašich aukcí");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Nová aukce");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Upravit aukci");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Zrušit aukci");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Ukončit aukci dříve");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Vyberte prosím nemovitost, se kterou chcete tuto aukci spojit.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Zahrnujete do této aukce pokoje/nemovitost?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Vyberte prosím pokoje, které chcete zahrnout do této aukce. Nejprve vyberte data rezervace, poté můžete vybrat pokoje.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Vyberte prosím data, kdy chcete nemovitost zarezervovat v rámci aukce.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Podmínky");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Podmínky");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Podrobné podmínky.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Název aukce");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Popis");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Hodnota této aukce");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Zadejte prosím hodnotu balíčku, který nabízíte. Nebude zobrazen kupujícím.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Reserve");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Rezerva nebyla splněna");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Koupit");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Kolik dní by měla tato aukce probíhat?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Rezervace aukčního domu (nezrušit) pro aukci:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Všimněte si, že když nabídnete, vaše faktura bude zahrnovat dodatečnou daň ve výši");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Pokud kliknete na tlačítko Bid or Buy Now, uzavíráte právně závaznou smlouvu na nákup položky nebo balíčku od prodávajícího. Tento web nenese odpovědnost za obsah uvedený prodejcem.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Chyba, musíte uvést název.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Chyba, musíte zahrnout popis.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Aktivní aukce");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Hotové aukce");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Nejvyšší nabídka");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Žádné nabídky");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "zbývající čas");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Zadat nabídku");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Vaše nabídka byla zadána!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Vyhráváte tuto aukci!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Byli jste přeplaceni!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Gratulujeme, vyhráli jste tuto aukci!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Omlouváme se, o tuto aukci jste přišli.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Aukce skončila");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Omlouváme se, nemůžete dražit v této aukci, protože nejste přihlášeni.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Litujeme, nemůžete dražit tuto aukci, protože skončila.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Omlouváme se, nemůžete podávat nabídky na tuto aukci, nemůžeme najít toto ID aukce.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Litujeme, vaše nabídka byla příliš nízká.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Nemůžete dražit vlastní aukci.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "V této aukci zatím nemůžete přihazovat, protože jste nezadali své údaje. Klikněte prosím na odkaz výše 'Upravit účet', abyste nejprve vyplnili údaje o svém účtu.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Litujeme, tuto aukci nemůžete zrušit, protože nejste přihlášeni.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Litujeme, tuto aukci nemůžete zrušit, protože již byla nabídnuta. Zrušit lze pouze aukce, které nemají žádné nabídky.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Litujeme, tuto aukci nemůžete zrušit, protože již skončila.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Litujeme, tuto aukci nemůžete zrušit, protože k této aukci nemáte přístupová práva.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Vaše seznamy sledování");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Číslo v seznamu");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Watchlist");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Přidat do seznamu ke sledování");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Přidat sledovaný seznam");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Zadejte název nového seznamu");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Uložit nový seznam ke sledování");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Aukce přidána do seznamu");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Zatím nemáte žádné seznamy sledovaných. Můžete buď přidat aukci do svého seznamu sledovaných a vytvořit svůj první seznam, nebo použít možnost Přidat sledovaný seznam v nabídce pro ruční přidání seznamu.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Chyba, tento seznam sledování neexistuje.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Tato nemovitost se účastní našeho aukčního programu a nabízí jeden nebo více balíčků k aukci, viz seznam níže.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Informace o");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Aukční provize");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Aukce:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Vložili jste nabídku do aukce:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Vložili jste nabídku na aukci. Na aukci se můžete podívat na následujícím odkazu:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Byli jste přeplaceni! Aukce:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Vaše aukce byla přeplacena. Dražbu můžete zobrazit na následujícím odkazu:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Vyhráli jste aukci! Aukce:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Vyhráli jste aukci. Aukci můžete vidět na následujícím odkazu:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Zajistěte prosím okamžité zaplacení prodávajícímu. Vaše faktura je zde:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Aukce skončila. Aukce:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Tato aukce skončila. Dražbu můžete vidět zde:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Aukce dokončena. Následují podrobnosti o vítězi:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Zobrazí stránku aukčního domu.");