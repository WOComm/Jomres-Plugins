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

jr_define('_JRPORTAL_GMAPS_DD_YES',"Yes");
jr_define('_JRPORTAL_GMAPS_DD_NO',"No");
jr_define('_GOOGLE_ADDRESS',"Address");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"Postal code");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"Town");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Maximum number of 9 waypoints reached");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google couldn`t calculate directions for this route and selected options");
jr_define('_GOOGLE_DIRECTION_PRINT',"Print directions");
jr_define('_GOOGLE_ROUTEPLANNING',"Plan your route to ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Your location (route starting point)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Route options");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Optimize for");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Driving");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Walking");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Cycling");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Avoid highways");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Avoid tolls");
jr_define('_GOOGLE_SELECT_BUTTON',"Get directions");
jr_define('_GOOGLE_SELECT_RESETMAP',"Reset map");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Your destination (route end point) is already marked on the map. Please enter your location and choose your route options to get directions to the destination point. You can also click on the map to choose up to 9 waypoints from your starting point to the destination point.");