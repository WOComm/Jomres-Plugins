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


jr_define ('JOMRES_COUPONS_SCAN', "¡Escanee este código en su teléfono y reserve ahora!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Obtén un descuento de");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "descuento del costo de su alojamiento");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "si reserva entre");
jr_define ('JOMRES_COUPONS_AND', "y");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "para fechas entre");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Alternativamente, ingrese este código de descuento al hacer su reserva:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Imprimir cupones");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Reserva válida desde');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Reserva válida para');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'Nombre de invitado');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Se pueden generar códigos de descuento y pasarlos a los huéspedes como incentivo para realizar reservas. <br/>
Las fechas válidas desde y hasta se refieren a las fechas en las que se puede realizar una reserva, mientras que las fechas de reserva válida desde / hasta se refieren a las fechas que la reserva debe cubrir para que el cupón sea válido. Si una reserva queda fuera de ese período, las tarifas normales se aplicarán a los días fuera de ese período. <br/>
Si desea que la reserva esté disponible para un huésped específico, elija el nombre de ese huésped en el menú desplegable para limitar el cupón a ese huésped solamente. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Los códigos de descuento creados aquí serán aplicables a todas las propiedades en el sitio web.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'Con su cupón, esta reserva se ha descontado de');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' a ');