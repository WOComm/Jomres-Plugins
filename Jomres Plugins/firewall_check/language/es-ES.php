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

jr_define ('FIREWALL_CHECK', 'Comprobación de cortafuegos');
jr_define ('FIREWALL_CHECK_DESC', 'Este complemento es una simple verificación para ver si este servidor puede conectarse a servicios remotos. Si no puede, eso podría indicar que existen reglas de firewall que impiden que las dos máquinas se comuniquen entre sí. Si hay son, entonces es posible que deba discutir el ajuste de las reglas del firewall con los hosts de su servidor web. Las respuestas 404 y 403 pueden considerarse correctas porque está recibiendo una respuesta del servicio remoto. ');
jr_define ('FIREWALL_CHECK_REMOTE_SERVICE', 'Servicio remoto');
jr_define ('FIREWALL_CHECK_STATUSCODE', 'Código de estado');
jr_define ('FIREWALL_CHECK_IP_NUMBER', 'Número de IP');