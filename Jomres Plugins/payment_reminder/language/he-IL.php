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
jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"תזכורות תשלום");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"שלח אימייל תזכורת לתשלום..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..ימים לאחר ביצוע ההזמנה הזמנית");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS', "תוסף זה פועל אוטומטית ברקע ושולח הודעת תזכורת לתשלום לאורחים שביצעו הזמנות זמניות אשר אינן מסומנות כתשלום בתוך מרווח לבחירתכם. הדבר שימושי כאשר אתם מקבלים הזמנות בתשלום. באמצעות אמצעי תשלום לא מקוונים (העברה בנקאית, צ'ק). אם ההזמנה לא שולמה תוך X מספר ימים מרגע ביצוע ההזמנה, נשלח לאורח הודעת תזכורת לתשלום. תקבל גם עותק ממנה. . אם אתה משתמש גם בפלאגין הזמנת טיפול הזמנות, וודא שהמרווח שבו ברצונך לשלוח את הודעת תזכורת התשלום נמוך לפחות ביום אחד מזה שנקבע למחיקה או ביטול של ההזמנה שלא שולמה. ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE', "תזכורת תשלום עבור ההזמנה שלך ב-");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"יש לך הזמנה ללא תשלום ב");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"על מנת להבטיח את הזמנתך, יש צורך לבצע תשלום פיקדון בסך ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"מספר הזמנה");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3', ". צור איתנו קשר אם ברצונך לדון באפשרויות התשלום. <br /> <br /> תודה.");