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

jr_define ('_BYPASS_CONFIRMATION_TITLE', "Omitir página de reserva de reseñas");
jr_define ('_BYPASS_CONFIRMATION_DESC', "Cuando esto está habilitado, la página de reserva de reseñas ya no se mostrará y, en su lugar, los huéspedes serán llevados directamente al pago, o si no hay pasarelas habilitadas, la reserva se insertará directamente.");