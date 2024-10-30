<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 21/06/2019 - https://www.valtari.fr
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE',"Sujet du mail");
jr_define('_JOMRES_BOOKING_REJECTION_HCONTENT',"Texte du mail (vous pouvez modifier ce texte pour indiquer le motif du refus de cette réservation, des offres supplémentaires, des activités,etc.)");
jr_define('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS',"Cette demande de réservation sera rejetée et annulée. Le mail suivant sera envoyé au client.");
jr_define('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE',"Cette demande de réservation ne peut être rejetée, car elle a déjà été rejetée ou approuvée.");
jr_define('_JOMRES_BOOKING_APPROVAL_HCONTENT',"Texte du mail (vous pouvez modifier ce texte pour compléter les instructions de paiement pour cette réservation, donner des instructions d'arrivé, etc.)");
jr_define('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS',"Cette demande de réservation sera acceptée et la disponibilité sera mise à jour dans le calendrier. Le mail suivant sera envoyé au client.");
jr_define('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE',"Cette demande de réservation ne peut pas être approuvée, car elle a déjà été rejetée ou approuvée.");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME',"Mail de demande d'approbation de réservation à l'administration du site");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC',"Un mail sera envoyé à l’administrateur du site au moment de la réservation, si la réservation nécessite l’approbation préalable et que PayPal est activée");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME',"Mail de demande d'approbation de réservation à l'établissement");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC',"Un mail sera envoyé à l'établissement au moment de la réservation, si la réservation nécessite l'approbation.");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME',"Mail de demande d'approbation de réservation au client");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC',"Un mail sera envoyé au client au moment de la réservation, si la réservation nécessite l'approbation");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME',"Mail de confirmation de demande de réservation au client");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC',"Un mail sera envoyé manuellement au client par le gestionnaire d'établissement pour confirmer la disponibilité à la demande de réservation.");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME',"Mai de rejet de demande de réservation au client");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC',"Un mail sera envoyé manuellement au client par le gestionnaire d'établissement, si l'établissement n'est pas disponible à la demande de réservation.");
