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
jr_define ('_JINTOUR_TITLE', "ניהול סיורים/פעילויות");

jr_define('_JINTOUR_PROFILES_TITLE',"פרופילי סיור/פעילות");
jr_define('_JINTOUR_PROFILES_NEW',"פרופיל סיור/פעילות חדש");
jr_define ('_JINTOUR_PROFILES_DELETE', "מחק פרופיל סיור/פעילות");

jr_define ('_JINTOUR_PROFILE_TITLE', "שם פרופיל");
jr_define ('_JINTOUR_PROFILE_DESCRIPTION', "תיאור");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"הזן תיאור של הסיור/פעילות שלך, כולל מסלול הטיול שלו.");
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK', "ימים בשבוע");
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO', "");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"מחיר למבוגרים");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"מחיר ילד");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"כדי לא לכלול אפשרות מלהופיע בטופס ההזמנה, השאר את המחיר כ-0 (אפס)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"מרחבים למבוגרים");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"מרחבי ילדים");
jr_define ('_JINTOUR_PROFILE_SPACES_INFO', "מספר החללים הזמינים בסיור/בפעילות");
jr_define('_JINTOUR_PROFILE_START_DATE',"תחילת עונה");
jr_define('_JINTOUR_PROFILE_END_DATE',"העונה מסתיימת");

jr_define ('_JINTOUR_PROFILE_GENERATE_INFO', "לאחר שיצרת פרופיל סיור/פעילות תצטרך ליצור סיורים/פעולות המבוססות על הגדרות הפרופיל הזה. צור את הסיור/הפעילות, ולאחר מכן לחץ על סמל החץ הירוק לצד אותו פרופיל כדי ליצור את סיורים/פעילויות עצמן. לאחר שנוצרו הסיורים/פעולות תוכל למחוק סיורים/פעילויות בודדים אם תרצה. ");
jr_define('_JINTOUR_PROFILE_GENERATE',"הפק סיורים/פעילויות");

jr_define('_JINTOUR_TOUR_TITLE',"כותרת הפעילות");
jr_define('_JINTOUR_TOUR_DATE',"תאריך");
jr_define('_JINTOUR_TOUR_ADULTS',"מבוגרים");
jr_define('_JINTOUR_TOUR_KIDS',"ילדים");
jr_define('_JINTOUR_TOUR_ITINERY',"תוכנית נסיעה");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"סיורים חדשים שנוצרו");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"הזמנת הסיור בוטלה");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"סיורים חדשים נוצרו");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"מקומות זמינים כעת");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"הזמנה חדשה עבור מזהה סיור/משאב ");
jr_define ('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE', "בוצעה הזמנה חדשה לסיור/משאב מנהל. אנא עיין בקישור הבא לצפייה בדף אזור המנהלים של אותו סיור");

jr_define ('_JINTOUR_TITLE_CONFIG', "תצורת סיורים משולבים של Jomres");
jr_define('_JINTOUR_TITLE_WHOLESITE',"האם כל ההתקנה היא התקנה של Jintour?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"אם תגדיר את זה ל-כן, אז כל הנכסים יהיו נכסי סיור. אם תגדיר את זה ל-No, אז כאשר נכסים חדשים נוצרו תוכל לקבל גם מאפיינים מסוג סיור וגם מלון/דירה. ");

jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS', "סיורים");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"בחר באפשרות הסיורים אם אתה מציע הזמנות לפריטים הזמינים בתאריכים מסוימים (למשל סיורים, כרטיסים להופעה.)");
jr_define('_JINTOUR_SHOWDEPARTURE',"הצג את שדה הקלט היציאה?");
jr_define ('_JINTOUR_SHOWDEPARTURE_DESC', "הגדר את זה ל- Yes אם ברצונך להציג גם תאריך הגעה ותאריך יציאה. זה יהיה שימושי אם אתה מציע נסיעות באוטובוס, כרטיסי טיסה וכו ', שם אתה צריך לדעת הן תאריכים נכנסים ויציאים, הצגת תאריך היציאה מאפשרת לך להציע משאבים על פני מספר תאריכים, בעוד שעם ההגדרה לא, ניתן לקבל רק הזמנות לתאריך אחד.");

jr_define('_JINTOUR_PROFILES_TITLE_LIST',"רשימת סיורים");