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


jr_define ('_JRPORTAL_GMAPS_DD_YES', "Sí");
jr_define ('_JRPORTAL_GMAPS_DD_NO', "No");
jr_define ('_GOOGLE_ADDRESS', "Dirección");
jr_define ('_GOOGLE_INPUT_FIELDSET_POSTALCODE', "Código postal");
jr_define ('_GOOGLE_INPUT_FIELDSET_TOWN', "Ciudad");
jr_define ('_GOOGLE_INITIALIZE_ERROR1', "Número máximo de 9 waypoints alcanzado");
jr_define ('_GOOGLE_INITIALIZE_ERROR2', "Google no pudo calcular las direcciones para esta ruta y las opciones seleccionadas");
jr_define ('_GOOGLE_DIRECTION_PRINT', "Imprimir direcciones");
jr_define ('_GOOGLE_ROUTEPLANNING', "Planifique su ruta hacia");
jr_define ('_GOOGLE_ROUTEPLANNING_HYOURLOCATION', "Su ubicación (punto de partida de la ruta)");
jr_define ('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS', "Opciones de ruta");
jr_define ('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR', "Optimizar para");
jr_define ('_GOOGLE_ROUTEPLANNING_HDRIVING', "Conducir");
jr_define ('_GOOGLE_ROUTEPLANNING_HWALKING', "Caminar");
jr_define ('_GOOGLE_ROUTEPLANNING_HCYCLING', "Ciclismo");
jr_define ('_GOOGLE_ROUTEPLANNING_HHIGHWAYS', "Evite las carreteras");
jr_define ('_GOOGLE_ROUTEPLANNING_HTOLLS', "Evitar peajes");
jr_define ('_GOOGLE_SELECT_BUTTON', "Obtener direcciones");
jr_define ('_GOOGLE_SELECT_RESETMAP', "Restablecer mapa");
jr_define ('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS', "Su destino (punto final de la ruta) ya está marcado en el mapa. Ingrese su ubicación y elija las opciones de ruta para obtener direcciones al punto de destino. También puede hacer clic en el mapa para elegir hasta 9 waypoints desde su punto de partida hasta el punto de destino. ");