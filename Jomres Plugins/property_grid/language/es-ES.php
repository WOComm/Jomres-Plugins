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

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID', "Cuadrícula de propiedades. Muestra una fila de propiedades, ideal para una página de destino." );

	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS', "Utilice property_uids o property_cols. property_uids acepta una lista separada por comas de los uid de propiedad que desea mostrar. Se puede mostrar un máximo de 6 propiedades");
	jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS', "Alternativamente, elija un número de columnas para mostrar entre 1 y 6. Se seleccionarán propiedades aleatorias de la base de datos que se mostrarán." );