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

jr_define('_CLONE_TARIFFS_TITLE',"תעריפים שיבוטים");
jr_define('_CLONE_TARIFFS_INFO',"כאן תוכל לשכפל תעריף מנכס יעד למאפיין מקור. רק נכסים שיש לך סמכות לנהל יהיו זמינים לך.");
jr_define('_CLONE_TARIFFS_SOURCE',"מאפיין מקור");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"תעריף לשכפול");
jr_define('_CLONE_TARIFFS_TARGET',"מאפיין יעד");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"סוג חדר נכס יעד");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"אם מצב עריכת התעריפים של מאפיין היעד שונה ממצב עריכת התעריפים של מאפיין המקור, אז כאשר השיבוט מתרחש, התעריפים המקוריים של מאפיין היעד יימחקו ומצב עריכת התעריף שלו ישתנה כך שישקף את זה של המקור. הגדרת הנכס.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"למחוק תעריפים קיימים על נכס יעד?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"אם מצב עריכת התעריפים של מאפיין היעד זהה למאפיין המקור אז התעריפים הקיימים לא יימחקו. עם זאת, אתה יכול לבחור לעקוף זאת על ידי הגדרת אפשרות זו ל-כן.");