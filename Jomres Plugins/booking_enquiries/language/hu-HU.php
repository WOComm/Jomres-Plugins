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
jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "E -mail tárgya");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "E -mail szövege (szerkesztheti ezt a szöveget, hogy megadja a foglalás elutasításának okát, alternatívákat kínálhat stb.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Ezt a foglalási kérelmet elutasítjuk és töröljük. A következő e -mailt küldjük az ügyfélnek.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Ezt a foglalási lekérdezést nem lehet elutasítani, mert azt már elutasították vagy jóváhagyták.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "E -mail szövege (szerkesztheti ezt a szöveget, hogy kitöltse a foglalás fizetési utasításait stb.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Ezt a foglalási kérelmet elfogadjuk, és a rendelkezésre állást frissítjük a naptárban. A következő e -mailt küldjük az ügyfélnek.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Ezt a foglalási lekérdezést nem lehet jóváhagyni, mert azt már elutasították vagy jóváhagyták.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Webhely adminisztrátorának új kérdőíve");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "E -mailt küldtünk a rendszergazdának a foglalás időpontjában, ha a foglalás először jóváhagyást igényel, és a globális paypal -átjáró engedélyezve van");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Hotel New Inquiry Email");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "E -mailt küldtünk a szállodának a foglaláskor, ha a foglaláshoz először jóváhagyás szükséges");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Vendég új kérdőíve");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "E -mailt küldtünk a vendégnek a foglaláskor, ha a foglaláshoz először jóváhagyásra van szükség");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "Guest Inquiry Approval Email");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "Az ingatlankezelő manuálisan küldött e -mailt a vendégnek, hogy megerősítse a rendelkezésre állás kérdését");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "Guest Inquiry Rejection Email");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "Az ingatlankezelő manuálisan küldött e -mailt a vendégnek, ha az ingatlan nem áll rendelkezésre a lekérdezés részleteihez");