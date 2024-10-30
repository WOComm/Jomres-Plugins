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

jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "נושא הדוא\"ל");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "טקסט בדוא\"ל (תוכל לערוך טקסט זה כדי למלא סיבה לדחיית ההזמנה, להציע חלופות וכו ')");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "בקשת הזמנה זו תידחה ותבטל. הודעת הדוא\"ל הבאה תישלח ללקוח.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "לא ניתן לדחות את שאלת ההזמנה הזו מכיוון שהיא כבר נדחתה או אושרה.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "טקסט בדוא\"ל (תוכל לערוך טקסט זה כדי למלא הוראות תשלום עבור הזמנה זו וכו ')");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "שאלת הזמנה זו תתקבל והזמינות תתעדכן בלוח השנה. הודעת הדוא\"ל הבאה תישלח ללקוח.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "לא ניתן לאשר את שאלת ההזמנה הזו מכיוון שהיא כבר נדחתה או אושרה.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "כתובת אימייל חדשה לשאילתת האתר של מנהל האתר");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "דואר אלקטרוני נשלח למנהל האתר בזמן ההזמנה אם ההזמנה דורשת אישור ראשון ושער PayPal גלובאלי מופעל");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "כתובת אימייל חדשה בנושא מלונות");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "דוא\"ל נשלח למלון בזמן ההזמנה אם ההזמנה טעונה אישור קודם");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "כתובת דוא\"ל חדשה לשאילת אורחים");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "דוא\"ל נשלח לאורח בזמן ההזמנה אם ההזמנה טעונה אישור קודם");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "דוא\"ל אישור שאלת אורחים");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "דוא\"ל נשלח באופן ידני לאורח על ידי מנהל הנכס כדי לאשר זמינות לבירור");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "אימייל לדחיית פניות אורחים");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "אימייל נשלח באופן ידני לאורח על ידי מנהל הנכס אם הנכס אינו זמין לפרטי החקירה");