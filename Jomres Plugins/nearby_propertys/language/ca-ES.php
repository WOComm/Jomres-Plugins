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
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_TITLE', "Propietats properes");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_TITLE_FRONTEND',"Propietats properes");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_HRADIUS',"Radi");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_HLISTLIMIT',"Nombre màxim de propietats properes per mostrar");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_HPTYPE_ENABLED',"Mostra només propietats amb el mateix tipus de propietat que la propietat visualitzada actualment? ");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE'," aproximat ");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_KM',"km");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_MILES',"milles");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_INSTRUCTIONS',"Abans d'utilitzar aquest connector, heu d'assegurar-vos que heu introduït les coordenades de latitud i longitud correctes per a totes les propietats. No és necessari habilitar Google Maps si no ho voleu, però només heu d'introduir el coordenades perquè s'utilitzaran per cercar propietats properes al radi escollit i calcular la distància des de la propietat actual (la propietat que es visualitza actualment).");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY',"No hi ha cap altra propietat a prop.");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY2'," dins de ");