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

jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "E -pasta tēma");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "E -pasta teksts (varat rediģēt šo tekstu, lai norādītu iemeslu šīs rezervācijas noraidīšanai, piedāvāt alternatīvas utt.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Šis rezervācijas pieprasījums tiks noraidīts un atcelts. Klientam tiks nosūtīts šāds e -pasts.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Šo rezervācijas pieprasījumu nevar noraidīt, jo tas jau ir noraidīts vai apstiprināts.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "E -pasta teksts (varat rediģēt šo tekstu, lai aizpildītu maksājuma norādījumus par šo rezervāciju utt.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Šis rezervācijas pieprasījums tiks pieņemts un pieejamība tiks atjaunināta kalendārā. Klientam tiks nosūtīts šāds e -pasts.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Šo rezervācijas pieprasījumu nevar apstiprināt, jo tas jau ir noraidīts vai apstiprināts.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Vietnes administratora jauns pieprasījuma e -pasts");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "Rezervācijas laikā vietnes administratoram tika nosūtīts e -pasts, ja vispirms ir nepieciešama apstiprināšana un ir iespējota globālā paypal vārteja");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Viesnīcas jaunā pieprasījuma e -pasts");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "Rezervācijas laikā viesnīcai tika nosūtīts e -pasts, ja rezervācija vispirms ir jāapstiprina");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Viesa jaunā pieprasījuma e -pasts");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "Rezervēšanas laikā viesim nosūtīts e -pasts, ja rezervācija vispirms ir jāapstiprina");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "Viesu pieprasījumu apstiprināšanas e -pasts");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "Īpašuma pārvaldnieks manuāli nosūtīja e -pastu viesim, lai apstiprinātu pieejamību pieprasījumam");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "Viesu pieprasījuma noraidīšanas e -pasts");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "Īpašuma pārvaldnieks manuāli nosūtīja e -pastu viesim, ja īpašums nav pieejams informācijas pieprasīšanai");