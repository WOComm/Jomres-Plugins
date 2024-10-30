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

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "מזהה ערוץ לא הוגדר");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "מזהה מנהל לא הוגדר");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Framework Manager Manager");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "ערוצים");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "ערוצים מותקנים");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "בחר ערוץ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "בחר סוג מילון");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "שגיאה, אין ערוצים מותקנים");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "בדיקות שפיות של מנהל הערוצים");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "בחר ערוץ. לאחר שתעשה זאת נבדוק את תצורתך ונדגיש בעיות אפשריות שאולי תצטרך לטפל בהן.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "מיפוי משאבים");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "בערוצים שונים יש מה שמכונה מילונים. אלה מונחים לתיאור משאבים כגון סוגי חדרים, תכונות החדר, תכונות הנכס וכו '. לפני שתוכל להשתמש בערוץ אתה צריך למפות משאבים שונים של Jomres עם ערוצים בודדים. משאבים כך שלנכסים המיובאים וייוצאים לערוצים יהיו המשאבים הנכונים. בדף זה תבחר תחילה ערוץ. לאחר שתסיים תועבר לדף חדש שבו תוכל לבחור את סוגי המשאבים שברצונך למפות. למשאבי הערוץ (למשל, מאפייני נכס). לאחר בחירת סוג המשאב תוכל לבחור זה בזה את משאבי Jomres והערוץ. ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "כאן עליך לבחור את המשאב (מילון)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "אין פריטים מקומיים לפריט מילוני זה, כך שאין מה למפות נגדו.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "שגיאה, לערוץ אין שיעור מילונים.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "בדף זה תצטרך למפות את פריטי המילון של מנהל הערוצים עם אלה ב- Jomres.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "חשבונות מנהל ערוצים");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "אנא שמור פרטי הרשאה עבור כל מנהלי ערוצים שאיתם יש לך חשבונות.");
jr_define ('סיום', 'סיום עריכה');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "שגיאה, התוסף האופציונלי אינו מותקן.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "שם הערוץ אינו מסופק");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "אובייקט נכס חדש לא מסופק");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "אובייקט JRUser זה לא מסופק");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "התחלת ייבוא ​​נכס");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "נכס מיובא בהצלחה");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "נכשל ייבוא ​​הנכס");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "ייבא את כל הנכסים");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "ייבוא ​​נכס");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "לא ניתן לייבא נכסים שאינם מסומנים כפרסומים/מופעלים בשרת המרוחק, או נכסים שאין בהם פריטי שינויים בלוג.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "התחלת ייבוא ​​תעריף");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "תעריף מיובא בהצלחה");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "נכשל ייבוא ​​התעריף");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "לא ניתן היה לאמת הגדרות נכס, ניסה לייבא הגדרת נכס לא מזוהה");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "נכסים מיובאים");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "שם הנכס");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "שם הערוץ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', "uid property property");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "uid property property");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "ערוך שלט רחוק");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "הצג מקומי");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "מחק מקומי");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "לוח מחוונים");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "חשבונות ערוץ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "לא מותקנים תוספי ערוצים דקים, עדיין אינך יכול להשתמש בתכונה זו.");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "ניתן להקצות נכסים שאינם מוקצים שאתה מנהל לערוץ. אם תשנה את הערוץ אתה נותן לערוץ כלשהו בעל גישת API תקפה");