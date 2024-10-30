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
jr_define('TOOL_HYPHEN_CHECK_TITLE',"בדיקת מקף");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"כלי זה נועד לבדוק את כל שדות השהיית מאפיינים ושדות ארוכים. לחלקם עשויים להיות ישויות html שגויות בשדות lat או ארוכים במקום מקפים בפועל. היכן נמצא כלי זה ממיר אותם למקפים.");
jr_define ('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND', "כמה נכסים שנמצאו עם ישויות html, שהוסבו כעת למקפים בפועל. מספר הנכסים שהומרו הוא");
jr_define ('TOOL_HYPHEN_CHECK_DONE_NONEFOUND', "הכל טוב, לא נמצאו נכסים עם ישויות html שבהן צריך להיות מקפים בפועל.");