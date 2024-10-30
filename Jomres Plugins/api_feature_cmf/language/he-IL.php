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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "ניהול ערוצים");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "הלקוח יכול לבצע פעילויות לניהול ערוצים. שים לב, זה נותן ללקוח כוח ניכר במערכת לשנות את החשבונות והנכסים שלך.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "ניקוי");

jr_define ('_CMF_CANCELLED_BOOKING', "מנהל הערוץ ביטל הזמנה");

jr_define ('_CMF_CLEANING_STRING', "ניקוי"); // אל תשנה זאת אם כבר ייבאת נכסים. לנכסים עם דמי ניקיון יש תוספת בשם זה
jr_define ('_CMF_SECURITY_STRING', "פיקדון"); // אל תשנה זאת אם כבר ייבאת נכסים. לנכסים עם פיקדונות ביטחון יש תוספת בשם זה


jr_define ('_CMF_API_PRIVACY', "פרטיות API");
jr_define ('_CMF_API_PRIVACY_ON', "פרטיות מופעלת");
jr_define ('_CMF_API_PRIVACY_OFF', "פרטיות מושבתת");

jr_define ('_CMF_API_PRIVACY_DESC', "מידע על נכס ניתן לראות רק על ידי הערוץ שיצר אותו. לדוגמה, אם נתת זוגות מפתחות API שונים לערוץ A ולערוץ B, המידע של הנכס שנוצר על ידי ערוץ A אינו יכול תראו את ערוץ B ... אלא אם תכבה את פרטיות ה- API כדי לאפשר לכל הערוצים לראות את כל המידע של הנכס באמצעות ה- API. הגדר את פרטיות ה- API כבויה אם אתה משתף נכס זה עם אתר אחר שרוצה לרשום את הנכס. אם אינך משתף נכס זה עם אתרים אחרים, השאר את פרטיות ה- API מוגדרת למצב מופעל. ");