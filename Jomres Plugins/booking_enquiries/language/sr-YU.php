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

jr_define('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE',"Naslov e-maila");
jr_define('_JOMRES_BOOKING_REJECTION_HCONTENT',"Email text (you can edit this text to fill in a reason for rejecting this booking, offer alternatives, etc.)");
jr_define('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS',"This booking inquiry will be rejected and cancelled. The following email will be sent to the customer.");
jr_define('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE',"This booking inquiry can`t be rejected because it has already been rejected or approved.");
jr_define('_JOMRES_BOOKING_APPROVAL_HCONTENT',"Email text (you can edit this text to fill in payment instructions for this booking, etc.)");
jr_define('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS',"This booking inquiry will be accepted and availability will be updated in the calendar. The following email will be sent to the customer.");
jr_define('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE',"This booking inquiry can`t be approved because it has already been rejected or approved.");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME',"E-mail poslat administratoru sajta za novi upit");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC',"E-mail se šalje administratoru sajta u vreme rezervacije ako rezervacija prvo zahteva odobrenje i kada je  globalni paypall gateaway aktiviran i omogućen");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME',"E-mail Novi upit za hotel");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC',"E-mail poslat hotelu u vreme rezervacije ako rezervacija prvo zahteva odobrenje");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME',"E-mail novi upit gosta");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC',"E-mail se šalje gostu u vreme rezervacije ako rezervacija prvo zahteva odobrenje");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME',"E-mail za odobrenje upita gostiju");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC',"E-mail koji je menadžer objekta ručno poslao gostu da potvrdi dostupnost za upit");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME',"E-mail o odbijanju upita gosta");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC',"E-mail je ručno poslat gostu od strane menadžera/vlasnika objekta ako objekat nije dostupan za detalje upita, odnosno ako objekat nije dostupan za rezervacije");