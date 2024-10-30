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
jr_define ('_JOMRES_DATAWIPE_TITLE', "מחיקת נתונים");
jr_define ('_JOMRES_DATAWIPE_DESC', "תכונה זו מאפשרת לך למחוק נתונים שנאספים בעת ביצוע ההזמנות. היא מיועדת לשימוש על ידי מפתחים שיצרו נתוני פיתוח רבים על ההתקנות שלהם (כגון הזמנות בדיקות, הרשמות) ורוצים למחוק את המידע מהמערכת, תוך שמירה על מידע על נכסים ותעריפים. <br/> התוסף יסיר את כל יומני cron, מועדפי המשתמשים, הערות, הזמנות, חשבוניות, מנויים, מנויים, אורחים, נתוני ביקורת, ספירות קליקים וביקורות. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "ניתן לאחזר נתונים אלה רק מעותק גיבוי של המערכת שלך, כך שעליך להבין שמדובר בסקריפט מזיק מאוד. כתוצאה מכך, לאחר השימוש בהם נועדו למטרותיו מטרה שתסיר אותו שוב לאחר מכן. ");
jr_define ('_JOMRES_DATAWIPE_GO', "לחץ כדי למחוק נתונים");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "ריקון");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "רוקן בהצלחה.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "נכשלה ריקון הטבלה.");