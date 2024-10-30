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
jr_define ('_JRPORTAL_FEED_CREATOR_TITLE', "עדכון RSS");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"תוסף זה יוצר הזנה מכל נכסי jomres. נכון לעכשיו נתמכים פורמטים של הפצת RSS 1.0 ו-RSS 2.0.");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDNAME', "שם ההזנה");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"תיאור העדכון");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"שם קובץ העדכון (ללא רווחים)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"פורמט הפצה");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"זמן מטמון (בשניות)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"כתובת אתר של תמונת עדכון");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"קטוע את תיאור המאפיין?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"קטוע אחרי (תווים)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"הצג תמונת עדכון?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"הצג תמונת מאפיין?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"הצג עיר נכס?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"הצג אזור נכס?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"הצג ארץ נכס?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"הגבלת מספר נכסים בסינדיקציה ל");