<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 29/06/2019 - https://www.valtari
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Rappels de paiement");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Envoyez un mail de rappel de paiement ");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2'," jours après que la réservation provisoire (non confirmée) a été faite");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Ce plugin fonctionne automatiquement en arrière-plan et envoie un mail de rappel de paiement, dans un intervalle de votre choix, aux clients ayant fait des réservations provisoires qui ne sont pas marquées comme payées . Ceci est utile lorsque vous acceptez des réservations payées à l'aide de méthodes de paiement hors ligne (virement bancaire, chèque). Si une réservation n'est pas payée dans un délai de X jours à compter de la date de la réservation, un mail de rappel de paiement est envoyé au client. Vous en recevrez également une copie. Si vous utilisez également le plug-in Gestion provisoire des réservations, assurez-vous que l'intervalle auquel vous souhaitez envoyer le mail de rappel de paiement est au moins inférieur d'un jour à celui défini pour la suppression ou l'annulation de la réservation impayée.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Rappel de paiement pour votre réservation au ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Vous avez une réservation impayée au ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Afin de confirmer votre réservation, il est nécessaire de verser un acompte de  ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Numéro de réservation");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',"Veuillez nous contacter si vous souhaitez discuter des options de paiement. <br/><br/> Merci.");
