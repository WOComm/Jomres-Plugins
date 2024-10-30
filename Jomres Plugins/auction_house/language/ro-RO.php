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

jr_define ('_JOMRES_AUCTIONHOUSE_TITLE', "Casa de licitații");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE', "Cumpărare");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE', "Vânzare");

jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME', "Licitații acasă");
jr_define ('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS', "Articolele pe care am licitat");

jr_define ('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD', "Listează licitațiile");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD', "Tabloul de bord al proprietății");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS', "Enumerați-vă licitațiile");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION', "Licitație nouă");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION', "Editați licitația");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION', "Anulați licitația");
jr_define ('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION', "Încheiați licitația devreme");

jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY', "Vă rugăm să alegeți proprietatea cu care doriți să asociați această licitație.");
jr_define ('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS', "Includeți camere / proprietatea în această licitație?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP', "Vă rugăm să selectați camerele pe care doriți să le includeți în această licitație. Alegeți mai întâi datele pentru rezervare, apoi puteți selecta camerele.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP', "Vă rugăm să alegeți datele în care doriți să rezervați proprietatea ca parte a licitației.");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_LINK', "Termeni și condiții");
jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_TEXT', "Termeni și condiții");

jr_define ('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED', "Termeni și condiții detaliate.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE', "Titlul licitației");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION', "Descriere");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE', "Valoarea acestei licitații");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO', "Vă rugăm să introduceți valoarea pachetului pe care îl oferiți. Nu va fi afișat cumpărătorilor.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE', "Rezervă");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET', "Rezerva nu este îndeplinită");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE', "Cumpărați acum");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN', "Câte zile ar trebui să ruleze această licitație?");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE', "Rezervare casă de licitații (nu anulați) pentru licitație:");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE', "Rețineți că atunci când licitați factura dvs. va include o taxă suplimentară de");
jr_define ("_ JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER", "Dacă faceți clic pe butonul Licitați sau Cumpărați acum, încheiați un contract obligatoriu legal pentru a cumpăra articolul sau pachetul de la vânzător. Acest site nu este responsabil pentru conținutul listat de vânzător.") ;


jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR', "Eroare, trebuie să includeți un titlu.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR', "Eroare, trebuie să includeți o descriere.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS', "Licitații active");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS', "Licitații terminate");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID', "Cea mai mare ofertă");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS', "Fără oferte");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT', "Timp rămas");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID', "Plasați oferta dvs.");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED', "Oferta dvs. a fost plasată!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST', "Câștigi această licitație!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID', "Ați fost supralicitat!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON', "Felicitări, ați câștigat această licitație!");
jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST', "Ne pare rău, ați pierdut această licitație.");

jr_define ('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED', "Licitația s-a încheiat");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN', "Ne pare rău, nu puteți licita la această licitație deoarece nu sunteți autentificat.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED', "Ne pare rău, nu puteți licita la această licitație deoarece s-a încheiat.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND', "Ne pare rău, nu puteți licita la această licitație, nu putem găsi acel cod de licitație.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW', "Ne pare rău, oferta dvs. a fost prea mică.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION', "Nu puteți licita la propria licitație.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE', "Nu puteți licita încă la această licitație, deoarece nu ați introdus datele dvs. Vă rugăm să faceți clic pe linkul de mai sus \"Editați contul\" pentru a completa mai întâi detaliile contului dvs.");

jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN', "Ne pare rău, nu puteți anula această licitație deoarece nu sunteți autentificat.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID', "Ne pare rău, nu puteți anula această licitație deoarece a fost deja licitată. Numai licitațiile care nu au oferte pot fi anulate.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED', "Ne pare rău, nu puteți anula această licitație deoarece s-a încheiat deja.");
jr_define ('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS', "Ne pare rău, nu puteți anula această licitație deoarece nu aveți drepturi de acces la această licitație.");

jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS', "d");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS', "h");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES', "m");
jr_define ('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS', "s");

jr_define ('_JOMRES_AUCTIONHOUSE_LISTS', "Listele dvs. de urmărire");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_COUNT', "Număr în listă");
jr_define ('_JOMRES_AUCTIONHOUSE_DEFAULTLIST', "Lista de urmărire");
jr_define ('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS', "Adăugați la lista de urmărire");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADD', "Adăugați o listă de urmărire");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME', "Introduceți numele listei noi");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST', "Salvați lista de urmărire nouă");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST', "Licitație adăugată la listă");
jr_define ('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS', "Nu aveți încă liste de urmărire. Puteți fie să adăugați o licitație la lista dvs. de urmărire pentru a crea prima listă, fie să utilizați opțiunea Adăugare listă de urmărire din meniu pentru a adăuga manual o listă.");
jr_define ('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST', "Eroare, lista de urmărire nu există.");

jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO', "Această proprietate participă la programul nostru de licitație și oferă unul sau mai multe pachete pentru licitație, vă rugăm să consultați lista de mai jos.");
jr_define ('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO', "Informații despre");

jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD', "Comision de licitație");
jr_define ('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE', "Licitație:");

jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT', "Ați plasat o ofertă pentru licitație:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY', "Ați plasat o ofertă pentru o licitație. Puteți vedea licitația accesând următorul link:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT', "Ați fost supralicitat! Licitație:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY', "Ați fost supralicitat la o licitație. Puteți vedea licitația accesând următorul link:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT', "Ați câștigat o licitație! Licitație:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY', "Ați câștigat o licitație. Puteți vedea licitația accesând următorul link:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2', "Vă rugăm să vă asigurați că plătiți vânzătorul cu promptitudine. Factura dvs. este aici:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT', "Licitația s-a încheiat. Licitație:");
jr_define ('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY', "Această licitație s-a încheiat. Puteți vedea licitația aici:");

jr_define ('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE', "Licitație finalizată. Urmează detaliile câștigătorului:");

jr_define ('_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Afișează pagina Casei de licitații.");
