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

jr_define( '_JOMRES_ICAL_EVENT', 'iCal Event' );
jr_define( '_JOMRES_ICAL_FEED', 'iCal Feed' );
jr_define ('_JOMRES_ICAL_FEED_LINK', 'URL iCal Feed');
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s');
jr_define ('_JOMRES_ICAL_FEEDS_DESC', 'עדכוני iCal שלך יכולים להציג הזמנות עתידיות בלוח שנה מרוחק כולל המכשיר הנייד שלך, יומן Google, לוח השנה של Apple, Thunderbird, Outlook ועוד. השתמש בכתובות האתרים הבאות כדי להירשם כמנוי להזנות ב- תוכנת לוח השנה שלך.' );
jr_define( '_JOMRES_ICAL_ANON', 'כתובת אתר אנונימית של עדכון iCal' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'לאפשר גישה אנונימית לעדכון/ים של iCal?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'אם אפשרות זו מופעלת עדכון אירועי iCal שלך יהיה זמין לכולם, אך ללא פרטי הזמנה או אורח.' );
jr_define ('_JOMRES_ICAL_IMPORT', 'iCal יבוא');
jr_define( '_JOMRES_ICAL_SELECT', 'בחר קובץ לייבוא' );
jr_define ('_JOMRES_ICAL_NO_FILE_UPLOADED', 'שגיאה, לא הועלה קובץ.');
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "בעת ייבוא ​​קובץ iCal, תאריך הסיום של האירוע צריך להיות תאריך היציאה של האורח. הסיכום צריך להיות שם האורח. תיאור האירוע יכול להכיל את כל שאר הפרטים." );

jr_define ('_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'מספר ההזמנה הזה כבר קיים במערכת.');
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'אין חדרים זמינים בתאריכים שנבחרו.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'לא נמצאו אירועים בקובץ ה-ics.' );
jr_define ('_JOMRES_ICAL_SUCCESS', 'אירוע מיובא בהצלחה');
jr_define( '_JOMRES_ICAL_FAILURE', 'לא ניתן לייבא את האירוע' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'שם אורח' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'תיאור אירוע' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'התחל' );
jr_define ('_JOMRES_ICAL_RESULT_HEADER_END', 'סוף');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'תוצאה' );
jr_define( '_JOMRES_ICAL_WITHHELD', 'Withheld');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'העדכון/ים של iCal שלך יכולים להציג הזמנות עתידיות בלוח שנה מרוחק כולל המכשיר הנייד שלך, יומן Google, יומן אפל, Thunderbird, Outlook ועוד.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'תכונה זו מאפשרת לך לסנכרן הזמנות מאתרים כמו Airbnb, Homeway ואחרים עם Jomres. תצטרך להזין את כתובת האתר של עדכון iCal של הנכס שלך עבור כל אתר שאתה רוצה לסנכרן איתו. אם מישהו ירצה הזמינו את הנכס שלכם ב-Airbnb, למשל, התאריכים האלה יוצגו כחסומים (הזמנות שחורות) גם באתר זה של ג\'ומרס, כך שאף אחד לא יכול להזמין את התאריכים האלה כאן. זה לא יסנכרן פרטי הזמנה בין אתרים (כמו פרטי אורח, מחירים, חשבוניות וכו) אבל זו דרך נחמדה וקלה להימנע מהזמנות כפולות על ידי סנכרון רק של הזמינות.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'הגדרות סינכרון iCal' );
jr_define ('_JOMRES_ICAL_FEED_SETTINGS', 'iCal Feed Settings');
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'כתובת אתר iCal חיצונית' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQURIES', 'כלול גם פניות להזמנה?' );
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'אם מופעל, הוא יכלול גם הזמנות שטרם אושרו (אם תכונת אישור ההזמנות מופעלת). שמירה על אפשרות זו מושבתת היא דרך מצוינת להסתיר הזמנות מהיומן שאולי ממתינות לאישור ב- סטטוס לא מאושר/בירור. אם הזמנות אינן דורשות אישור (תכונת אישור ההזמנות מושבתת), כל ההזמנות ייצאו. ');

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'הזנות מרוחקות של iCal' );
jr_define ('_JOMRES_ICAL_REMOTE_FEED_URL', 'URL remote');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'חדר UID' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'שם/מספר חדר' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "בחר את החדר שהעדכון הזה ישפיע, ואת כתובת האתר של האתר המרוחק. בעת ייבוא ​​קובץ iCal, תאריך הסיום של האירוע צריך להיות תאריך היציאה של האורח. הסיכום צריך להיות שם האורח. אירוע התיאור יכול להכיל את כל הפרטים האחרים. ");

jr_define ('_JOMRES_ICAL_REMOTE_FEED_SAVED', 'נוצר הזנת Ical מרחוק');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_DELETED', 'עדכון מרחוק Ical נמחק');