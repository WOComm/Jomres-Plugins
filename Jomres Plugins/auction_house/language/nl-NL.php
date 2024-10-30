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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################




jr_define('_JOMRES_AUCTIONHOUSE_TITLE',"Veilinghuis");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE',"Kopen");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE',"Verkopen");

jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME',"Veilingen thuis");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS',"Artikelen waarop ik heb geboden");

jr_define('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD',"Lijst veilingen");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD',"Eigenschappendashboard");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS',"Laat uw veilingen zien");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION',"Nieuwe veiling");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION',"Veiling bewerken");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION',"Veiling annuleren");
jr_define('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION',"Beëindig de veiling vroegtijdig");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY',"Kies de woning waaraan u deze veiling wilt koppelen.");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS',"Neemt u kamers/het onroerend goed op in deze veiling?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP',"Selecteer de kamers die u wilt opnemen in deze veiling. Kies eerst de data voor de boeking, daarna kunt u de kamers selecteren. ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP',"Kies de data waarop u de woning wilt reserveren als onderdeel van de veiling.");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_LINK',"Algemene voorwaarden");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_TEXT',"Algemene voorwaarden");

jr_define('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED',"Gedetailleerde voorwaarden.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE',"Veilingtitel");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION',"Beschrijving");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE',"Waarde van deze veiling");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO',"Voer de waarde in van het pakket dat u aanbiedt. Het wordt niet getoond aan kopers.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE',"Reserveren");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET',"Reserve niet gehaald");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE',"Koop nu");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN',"Hoeveel dagen moet deze veiling duren?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE',"Veilinghuisboeking (niet annuleren) voor veiling : ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE',"Houd er rekening mee dat wanneer u een bod uitbrengt, uw factuur inclusief btw is van ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER',"Als u op de knop Bieden of Nu kopen klikt, gaat u een juridisch bindend contract aan om het item of pakket van de verkoper te kopen. Deze site is niet verantwoordelijk voor de inhoud die door de verkoper wordt vermeld.") ;


jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR',"Fout, je moet een titel toevoegen.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR',"Fout, u moet een beschrijving opnemen.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS',"Actieve veilingen");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS',"Voltooide veilingen");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID',"Hoogste bod");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS',"Geen biedingen");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT',"Tijd resterend");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID',"Plaats uw bod");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED',"Uw bod is geplaatst!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST',"Je wint deze veiling!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID',"Je bent overboden!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON',"Gefeliciteerd, je hebt deze veiling gewonnen!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST',"Sorry, je hebt deze veiling verloren.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED',"Veiling is afgelopen");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN',"Sorry, u kunt niet bieden op deze veiling omdat u niet bent ingelogd.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED',"Sorry, u kunt niet bieden op deze veiling omdat deze is afgelopen.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND',"Sorry, u kunt niet bieden op deze veiling, we kunnen die veiling-ID niet vinden.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW',"Sorry, uw bod was te laag.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION',"U kunt niet bieden op uw eigen veiling.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE',"U kunt nog niet bieden op deze veiling omdat u uw gegevens niet heeft ingevuld. Klik op de link hierboven 'Account bewerken' om eerst uw accountgegevens in te vullen.");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN',"Sorry, u kunt deze veiling niet annuleren omdat u niet bent ingelogd.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID',"Sorry, u kunt deze veiling niet annuleren omdat er al op geboden is. Alleen veilingen zonder biedingen kunnen worden geannuleerd.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED',"Sorry, u kunt deze veiling niet annuleren omdat deze al is afgelopen.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS',"Sorry, u kunt deze veiling niet annuleren omdat u geen toegangsrechten heeft voor deze veiling.");

jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS',"d");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS',"h");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES',"m");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS',"s");

jr_define('_JOMRES_AUCTIONHOUSE_LISTS',"Uw volglijsten");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_COUNT',"Nummer in lijst");
jr_define('_JOMRES_AUCTIONHOUSE_DEFAULTLIST',"Volglijst");
jr_define('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS',"Toevoegen aan volglijst");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADD',"Volglijst toevoegen");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME',"Voer de nieuwe lijstnaam in");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST',"Sla nieuwe volglijst op");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST',"Veiling toegevoegd aan lijst");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS',"Je hebt nog geen volglijsten. Je kunt ofwel een veiling aan je volglijst toevoegen om je eerste lijst te maken, of de optie Volglijst toevoegen in het menu gebruiken om handmatig een lijst toe te voegen.");
jr_define('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST',"Fout, die controlelijst bestaat niet.");

jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO',"Deze woning neemt deel aan ons veilingprogramma en biedt een of meer pakketten aan voor de veiling, zie de lijst hieronder.");
jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO',"Informatie over ");

jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD',"Veilingcommissie");
jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE',"Veiling: ");

jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT',"U heeft een bod gedaan voor de veiling : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY',"U heeft geboden voor een veiling. U kunt de veiling bekijken door de volgende link te bezoeken: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT',"Je bent overboden! Veiling : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY',"U bent overboden op een veiling. U kunt de veiling bekijken via de volgende link: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT',"U heeft een veiling gewonnen! Veiling : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY',"U heeft een veiling gewonnen. U kunt de veiling bekijken via de volgende link: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2',"Zorg ervoor dat u de verkoper snel betaalt. Uw factuur is hier: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT',"Veiling is afgelopen. Veiling: ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY',"Deze veiling is afgelopen. U kunt de veiling hier bekijken : ");

jr_define('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE',"Veiling voltooid. Details van de winnaar volgen: ");

jr_define( '_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Geeft de pagina van het veilinghuis weer." );

