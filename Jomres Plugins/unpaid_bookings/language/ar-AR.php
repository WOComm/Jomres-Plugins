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


jr_define ('_JRPORTAL_UNPAID_BOOKINGS_TITLE', "Gestión de reservas impagas");
jr_define ('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL', "¿Cancelar o eliminar las reservas provisionales (no pagadas)?");
jr_define ('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE', "¿Cuántos días después de la reserva?");
jr_define ('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS', "Este complemento se ejecuta automáticamente en segundo plano y elimina o cancela todas las reservas provisionales que no están marcadas como pagadas dentro de un intervalo de su elección. Esto es útil cuando acepta reservas que se pagan con métodos de pago fuera de línea (transferencia transferencia, cheque). Si una reserva no se paga dentro de X días desde el momento en que se realizó la reserva, entonces la reserva se borra o cancela y el calendario mostrará las fechas reservadas como disponibles, para que otra persona pueda reservar esos días .Cuando se elimina o cancela una reserva, tanto usted como el huésped recibirán una notificación por correo electrónico. Si elige cancelar una reserva, la reserva y su factura se marcarán como canceladas y no se eliminarán de la base de datos. , para que pueda acceder a ellos más tarde. Si elige eliminarlo, la reserva y su factura se eliminarán de la base de datos. ");
jr_define ('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE', "Reserva cancelada");
jr_define ('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1', "Su reserva ha sido cancelada automáticamente debido al impago del depósito requerido. Esta ya no es una reserva válida. Si desea reservar de nuevo, visite nuestro sitio web y vuelva a realizar la reserva. A continuación se muestran los detalles de la reserva cancelada. ");
jr_define ('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2', "Si cree que recibió esta notificación por error, no dude en ponerse en contacto con nosotros");