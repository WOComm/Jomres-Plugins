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


jr_define ('_JOMRES_DATAWIPE_TITLE', "Borrado de datos");
jr_define ('_JOMRES_DATAWIPE_DESC', "Esta función le permite eliminar los datos que se recopilan cuando se realizan las reservas. Está pensada para que la utilicen desarrolladores que hayan creado una gran cantidad de datos de desarrollo en sus instalaciones (como reservas de prueba, suscripciones) y quieran borre la información del sistema, mientras mantiene la propiedad y la información de tarifas. <br/> El complemento eliminará TODOS los registros cron, favoritos de los usuarios, notas, reservas, facturas, suscriptores, suscripciones, invitados, datos de auditoría, recuentos de clics y reseñas " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Estos datos solo se pueden recuperar de una copia de seguridad de su sistema, por lo que debe comprender que se trata de un script muy dañino. Como resultado, se recomienda que una vez que lo haya utilizado para su propósito de que lo desinstale de nuevo después. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Haga clic para borrar los datos");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Vaciado");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Vaciado con éxito.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "No se pudo vaciar la tabla.");