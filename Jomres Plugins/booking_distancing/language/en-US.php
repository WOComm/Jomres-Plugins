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

jr_define('_JOMRES_QBLOCK_TITLE',"Booking distancing");
jr_define('_JOMRES_QBLOCK_SETTING',"Enable Booking distancing?");
jr_define('_JOMRES_QBLOCK_DESCRIPTION',"This setting allows you to enable booking distancing. When enabled, before and after every booking then a black booking is created for N days which gives you time to ensure that the property has been deep cleaned before the next guest arrives.");
jr_define('_JOMRES_QBLOCK_BLACKBOOKING_NOTE',"Booking distancing for booking id ");
jr_define('_JOMRES_QBLOCK_DAYS',"Number of days to block");
jr_define('_JOMRES_QBLOCK_DAYS_DESC',"How many days should the room/property be blocked for?");
