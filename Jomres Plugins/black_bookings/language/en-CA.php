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

jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE',"Simple booking");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC',"Black bookings are bookings that occupy a room, rooms, or a property, but do not have any billing or invoice data. Typically they are used to indicate bookings that were made through another medium (e.g. telephone). You would create black bookings to ensure that those resources cannot then be booked online, either by the property manager or a guest.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM',"You must select at least one room.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED'," Sucessfully booked.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED',"  Could not be booked as it already has a booking during that timeframe.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY',"Room blocked by ");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP',"Use this calendar to easily black book resources. Choose a room or rooms, then click on the first and last dates of the black booking and the resources will be black booked. If the black booking is for just one date, then click that date twice.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP',"Use this calendar to easily black book resources. Click on the first and last dates of the black booking and the resources will be black booked. If the black booking is for just one date, then click that date twice.");

jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL',"Add all");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL',"Remove all");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED'," items selected");