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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Auksjonshus");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Kjøper");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Selger");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Auksjoner hjemme");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Elementer jeg har bydd på");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Liste auksjoner");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Egenskapsdashboard");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "List your auctions");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Ny auksjon");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Rediger auksjon");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Avbryt auksjon");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Avslutt auksjonen tidlig");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Velg eiendommen du vil knytte denne auksjonen til.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Inkluderer du rom/eiendommen i denne auksjonen?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Velg rommene du vil inkludere i denne auksjonen. Velg først datoene for bestillingen, så kan du velge rommene.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Velg datoene du vil bestille eiendommen ut som en del av auksjonen.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Vilkår og betingelser");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Vilkår og betingelser");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Detaljerte vilkår og betingelser.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Auksjonstittel");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Beskrivelse");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Verdi av denne auksjonen");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Skriv inn verdien på pakken du tilbyr. Den vil ikke bli vist for kjøpere.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Reserve");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Reserven er ikke oppfylt");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Kjøp nå");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Hvor mange dager skal denne auksjonen kjøre for?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Auksjonsbooking (ikke avbryt) på auksjon:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Vær oppmerksom på at når du byr, vil fakturaen din inkludere tilleggsavgift på");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Hvis du klikker på Bud eller Kjøp nå -knappen, inngår du en juridisk bindende kontrakt for å kjøpe varen eller pakken fra selgeren. Dette nettstedet er ikke ansvarlig for innhold som er oppført av selgeren.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Feil, du må inkludere en tittel.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Feil, du må inkludere en beskrivelse.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Aktive auksjoner");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Ferdige auksjoner");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Høyeste bud");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Ingen bud");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Tid igjen");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Legg inn bud");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Ditt bud er lagt!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Du vinner denne auksjonen!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Du har blitt overbudt!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Gratulerer, du vant denne auksjonen!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Beklager, du tapte denne auksjonen.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Auksjonen er ferdig");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Beklager, du kan ikke by på denne auksjonen fordi du ikke er logget inn.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Beklager, du kan ikke by på denne auksjonen fordi den er avsluttet.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Beklager, du kan ikke by på denne auksjonen, vi kan ikke finne auksjons -ID -en.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Beklager, budet ditt var for lavt.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Du kan ikke by på din egen auksjon.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Du kan ikke by på auksjonen enda fordi du ikke har angitt detaljene dine. Klikk på lenken ovenfor \"Rediger konto\" for å fylle ut kontodetaljene dine først.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Beklager, du kan ikke avbryte denne auksjonen fordi du ikke er logget inn.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Beklager, du kan ikke avbryte denne auksjonen fordi den allerede har blitt tilbudt. Bare auksjoner som ikke har bud kan kanselleres.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Beklager, du kan ikke avbryte denne auksjonen siden den allerede er avsluttet.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Beklager, du kan ikke avbryte denne auksjonen da du ikke har tilgangsrett til denne auksjonen.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Dine overvåkningslister");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Antall i listen");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Watchlist");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Legg til i overvåkningslisten");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Legg til overvåkningsliste");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Skriv inn det nye listenavnet");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Lagre ny overvåkningsliste");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Auksjon lagt til listen");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Du har ingen overvåkningslister ennå. Du kan enten legge til en auksjon i overvåkningslisten din for å opprette din første liste, eller bruke alternativet Legg til overvåkningsliste i menyen for å legge til en liste manuelt.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Feil, den overvåkingslisten finnes ikke.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Denne eiendommen deltar i vårt auksjonsprogram og tilbyr en eller flere auksjonspakker, se listen nedenfor.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Informasjon om");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Auksjonskommisjon");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Auksjon:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Du har lagt et bud på auksjon:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Du har lagt inn et bud på en auksjon. Du kan se auksjonen ved å gå til følgende lenke:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "You have been outbid! Auction:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Du har blitt overbudt på en auksjon. Du kan se auksjonen ved å gå til følgende lenke:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Du har vunnet en auksjon! Auksjon:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Du har vunnet en auksjon. Du kan se auksjonen ved å gå til følgende lenke:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Sørg for at du betaler selgeren umiddelbart. Fakturaen er her:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Auksjonen er avsluttet. Auksjon:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Denne auksjonen er avsluttet. Du kan se auksjonen her:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Auksjon fullført. Vinnerens detaljer følger:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Viser siden på auksjonshuset.");

