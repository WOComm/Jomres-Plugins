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

jr_define ('JOMRES_COUPONS_SCAN', "סרוק את הקוד הזה לטלפון שלך והזמין עכשיו!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "קבל הנחה של");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "הנחה על עלות האירוח שלך");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "אם אתה מזמין בין");
jr_define ('JOMRES_COUPONS_AND', "ו-");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "לתאריכים בין");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "לחלופין, הזן קוד הנחה זה בעת ביצוע ההזמנה:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "הדפס קופונים");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'ההזמנה תקפה מ');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Booking valid to');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'שם אורח');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "ניתן ליצור קודי הנחה ולהעביר אותם לאורחים כתמריץ לביצוע הזמנות. <br/>
תוקף החל מתאריכים ומתאריך מתייחס לתאריכים בהם ניתן לבצע הזמנה, ואילו ההזמנה בתוקף מה/עד תאריכים מתייחסת לתאריכים שההזמנה חייבת לכסות כדי שהקופון יהיה תקף. אם הזמנה נופלת מחוץ לתקופה זו, תעריפים רגילים יחולו על הימים מחוץ לתקופה זו. <br/>
אם אתה רוצה שההזמנה תהיה זמינה לאורח ספציפי אחד, בחר את שם האורח הנפתח כדי להגביל את הקופון לאורח זה בלבד. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "קודי הנחה שנוצרו כאן יחולו על כל הנכסים באתר.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'עם הקופון שלך, ההזמנה הזו הופחתה מ');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' to ');