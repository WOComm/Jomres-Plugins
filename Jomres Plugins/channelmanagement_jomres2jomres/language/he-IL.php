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

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "שילוב Jomres 2 Jomres");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "מזהה לקוח אתר הורים");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "מזהה הלקוח של אתר האב. באתר האב תצטרך מזהה לקוח ייחודי וסודי עם כל התוספים של תכונת ה- API המותקנים, התוסף לניהול ערוצים מותקן וכאשר אתה יוצר/עורך את מזהה הלקוח/ זוג מפתחות סודי תצטרך לתת לו גישה לכל ההיקפים הזמינים. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "סוד לקוח אתר הורים");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "סוד לקוח אתר האב");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "כתובת אתר להורים");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "כתובת האתר לאתר Jomres האב.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "שגיאה, מזהה לקוח אתר ההורה שלך אינו מוגדר. בקר בכרטיסייה 'תצורת אתרים'> 'מנהל הערוצים' כדי לשמור את מזהה הלקוח שלך.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "שגיאה, סוד אתר ההורים שלך לא מוגדר. בקר בכרטיסייה 'תצורת אתרים> חשבונות מנהל ערוצים' כדי לשמור את הסוד שלך.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "שגיאה, כתובת האתר הסודית של אתר ההורה שלך אינה מוגדרת. בקר בכרטיסייה תצורת האתר> חשבונות מנהל הערוצים כדי לשמור את כתובת אתר האב שלך.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "שגיאה, מזהה הלקוח שלך אינו מוגדר. בקר בתצורת האתר> הכרטיסייה 'חשבונות מנהלי ערוצים' כדי לשמור את שם המשתמש שלך.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "שגיאה, מזהה הלקוח שלך אינו מוגדר. בקר בתצורת אתרים> הכרטיסייה 'חשבונות מנהלי ערוצים' כדי לשמור את הסיסמה שלך.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "הגדרת ערוץ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: ייבוא ​​נכסים חדשים.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "יבוא");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "ייצוא");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "מזהה נכס לא הוגדר");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "פריטי מילון ממופים לא הוגדרו");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "סוג נכס מקומי לא נמצא. אם סוג הנכס נוצר, ודא שמיפת את סוג הנכס של השירות המרוחק לסוג הנכס המקומי.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "סוג נכס מרוחק לא מוחזר על ידי ערוץ.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "סוג נכס מקומי לא עבר.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "לא ניתן היה לקבוע את דגם ההזמנה (mrp או srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "לא ניתן היה לקבוע את דגם ההזמנה (mrp או srp) לאחר מציאת מזהה סוג הנכס.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "לא ניתן לקבוע את קוד המדינה");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "לא ניתן לקבוע מזהה אזור");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "לא ניתן היה לאמת את מערך ההגדרות כראוי");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "סוגי נכסים שלא ממופים על ידי מנהל המערכת");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "תכונות הנכס לא ממופות על ידי מנהל המערכת");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "סוגי חדרים שאינם ממופים על ידי מנהל המערכת");
