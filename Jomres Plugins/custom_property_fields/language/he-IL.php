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
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "שדות מאפיינים מותאמים אישית");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "ערוך שדה נכס מותאם אישית");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "השתמש בתכונה זו ליצירת שדות מידע מותאמים אישית לנכסים. מידע זה נוסף על ידי מנהל נכסים ומוצג בכרטיסייה חדשה בדף פרטי הנכס.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "מידע על נכסים אחרים");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "ניתן להציג שדות מאפיינים מותאמים אישית אלה בפרטי נכסים בכרטיסייה נפרדת, או ברשימת נכסים. יהיה עליך לערוך באופן ידני /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (עבור קטע רשימת הנכסים) להשגת הפריסה הדרושה לך. עם השדות כפי שהוזנו למעלה, פריסה בסיסית תיראה בערך כמו הבאה, שתוכל להשתמש בה כדוגמה ממנה תוכל לבנות פריסה משלך. ");