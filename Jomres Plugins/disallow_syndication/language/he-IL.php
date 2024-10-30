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
jr_define ('DISALLOW_SYNDICATION_TITLE', "Disallow Syndication");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'תכונת הסינדיקציה של Jomres.net היא פונקציונליות חדשה שנועדה לשתף נכסים בין אתרים למרות שניתן לבצע הזמנות רק בשרת הבית.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "מטרת הדבר היא לאפשר לאתרים לבנות אמון עם מנועי חיפוש. זוהי תכונה חינמית, הזמינה לכל משתמשי Jomres. בעלי רישיון Jomres פעילים יכולים, אם הם רוצים לבחור להסיר את אתר מרשת הסינדיקציה באמצעות דף זה. לא ניתן להוסיף Localhost לרשת, ואם מסיבה כלשהי יש בעיה בקישוריות לא תוכל להוסיף את האתר שלך לרשת. בדוק את דף בדיקת הקישוריות של REST API אם אתה יש כל ספק. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "לחץ על קישור זה כדי להסיר את האתר שלך מהרשת.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "לחץ על קישור זה כדי להוסיף את האתר שלך לרשת.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "הסר אתר זה מהרשת");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "הוסף אתר זה לרשת");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "מצטערים, מפתח התמיכה שלך אינו חוקי או אינו פעיל, אינך יכול לשנות את סטטוס הסינדיקציה של התקנה זו.");