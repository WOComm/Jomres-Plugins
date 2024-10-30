<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JOMRES_QBLOCK_TITLE',"Booking distancing");
jr_define('_JOMRES_QBLOCK_SETTING',"Enable Booking distancing?");
jr_define('_JOMRES_QBLOCK_DESCRIPTION',"This setting allows you to enable booking distancing. When enabled, before and after every booking then a black booking is created for N days which gives you time to ensure that the property has been deep cleaned before the next guest arrives.");
jr_define('_JOMRES_QBLOCK_BLACKBOOKING_NOTE',"Booking distancing for booking id ");
jr_define('_JOMRES_QBLOCK_DAYS',"Number of days to block");
jr_define('_JOMRES_QBLOCK_DAYS_DESC',"How many days should the room/property be blocked for?");
