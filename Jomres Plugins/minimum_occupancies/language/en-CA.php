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


jr_define('_OCCUPANCIES_TITLE',"Minimum Occupancies");

jr_define('_OCCUPANCIES_DESCRIPTION',"You can set the minimum occupancy levels for specific room types, if you want to ensure that the guest has selected a certain number of guest types in the booking form before the appropriate room and tariff combination are shown.");
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Here you can create a minimum occupancy level for each room type. A room/tariff combination will not be offered if the guest hasn't selected the appropriate number of guest types. For each room type please select the number of guests of a given type that there should be a minimum in the booking form before the room type is offered. If you don't care what the occupancy level for a room type should be, leave that room type's guest number set to 0 (zero). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Guest type number");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"You don't have any guest types created yet. Please create some guest types before you use this feature.");

jr_define('_OCCUPANCIES_EDIT',"Edit minimum occupancy for ");