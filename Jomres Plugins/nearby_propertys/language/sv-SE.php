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


jr_define('_JRPORTAL_NEARBY_PROPERTYS_TITLE',"Närliggande egenskaper");
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_TITLE_FRONTEND', "Egenskaper i närheten");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_HRADIUS',"Radius ");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_HLISTLIMIT',"Maximalt antal närliggande fastigheter att visa ");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_HPTYPE_ENABLED',"Visa endast egenskaper med samma egenskapstyp som den aktuella egenskapen? ");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE'," vid ungefärlig ");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_KM',"km");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_MILES',"miles");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_INSTRUCTIONS',"Innan du använder detta plugin måste du se till att du har angett rätt latitud- och longitudkoordinater för alla egenskaper. Det är inte nödvändigt att aktivera Google Maps om du inte vill, utan skriv bara in koordinater eftersom de kommer att användas för att söka i närliggande fastigheter i din valda radie och beräkna avståndet från den aktuella egenskapen (egenskapen som för närvarande visas).");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY',"Inga andra fastigheter i närheten.");
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY2', "inom");