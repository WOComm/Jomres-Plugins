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


jr_define('_CLONE_TARIFFS_TITLE',"Clonar Tarifas");
jr_define('_CLONE_TARIFFS_INFO',"Aquí puede clonar una tarifa de una propiedad de destino a una propiedad de origen. Solo estarán disponibles para usted las propiedades que tiene autoridad para administrar.");
jr_define('_CLONE_TARIFFS_SOURCE',"Propiedad de origen");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tarifa para clonar");
jr_define('_CLONE_TARIFFS_TARGET',"Propiedad de destino");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Tipo de habitación de la propiedad de destino");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Si el modo de edición de tarifas de la propiedad de destino es diferente del modo de edición de tarifas de la propiedad de origen, cuando se realice la clonación, las tarifas originales de la propiedad de destino se eliminarán y su modo de edición de tarifas cambiará para reflejar el modo de edición de tarifas de la propiedad de origen configuración de la propiedad.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"¿Eliminar las tarifas existentes en la propiedad Target?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Si el modo de edición de tarifas de la propiedad Target es el mismo que el de la propiedad Source, entonces las tarifas existentes no se eliminarán. Sin embargo, puede optar por anular esto configurando esta opción en Sí.");