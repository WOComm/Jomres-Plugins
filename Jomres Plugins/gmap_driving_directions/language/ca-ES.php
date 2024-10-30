<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################
jr_define ('_JRPORTAL_GMAPS_DD_YES', "Sí");
jr_define('_JRPORTAL_GMAPS_DD_NO',"No");
jr_define('_GOOGLE_ADDRESS',"Adreça");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"Codi postal");
jr_define ('_GOOGLE_INPUT_FIELDSET_TOWN', "Ciutat");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Nombre màxim de 9 waypoints assolits");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google no ha pogut calcular les indicacions per a aquesta ruta i les opcions seleccionades");
jr_define('_GOOGLE_DIRECTION_PRINT',"Imprimeix indicacions");
jr_define('_GOOGLE_ROUTEPLANNING',"Planifica la teva ruta a ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"La teva ubicació (punt d'inici de la ruta)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Opcions de ruta");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Optimitza per a");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Conduint");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Caminant");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Ciclo");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Evita les autopistes");
jr_define ('_GOOGLE_ROUTEPLANNING_HTOLLS', "Eviteu els peatges");
jr_define('_GOOGLE_SELECT_BUTTON',"Obtén indicacions");
jr_define('_GOOGLE_SELECT_RESETMAP',"Restablir mapa");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"La vostra destinació (punt final de la ruta) ja està marcada al mapa. Introduïu la vostra ubicació i trieu les opcions de ruta per obtenir indicacions fins al punt de destinació. També podeu fer clic al mapa per triar-ne fins a 9 waypoints des del punt de partida fins al punt de destinació.");