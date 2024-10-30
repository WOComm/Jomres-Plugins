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


jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Unpaid bookings handling");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Cancel or delete the provisional (unpaid) bookings? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Alfer how many days from booking time? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"This plugin runs automatically in the background and deletes or cancells all provisional bookings that are not marked as paid within an interval of your choice. This is useful when you accept bookings that are paid using offline payment methods (wire transfer, cheque). If a booking is not paid within X number of days from the time when the booking was made, then the booking is deleted or cancelled and the calendar will show the booked dates as available, so somebody else can book those days. When a booking is deleted or cancelled, both you and the guest will receive a notification by email. If you choose to cancel a booking, then the booking and it`s invoice will be marked as cancelled and will not be deleted from the database, so you can access them later. If you choose to delete it, then the booking and it`s invoice will be deleted from the database.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Booking cancelled");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Your booking has been automatically cancelled due to unpayment of the required deposit. This is no longer a valid booking. If you`d like to book again, please visit our website and redo the booking. Following are the cancelled booking details.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"If you feel you received this notification by mistake, please don`t hesitate to contact us.");
