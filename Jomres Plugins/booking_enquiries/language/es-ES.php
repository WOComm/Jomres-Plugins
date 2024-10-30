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
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "Asunto del correo electrónico");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "Texto del correo electrónico (puede editar este texto para indicar el motivo del rechazo de esta reserva, ofrecer alternativas, etc.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Esta solicitud de reserva será rechazada y cancelada. El siguiente correo electrónico será enviado al cliente.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Esta solicitud de reserva no puede ser rechazada porque ya ha sido rechazada o aprobada.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "Texto del correo electrónico (puede editar este texto para completar las instrucciones de pago de esta reserva, etc.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Se aceptará esta consulta de reserva y se actualizará la disponibilidad en el calendario. Se enviará al cliente el siguiente correo electrónico.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Esta solicitud de reserva no puede ser aprobada porque ya ha sido rechazada o aprobada.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Correo electrónico de nueva consulta del administrador del sitio");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "Correo electrónico enviado al administrador del sitio en el momento de la reserva si la reserva requiere aprobación primero y la pasarela global de PayPal está habilitada");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Correo electrónico de nueva consulta del hotel");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "Correo electrónico enviado al hotel en el momento de la reserva si la reserva requiere aprobación primero");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Correo electrónico de nueva consulta de invitado");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "Correo electrónico enviado al huésped en el momento de la reserva si la reserva requiere aprobación primero");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "Correo electrónico de aprobación de consulta de invitado");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "Correo electrónico enviado manualmente al huésped por el administrador de la propiedad para confirmar la disponibilidad para una consulta");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "Correo electrónico de rechazo de consulta de invitado");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "Correo electrónico enviado manualmente al huésped por el administrador de la propiedad si la propiedad no está disponible para los detalles de la consulta");