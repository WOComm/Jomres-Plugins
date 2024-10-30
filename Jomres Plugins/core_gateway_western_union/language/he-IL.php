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
jr_define('_JRPORTAL_WESTERN_UNION',"Western Union");
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"הגדרות ווסטרן יוניון");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"כאן תוכל להגדיר את פרטי חשבון ה-WU שישמשו עבור כל הנכסים ש-WU Gateway מופעל בהם. אם תבחר לעקוף את פרטי חשבון WU שהוגדרו ב-frontend, אזי ישמשו הפרטים המוגדרים כאן . אם תבחר שלא, אזי ייעשה שימוש בפרטי חשבון ה-WU המוגדרים בתצורת שער חזיתי.");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"לעקוף את פרטי חשבון WU שהוגדרו עבור כל הנכסים? ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER'," סניף ווסטרן יוניון: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"שם המוטב: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"זיהוי המוטב: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"כתובת המוטב: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"מידע אחר: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"Western Union Branch: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"שם המוטב: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"זיהוי המוטב: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"כתובת המוטב: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"מידע אחר: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2'," סניף ווסטרן יוניון: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"שם המוטב: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"זיהוי המוטב: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"כתובת המוטב: ");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"מידע אחר: ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"פרטי תשלום עבור ההזמנה שלך ב");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"יקיר ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"תודה על הזמנתך ב");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"על מנת להבטיח את הזמנתך, אנא שלח את ההפקדה שלך בסך ");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL'," לחשבון Western Union למטה.");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS'," לחשבון Western Union למטה. עותק של פרטי חשבון Western Union יישלח אליך גם בדוא\"ל לאחר שליחת הזמנה זו.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"אם יש לך שאלות, אנא אל תהסס לפנות אלינו. תוכל להתקשר אלינו ב");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," או שלח לנו דוא\"ל ב");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"אם יש לך שאלות, אנא אל תהסס לפנות אלינו.");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"הדפס פרטי חשבון Western Union");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"Submit");
jr_define('JOMRES_WESTERN_UNION_GATEWAY_WU_CHOSEN',"האורח ישלם על ידי Western Union");
