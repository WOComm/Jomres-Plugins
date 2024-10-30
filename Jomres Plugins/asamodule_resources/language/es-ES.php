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

jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES', "Muestra las habitaciones / recursos de una propiedad en un widget / módulo ASAModule. Útil para sitios web de propiedades individuales.");

jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "Obligatorio. El uid de propiedad para el que desea mostrar los recursos.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "Obligatorio. Los identificadores de los recursos (por ejemplo, salas) que desea mostrar. Lista de identificadores separados por comas.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE', "Opcional. Establezca la fecha de llegada en el formato que corresponda con Configuración del sitio> pestaña Calendario> Configuración de formato de entrada de calendario. Por ejemplo, 01/02/2018. Esto le permite mostrar precios de habitaciones específicas en fechas específicas en el futuro, asumiendo que tiene tarifas establecidas que cubren esas fechas. ");
