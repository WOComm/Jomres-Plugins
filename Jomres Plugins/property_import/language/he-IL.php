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
jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"ייבוא ​​נכסים");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"תכונה זו מאפשרת לך לייבא מאפיינים באמצעות קובץ CSV. בגלל הבדיקות השונות הנדרשות, אנו ממליצים להגביל את מספר המאפיינים שנוצרו לאצוות של לא יותר מ-50 בכל פעם. ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"אנא בחר את הקובץ שברצונך להעלות.");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS', "קובץ ה- csv צריך להכיל 11 עמודות, והשדות לא צריכים להכיל HTML. כל השדות נדרשים.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"שם הנכס");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Text");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS', "מספר החדרים (אם זו וילה/קוטג 'אז ללא קשר למספר החדרים בנכס בפועל זה צריך להיות 1. רק מלונות/צימרים וכו' צריכים להכיל יותר מחדר אחד). מספר שלם . ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"מספר שלם");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"מחיר ללילה ללא קודי מטבע.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"כתובת דואל");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Street");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Town");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Text");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION', "אזור. זה צריך להתכתב עם המזהים של האזורים המאוחסנים בטבלת האזורים");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"מספר שלם");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"ארץ הנכס. קוד קצר, למשל GB או DE, לא שם המדינה המלא");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"מיקוד");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE', "טקסט");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE', "מספר טלפון");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Text");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"התיאור המלא של הנכס. מקסימום 500 תווים");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Text");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"שגיאה, סוג המאפיין לא הוגדר.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"שגיאה, אין לנו סוגי חדרים עבור סוג נכס זה. אתה יכול לתקן זאת על ידי ביקור במבנה האתר באזור המנהל.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"אופס, שכחת להעלות קובץ? ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"נמצאו יותר מדי עמודות, או שהקובץ פגום או שנתוני ה-CSV אינם בנויים כראוי.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"שם המאפיין לא הוגדר.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"מספר החדרים לא הוגדר.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET', "המחיר ללילה לא נקבע.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"לא ניתן לאמת את כתובת הדואל.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"הרחוב לא הוגדר.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN', "העיר לא נקבעה.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"האזור לא הוגדר.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"המדינה לא הוגדרה.");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE', "מיקוד לא הוגדר.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"הטלפון לא הוגדר.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"התיאור לא הוגדר.");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"הנכס יובא בהצלחה!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"מכיוון שיש לך נכס אחד או יותר שהייבוא ​​נכשל, ייצאנו רק את המאפיינים האלה לשדה למטה. אתה יכול להעתיק את המאפיינים האלה ל-exel/open office calc/בבחירה של מטפל בקובץ CSV ולתקן הבעיות בלי צורך לייבא מחדש את כל הנכסים שוב.");