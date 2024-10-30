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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Auktionshus");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Køb");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Sælger");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Auktionshjem");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Varer jeg har budt på");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Liste auktioner");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Ejendommens dashboard");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Liste dine auktioner");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Ny auktion");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Rediger auktion");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Annuller auktion");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Afslut auktionen tidligt");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Vælg den ejendom, du vil knytte denne auktion til.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Inkluderer du værelser/ejendommen i denne auktion?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Vælg de værelser, du vil inkludere i denne auktion. Vælg først datoerne for reservationen, derefter kan du vælge værelserne.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Vælg de datoer, du vil booke ejendommen ud som en del af auktionen.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Vilkår og betingelser");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Vilkår og betingelser");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Detaljerede vilkår og betingelser.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Auktionstitel");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Beskrivelse");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Auktionens værdi");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Angiv værdien af ​​den pakke, du tilbyder. Den vises ikke til købere.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Reserver");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Reserve ikke opfyldt");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Køb nu");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Hvor mange dage skal denne auktion køre?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Auktionshusreservation (aflys ikke) til auktion:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Bemærk, at når du byder, vil din faktura omfatte ekstra skat på");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Hvis du klikker på knappen Bud eller køb nu, indgår du en juridisk bindende kontrakt om at købe varen eller pakken fra sælgeren. Dette websted er ikke ansvarligt for indhold, der er angivet af sælgeren.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Fejl, du skal inkludere en titel.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Fejl, du skal inkludere en beskrivelse.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Aktive auktioner");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Færdig auktioner");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Højeste bud");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Ingen bud");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Tid tilbage");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Afgiv dit bud");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Dit bud er blevet placeret!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Du vinder denne auktion!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Du har været overbudt!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Tillykke, du vandt denne auktion!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Beklager, du tabte denne auktion.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Auktionen er afsluttet");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Du kan desværre ikke byde på denne auktion, fordi du ikke er logget ind.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Beklager, du kan ikke byde på denne auktion, fordi den er slut.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Du kan desværre ikke byde på denne auktion, vi kan ikke finde det auktions -id.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Beklager, dit bud var for lavt.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Du kan ikke byde på din egen auktion.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Du kan ikke byde på denne auktion endnu, fordi du ikke har angivet dine oplysninger. Klik først på linket ovenfor 'Rediger konto' for at udfylde dine kontooplysninger først.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Beklager, du kan ikke annullere denne auktion, fordi du ikke er logget ind.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Beklager, du kan ikke annullere denne auktion, fordi den allerede er blevet tilbudt. Kun auktioner, der ikke har bud, kan annulleres.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Beklager, du kan ikke aflyse denne auktion, da den allerede er afsluttet.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Beklager, du kan ikke annullere denne auktion, da du ikke har adgangsrettigheder til denne auktion.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Dine overvågningslister");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Nummer i listen");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Watchlist");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Føj til overvågningsliste");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Tilføj overvågningsliste");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Indtast det nye listenavn");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Gem ny overvågningsliste");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Auktion tilføjet til liste");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Du har ikke nogen overvågningslister endnu. Du kan enten tilføje en auktion til din overvågningsliste for at oprette din første liste eller bruge tilføjelsen Tilføj overvågningsliste i menuen til manuelt at tilføje en liste.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Fejl, den overvågningsliste findes ikke.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Denne ejendom deltager i vores auktionsprogram og tilbyder en eller flere auktionspakker, se listen herunder.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Oplysninger om");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Auktionskommission");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Auktion:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Du har lagt et bud på auktion:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Du har lagt et bud på en auktion. Du kan se auktionen ved at besøge følgende link:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Du er blevet overbudt! Auktion:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Du er blevet overbudt på en auktion. Du kan se auktionen ved at besøge følgende link:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Du har vundet en auktion! Auktion:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Du har vundet en auktion. Du kan se auktionen ved at besøge følgende link:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Sørg for, at du betaler sælgeren straks. Din faktura er her:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Auktionen er afsluttet. Auktion:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Denne auktion er afsluttet. Du kan se auktionen her:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Auktion afsluttet. Vinderens detaljer følger:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Viser siden på auktionshuset.");
