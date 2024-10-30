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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Casa de subhastes");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Compra");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Venent");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Casa de subhastes");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Articles per als quals he ofertat");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Llistar subhastes");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Tauler de propietats");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Enumereu les vostres subhastes");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Nova subhasta");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Edita la subhasta");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Cancel·la la subhasta");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Finalitzar la subhasta abans");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Seleccioneu la propietat amb la qual vulgueu associar aquesta subhasta.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Inclou les habitacions / la propietat en aquesta subhasta?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Seleccioneu les habitacions que voleu incloure en aquesta subhasta. Primer trieu les dates de la reserva i, a continuació, podeu seleccionar les habitacions.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Seleccioneu les dates en què voleu reservar la propietat com a part de la subhasta.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Termes i condicions");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Termes i condicions");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Termes i condicions detallades.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Títol de la subhasta");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Descripció");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Valor d'aquesta subhasta");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Introduïu el valor del paquet que esteu oferint. No es mostrarà als compradors.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Reserva");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "La reserva no s'ha complert");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Compra ara");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Quants dies ha de funcionar aquesta subhasta?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Reserva de subhastes (no cancel·leu) per a subhasta:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Tingueu en compte que quan feu una oferta, la vostra factura inclourà impostos addicionals de");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER', "Si feu clic al botó Oferta o Compra ara, subscriviu un contracte legalment vinculant per comprar l'article o el paquet al venedor. Aquest lloc no es fa responsable del contingut que enumera el venedor.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Error, heu d'incloure un títol.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Error, heu d'incloure una descripció.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Subhastes actives");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Subhastes acabades");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Oferta més alta");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Sense ofertes");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Temps restant");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Feu la vostra oferta");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "La vostra oferta s'ha realitzat!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Esteu guanyant aquesta subhasta!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Heu superat!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Enhorabona, heu guanyat aquesta subhasta!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Ho sentim, heu perdut aquesta subhasta.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "La subhasta ha finalitzat");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Ho sentim, no podeu fer ofertes en aquesta subhasta perquè no heu iniciat la sessió.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Ho sentim, no podeu fer ofertes en aquesta subhasta perquè ha finalitzat.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Ho sentim, no podeu fer ofertes en aquesta subhasta, no podem trobar aquest identificador de subhasta.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Ho sentim, la vostra oferta era massa baixa.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "No podeu fer ofertes a la vostra pròpia subhasta.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Encara no podeu fer ofertes en aquesta subhasta perquè no heu introduït les vostres dades. Feu clic a l'enllaç que hi ha a sobre \"Edita el compte\" per omplir primer els detalls del compte.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Ho sentim, no podeu cancel·lar aquesta subhasta perquè no heu iniciat la sessió.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "No podeu cancel·lar aquesta subhasta perquè ja s'ha ofert. Només es poden cancel·lar les subhastes que no tinguin cap oferta.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Ho sentim, no podeu cancel·lar aquesta subhasta ja que ja ha finalitzat.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Ho sentim, no podeu cancel·lar aquesta subhasta ja que no teniu drets d'accés a aquesta subhasta.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Les vostres llistes de vigilància");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Número a la llista");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Llista de vigilància");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Afegeix a la llista de seguiment");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Afegeix una llista de seguiment");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Introduïu el nom de la llista nova");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Desa la llista de seguiment nova");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Subhasta afegida a la llista");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Encara no teniu cap llista de visualització. Podeu afegir una subhasta a la vostra llista de seguiment per crear la primera llista o bé podeu utilitzar l'opció Afegeix una llista de vigilància al menú per afegir manualment una llista.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Error, aquesta llista de vigilància no existeix.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Aquesta propietat participa al nostre programa de subhastes i ofereix un o més paquets per a la subhasta; consulteu la llista següent.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Informació sobre");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Comissió de subhasta");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Subhasta:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Heu ofert una subhasta:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Heu fet una oferta per a una subhasta. Podeu veure la subhasta visitant el següent enllaç:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Se us ha superat! Subhasta:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Se us ha superat la subhasta. Podeu veure la subhasta visitant el següent enllaç:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Heu guanyat una subhasta! Subhasta:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Heu guanyat una subhasta. Podeu veure la subhasta visitant el següent enllaç:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Assegureu-vos que pagueu el venedor ràpidament. La vostra factura és aquí:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "La subhasta ha finalitzat. Subhasta:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Aquesta subhasta ha finalitzat. Podeu veure la subhasta aquí:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Subhasta finalitzada. A continuació es detallen les dades del guanyador:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Mostra la pàgina de la casa de subhastes.");