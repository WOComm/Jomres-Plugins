<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Payment reminders");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Send payment reminder email..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..days after the provisional booking was made");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"This plugin runs automatically in the background and sends a payment reminder email to guests that that made provisional bookings which  are not marked as paid within an interval of your choice. This is useful when you accept bookings that are paid using offline payment methods (wire transfer, cheque). If a booking is not paid within X number of days from the time when the booking was made, then a payment reminder email is sent to the guest. You will also receive a copy of it. If you also use the Provisional Bookings Handling plugin, then make sure the interval at which you want to send the payment reminder email is at least 1 day lower than the one set for deleting or cancelling the unpaid booking.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Payment reminder for your booking at the ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"You have an unpaid booking at the ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"In order to secure your booking, it is necessary to make a deposit payment of ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Booking number");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Please contact us if you wish to discuss payment options.<br /><br />Thank you.");
