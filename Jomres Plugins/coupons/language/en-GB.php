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

jr_define('JOMRES_COUPONS_SCAN',"Scan this code into your phone and book now!");
jr_define('JOMRES_COUPONS_GETADISCOUNT',"Get a discount of");
jr_define('JOMRES_COUPONS_PERCENT',"%");
jr_define('JOMRES_COUPONS_OFFACCOMMODATION'," off the cost of your accommodation");
jr_define('JOMRES_COUPONS_IFYOUBOOKBETWEEN',"if you book between");
jr_define('JOMRES_COUPONS_AND'," and ");
jr_define('JOMRES_COUPONS_FORDATESBETWEEN'," for dates between ");
jr_define('JOMRES_COUPONS_ALTERNATIVELY',"Alternatively, enter this discount code when making your booking : ");
jr_define('JOMRES_COUPONS_PRINT_COUPONS',"Print Coupons");

jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Booking valid from');
jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Booking valid to');
jr_define('_JRPORTAL_COUPONS_GUESTNAME', 'Guest name');
jr_define('_JRPORTAL_COUPONS_DESC_478', "Discount codes can be generated and passed onto guests as an incentive to make bookings.<br/>
Valid from and to dates refer to the dates that a booking can be made on, whereas the Booking valid from/to dates refer to the dates that the booking must cover for the coupon to be valid. If a booking falls outside of that period then normal rates will apply to the days outside of that period.<br/>
If you want the booking to be available to one specific guest, choose that guest's name in the dropdown to limit the coupon to that guest only.");
jr_define('_JRPORTAL_COUPONS_DESC_ADMIN', "Discount codes created here will be applicable to all properties on the website.");
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'With your coupon, this booking has been discounted from ');
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' to ');