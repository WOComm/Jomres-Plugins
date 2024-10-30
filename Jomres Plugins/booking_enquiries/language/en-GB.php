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

jr_define('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE',"Email subject");
jr_define('_JOMRES_BOOKING_REJECTION_HCONTENT',"Email text (you can edit this text to fill in a reason for rejecting this booking, offer alternatives, etc.)");
jr_define('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS',"This booking inquiry will be rejected and cancelled. The following email will be sent to the customer.");
jr_define('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE',"This booking inquiry can`t be rejected because it has already been rejected or approved.");
jr_define('_JOMRES_BOOKING_APPROVAL_HCONTENT',"Email text (you can edit this text to fill in payment instructions for this booking, etc.)");
jr_define('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS',"This booking inquiry will be accepted and availability will be updated in the calendar. The following email will be sent to the customer.");
jr_define('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE',"This booking inquiry can`t be approved because it has already been rejected or approved.");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME',"Site Admin New Enquiry Email");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC',"Email sent to site admin at booking time if the booking requires approval first and global paypal gateway is enabled");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME',"Hotel New Enquiry Email");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC',"Email sent to hotel at booking time if the booking requires approval first");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME',"Guest New Enquiry Email");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC',"Email sent to guest at booking time if the booking requires approval first");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME',"Guest Enquiry Approval Email");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC',"Email manually sent to guest by the property manager to confirm availability for an enquiry");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME',"Guest Enquiry Rejection Email");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC',"Email manually sent to guest by the property manager if the property is not available for the enquiry details");
