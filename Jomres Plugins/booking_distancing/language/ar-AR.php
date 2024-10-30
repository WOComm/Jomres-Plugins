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


jr_define ('_JOMRES_QBLOCK_TITLE', "Distancia de reserva");
jr_define ('_JOMRES_QBLOCK_SETTING', "¿Habilitar distanciamiento de reserva?");
jr_define ('_JOMRES_QBLOCK_DESCRIPTION', "Esta configuración le permite habilitar el distanciamiento de la reserva. Cuando está habilitado, antes y después de cada reserva, se crea una reserva negra para N días, lo que le da tiempo para asegurarse de que la propiedad se haya limpiado en profundidad antes del próximo huésped llega. ");
jr_define ('_JOMRES_QBLOCK_BLACKBOOKING_NOTE', "Distancia de reserva para id de reserva");
jr_define ('_JOMRES_QBLOCK_DAYS', "Número de días para bloquear");
jr_define ('_JOMRES_QBLOCK_DAYS_DESC', "¿Por cuántos días se debe bloquear la habitación / propiedad?");