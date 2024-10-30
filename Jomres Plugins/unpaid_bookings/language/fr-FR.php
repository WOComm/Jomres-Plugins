<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 01/07/2019 - https://www.valtari
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Gestion des réservations impayées");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Annuler ou supprimer les réservations provisoires ou non confirmées (non payées) ? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Après combien de jours à partir de la réservation ?");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Ce plugin s'exécute automatiquement en arrière-plan et supprime ou annule toutes les réservations provisoires non confirmées et qui ne sont pas marquées comme payées dans un intervalle de votre choix. Ceci est utile lorsque vous acceptez des réservations payées à l'aide de méthodes de paiement hors ligne (virement bancaire, chèque). Si une réservation n'est pas payée dans un délai de X jours à compter du moment où la réservation a été effectuée, la réservation est supprimée ou annulée et le calendrier affiche les dates réservées comme étant disponibles, afin que quelqu'un d'autre puisse réserver à ces dates. Lorsqu'une réservation est supprimée ou annulée, vous et votre client recevez une notification par mail. Si vous choisissez d’annuler une réservation, celle-ci et sa facture seront marquées comme annulées et ne seront pas supprimées de la base de données afin que vous puissiez y accéder ultérieurement. Si vous choisissez de les supprimer, la réservation et sa facture seront supprimées de la base de données.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Réservation annulée");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Bonjour ! Votre réservation a été automatiquement annulée en raison du non-paiement. Ce n'est plus une réservation valide. Si vous souhaitez réserver de nouveau, veuillez vous rendre sur notre site et refaire la réservation. Voici les détails de la réservation annulée.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Si vous pensez que vous avez reçu cette notification par erreur, n’hésitez pas à nous contacter.");
