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
jr_define('_JRPORTAL_GMAPS_DD_YES',"Igen");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Nem");
jr_define('_GOOGLE_ADDRESS',"Cím");
jr_define ('_GOOGLE_INPUT_FIELDSET_POSTALCODE', "Irányítószám");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"Város");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Maximum 9 útpont elérve");
jr_define ('_GOOGLE_INITIALIZE_ERROR2', "A Google nem tudta kiszámítani az útvonaltervet ehhez az útvonalhoz és a kiválasztott lehetőségekhez");
jr_define('_GOOGLE_DIRECTION_PRINT',"Útvonalterv nyomtatása");
jr_define ('_GOOGLE_ROUTEPLANNING', "Tervezd meg az útvonalat");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Az Ön tartózkodási helye (útvonal kezdőpontja)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Útvonalbeállítások");
jr_define ('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR', "Optimalizálás");
jr_define ('_GOOGLE_ROUTEPLANNING_HDRIVING', "Vezetés");
jr_define ('_GOOGLE_ROUTEPLANNING_HWALKING', "Séta");
jr_define ('_GOOGLE_ROUTEPLANNING_HCYCLING', "Kerékpározás");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS' , "Kerülje el az autópályákat");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Kerülje el az útdíjakat");
jr_define('_GOOGLE_SELECT_BUTTON',"Útvonalterv");
jr_define('_GOOGLE_SELECT_RESETMAP',"Térkép visszaállítása");
jr_define ('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS', "Az úticél (az útvonal végpontja) már meg van jelölve a térképen. Kérjük, adja meg tartózkodási helyét, és válassza ki az útvonalat, hogy útvonaltervet kapjon a célponthoz. A térképre kattintva akár 9 -et is választhat útpontok a kiindulási ponttól a célpontig.");