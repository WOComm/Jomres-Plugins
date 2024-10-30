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
jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"טיפול בהזמנות ללא תשלום");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"לבטל או למחוק את ההזמנות הזמניות (שלא שולמו)? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"אלפר כמה ימים מזמן ההזמנה? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"תוסף זה פועל אוטומטית ברקע ומוחק או מבטל את כל ההזמנות הזמניות שאינן מסומנות כבתשלום בפרק זמן לבחירתך. זה שימושי כאשר אתה מקבל הזמנות המשולמות באמצעות אמצעי תשלום לא מקוונים (חוט) העברה, המחאה). אם הזמנה לא שולמה תוך X מספר ימים ממועד ביצוע ההזמנה, ההזמנה נמחקת או מבוטלת והלוח השנה יציג את התאריכים שהוזמנו כפנויים, כך שמישהו אחר יוכל להזמין את הימים הללו. כאשר הזמנה נמחקת או מבוטלת, גם אתה וגם האורח תקבלו הודעה בדוא\"ל. אם תבחר לבטל הזמנה, אזי ההזמנה והחשבונית שלה יסומנו כמבוטלות ולא יימחקו ממאגר המידע , כדי שתוכל לגשת אליהם מאוחר יותר. אם תבחר למחוק אותו, ההזמנה והחשבונית שלה יימחקו מהמאגר.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"ההזמנה בוטלה");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"ההזמנה שלך בוטלה אוטומטית עקב אי תשלום הפיקדון הנדרש. זו כבר לא הזמנה תקפה. אם ברצונך להזמין שוב, בקר באתר האינטרנט שלנו וחזור על ההזמנה. להלן פרטי הזמנה שבוטלו.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"אם אתה מרגיש שקיבלת הודעה זו בטעות, אנא אל תהסס לפנות אלינו.");