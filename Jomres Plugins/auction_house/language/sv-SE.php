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


jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Auktionshus");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Köp");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Säljer");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Auktionshem");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Objekt jag har bjudit på");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Lista auktioner");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Egenskapsinstrumentpanel");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Lista dina auktioner");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Ny auktion");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Redigera auktion");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Avbryt auktion");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Avsluta auktionen tidigt");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Välj den egendom du vill associera denna auktion med.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Inkluderar du rum/fastigheten i denna auktion?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Välj de rum du vill inkludera i denna auktion. Välj först datum för bokningen, sedan kan du välja rum.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Välj de datum du vill boka ut egendomen som en del av auktionen.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Villkor");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Villkor");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Detaljerade villkor.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Auktionstitel");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Beskrivning");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Auktionens värde");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Ange värdet på paketet som du erbjuder. Det visas inte för köpare.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Boka");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Reserv inte uppfyllt");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Köp nu");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Hur många dagar ska denna auktion köras?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Auktionshusbokning (avboka inte) på auktion:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Observera att när du bjuder kommer din faktura att inkludera ytterligare skatt på");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Om du klickar på knappen Bud eller köp nu, ingår du ett juridiskt bindande kontrakt för att köpa varan eller paketet från säljaren. Denna webbplats ansvarar inte för innehåll som anges av säljaren.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Fel, du måste inkludera en titel.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Fel, du måste inkludera en beskrivning.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Aktiva auktioner");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Färdiga auktioner");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Högsta bud");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Inga bud");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Tid kvar");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Lägg ditt bud");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Ditt bud har lagts!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Du vinner denna auktion!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "You have been outbid!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Grattis, du vann denna auktion!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Tyvärr, du förlorade auktionen.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Auktionen är klar");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Du kan tyvärr inte bjuda på denna auktion eftersom du inte är inloggad.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Du kan tyvärr inte bjuda på den här auktionen eftersom den är slut.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Du kan tyvärr inte bjuda på denna auktion, vi kan inte hitta det auktions -id.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Tyvärr, ditt bud var för lågt.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Du kan inte bjuda på din egen auktion.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Du kan inte bjuda på denna auktion ännu eftersom du inte har angett dina uppgifter. Klicka på länken ovanför \"Redigera konto\" för att fylla i dina kontouppgifter först.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Du kan tyvärr inte avbryta denna auktion eftersom du inte är inloggad.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Du kan tyvärr inte avbryta den här auktionen eftersom den redan har bjudits på. Endast auktioner som inte har några bud kan avbrytas.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Du kan tyvärr inte avbryta denna auktion eftersom den redan har avslutats.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Du kan tyvärr inte avbryta denna auktion eftersom du inte har åtkomsträtt till auktionen.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Dina bevakningslistor");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Antal i listan");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Watchlist");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Lägg till i bevakningslista");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Lägg till bevakningslista");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Ange det nya listans namn");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Spara ny bevakningslista");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Auktion läggs till i listan");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Du har inga bevakningslistor än. Du kan antingen lägga till en auktion i din bevakningslista för att skapa din första lista eller använda alternativet Lägg till bevakningslista i menyn för att lägga till en lista manuellt.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Fel, den övervakningslistan finns inte.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Den här fastigheten deltar i vårt auktionsprogram och erbjuder ett eller flera paket för auktion, se listan nedan.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Information om");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Auktionskommission");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Auktion:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Du har lagt ett bud på auktion:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Du har lagt ett bud på en auktion. Du kan se auktionen genom att besöka följande länk:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "You have been outbid! Auction:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Du har blivit överbjuden på en auktion. Du kan se auktionen genom att besöka följande länk:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Du har vunnit en auktion! Auktion:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Du har vunnit en auktion. Du kan se auktionen genom att besöka följande länk:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Se till att du betalar säljaren omedelbart. Din faktura finns här:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Auktionen har avslutats. Auktion:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Auktionen har avslutats. Du kan se auktionen här:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Auktion klar. Vinnarens detaljer följer:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Visar sidan för auktionshuset.");