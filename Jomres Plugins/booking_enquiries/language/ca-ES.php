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
jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "Assumpte del correu electrònic");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "Text per correu electrònic (podeu editar aquest text per omplir el motiu pel qual es rebutja aquesta reserva, oferir alternatives, etc.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Aquesta consulta de reserva serà rebutjada i cancel·lada. El següent correu electrònic s'enviarà al client.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Aquesta consulta de reserva no pot ser rebutjada perquè ja ha estat rebutjada o aprovada.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "Text per correu electrònic (podeu editar aquest text per emplenar les instruccions de pagament d'aquesta reserva, etc.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "S'acceptarà aquesta consulta de reserva i s'actualitzarà la disponibilitat al calendari. El següent correu electrònic s'enviarà al client.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Aquesta consulta de reserva no es pot aprovar perquè ja ha estat rebutjada o aprovada.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Correu electrònic de nova consulta de l'administrador del lloc");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "Correu electrònic enviat a l'administrador del lloc en el moment de la reserva si la reserva requereix l'aprovació primer i la passarel·la global de paypal està habilitada");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Correu electrònic de consulta de l'hotel");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "Correu electrònic enviat a l'hotel en el moment de fer la reserva si la reserva necessita primer l'aprovació");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Correu electrònic de nova consulta del convidat");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "Correu electrònic enviat al client en el moment de fer la reserva si la reserva necessita primer l'aprovació");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "Correu electrònic d'aprovació de la consulta de convidats");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "El correu electrònic enviat manualment al client pel gestor de la propietat per confirmar la disponibilitat d'una consulta");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "Correu electrònic de rebuig de la consulta de convidats");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "El correu electrònic enviat manualment al client pel gestor de la propietat si la propietat no està disponible per obtenir els detalls de la consulta");