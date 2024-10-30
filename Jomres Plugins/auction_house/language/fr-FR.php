<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 19/06/2019 - https://www.valtari.fr
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JOMRES_AUCTIONHOUSE_TITLE',"Auction house (Vente aux enchères)");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE',"Achat");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE',"Vente");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME',"Ventes aux enchères");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS',"Articles sur lesquels j'ai enchéries");
jr_define('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD',"Liste des enchères");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD',"Tableau de bord de l'établissement");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS',"Listez vos enchères");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION',"Nouvelle enchère");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION',"Modifier l'enchère");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION',"Annuler l'enchère");
jr_define('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION',"Fin des enchères");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY',"Veuillez choisir l'établissement auquel vous souhaitez associer cette enchère.");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS',"Incluez-vous les chambres/l'établissement dans cette vente aux enchères ?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP',"Veuillez sélectionner les chambres que vous souhaitez inclure dans cette vente aux enchères. Commencez par choisir les dates de réservations, puis sélectionnez les chambres.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP',"Veuillez choisir les dates auxquelles vous souhaitez arrêter la participation de l'établissement participant à la vente aux enchères.");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_LINK',"Conditions Génarales de Vente (CGV)");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_TEXT',"Conditions Génarales de Vente (CGV)");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED',"Conditions Génarales de Vente détaillées (CGV)");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE',"Titre de l'enchère");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION',"Description");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE',"Valeur de l'enchère");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO',"Veuillez saisir la valeur de l'enchère proposée. Elle ne sera pas montrée aux acheteurs.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE',"Enchérir");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET',"Enchère non atteinte");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE',"Acheter maintenant");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN',"Combien de jours cette vente aux enchères devrait-elle durer ?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE',"Enchère (ne pas annuler) : ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE',"Notez que lorsque vous enchérissez, votre facture inclura une taxe supplémentaire de ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER',"En cliquant sur le bouton Enchérir ou Acheter maintenant, vous déclarer reconnaître établir un contrat en accord avec nos CGV et vous liant avec le vendeur pour l'achat. Ce site n'est pas responsable de l’objet de l'enchère et ne saurait se substituer au vendeur.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR',"Erreur ! Vous devez renseigner un titre.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR',"Erreur ! Vous devez renseigner une description.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS',"Enchères actives");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS',"Enchères terminées");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID',"Enchère la plus haute");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS',"Pas d'enchère");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT',"Temps restant");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID',"Faite votre enchère");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED',"Votre enchère a été prise en compte !");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST',"Vous avez fait l'enchère la plus haute !");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID',"Vous avez été surenchéri !");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON',"Félicitations, vous avez remporté cette enchère !");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST',"Désolé, vous avez perdu cette enchère !");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED',"L'enchère est terminée !");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN',"Désolé, vous ne pouvez pas enchérir, car vous n'êtes pas connecté.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED',"Désolé, vous ne pouvez pas enchérir, car cette enchère est terminée.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND',"Désolé, vous ne pouvez pas enchérir, car, nous ne trouvons pas cet ID d'enchère.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW',"Désolé, votre enchère était trop basse.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION',"Vous ne pouvez pas surenchérir sur votre propre enchère.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE',"YVous ne pouvez pas encore enchérir, car vous n’avez pas renseigné vos coordonnées. Veuillez cliquer sur le lien ci-dessus Modifier le compte pour renseigner les informations de votre compte.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN',"Désolé, vous ne pouvez pas annuler cette enchère, car vous n'êtes pas connecté.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID',"Désolé, vous ne pouvez pas annuler cette enchère, car elle a déjà été enchéri. Seules les enchères sans offre peuvent être annulées.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED',"Désolé, vous ne pouvez pas annuler cette enchère, car elle est terminée.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS',"Désolé, vous ne pouvez pas annuler cette enchère, car vous n'avez pas les droits d'accès à cette enchère.");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS',"j");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS',"h");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES',"m");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS',"s");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS',"Vos listes de veille");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_COUNT',"Nombre d'enchère dans la liste");
jr_define('_JOMRES_AUCTIONHOUSE_DEFAULTLIST',"Veille");
jr_define('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS',"Ajouter à votre liste de veille");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADD',"Ajouter une liste de veille");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME',"Renseigner le nom de votre liste de veille");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST',"Enregister votre nouvelle liste de veille");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST',"Enchère(s) ajoutée(s) à la liste de veille");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS',"Vous n'avez pas encore de liste de veille. Vous pouvez soit ajouter une enchère à votre liste de veille pour créer votre première liste, soit utiliser l'option Ajouter une liste de veille du menu pour ajouter manuellement une liste.");
jr_define('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST',"Erreur ! Cette liste de veille n'existe pas.");
jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO',"Cet établissement participe à notre programme de vente aux enchères et propose un ou plusieurs forfaits d'enchères. Veuillez consulter la liste ci-dessous.");
jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO',"Information à propos de ");
jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD',"Commision d'enchères");
jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE',"Enchère : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT',"Vous avez proposé une enchère pour : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY',"Vous avez proposé une enchère. Vous pouvez voir la vente aux enchères en visitant le lien suivant : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT',"Vous avez été surenchéri cette enchère : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY',"Vous avez été surenchéri. Vous pouvez voir la vente aux enchères en visitant le lien suivant : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT',"Vous avez remporté la vente aux enchères suivante : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY',"Vous avez remporté une enchère. Vous pouvez voir la vente aux enchères en visitant le lien suivant : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2',"Assurez-vous de payer le vendeur rapidement. Votre facture est ici : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT',"La vente aux enchères suivante est terminée : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY',"Cette enchère est terminée. Vous pouvez la voir ici : ");
jr_define('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE',"Enchère terminée ! Les coordonnées du gagnant sont les suivantes : ");
jr_define( '_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Afficher la page des vente aux enchères." );