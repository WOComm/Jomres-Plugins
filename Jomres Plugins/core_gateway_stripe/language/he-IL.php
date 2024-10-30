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

jr_define ('STRIPE_TITLE', "פס");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "שער פס זה נועד במיוחד לאפשר לך כמנהל האתר לקבל חלק מהתשלומים ששולמו למנהלי נכסים בזמן ההזמנה. לפני שניתן יהיה להשתמש בו, תחילה עליך להגדיר אינטגרציה משלך עם פס התחבר. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  תיעוד לתוסף זה ניתן למצוא כאן. </a> <br/> אם תלחץ על שמור בדף זה, כדי לאפשר לתוסף זה לפעול בצורה חלקה  כל שאר השערים יושבתו </ strong> לפני שתתחיל, ודא שעברת לדף שלך ב- Stripe Connect וציינת שאתה מקים פלטפורמה. לאחר שתעשה זאת בצע את ההוראות שעל המסך כדי להגדיר את חשבונך. לפני שהמנהלים יוכלו לחבר את חשבונם לשלך עליך לבקר בהגדרות> חיבור הגדרות ובאזור \"הגדרות OAuth\" מופעל OAuth עבור חשבונות רגילים ולאחר מכן לחץ על שמור (שים לב, יהיה עליך לעשות זאת הן במבחני והן במצבי Live). ");

jr_define ('STRIPE_REGISTER_CONNECT', "התחבר אלינו!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "נרשמת, אך החיבור עדיין לא הושלם. עליך לחבר את חשבון Stripe לאתר שלנו. לאחר שתסיים, תוכל להוסיף את כל הנכסים שלך לאתר שלנו ולהתחיל לבצע הזמנות. . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "ברוכים הבאים אל");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "לפני שתתחיל להגדיר את הנכסים שלך, עליך לחבר אותנו לחשבון Stripe שלך. לחץ על הקישור כדי להתחיל.");

jr_define ('STRIPE_SETUP_INFO', "כעת עלינו לחבר את חשבונך לחשבון שלנו, זה יאפשר לנו לקחת תשלומים בשמך אז לחץ על כפתור התחבר כדי להעביר אותו לפס שם תוכל לאשר את החיבור.");
jr_define ('STRIPE_SETUP_DONE', "אתה כבר מחובר אלינו, אין מה לעשות כאן יותר! סגור את החלון הזה ובואו נמשיך בעסק.");
jr_define ('STRIPE_SETUP_THANKS', "תודה שפנית אלינו! תוכל לסגור חלון זה כעת.");
jr_define ('STRIPE_SETUP_DISCONNECT', "נתק את חשבונך.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "החשבון נותק, תוכל לסגור חלון זה כעת.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "מזהה לקוח Stripe Connect");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "תוכל לקבל את מזהה לקוח Stripe שלך ​​מ <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> מרכז השליטה> הגדרות> התחברות. המפתחות נמצאים תחת אפשרות התפריט מפתחים. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "אנא ודא שהגדרת את ה- URI להפניה ב <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> התחברות> הגדרות </a> ל <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "מפתח סודי");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "מפתח ציבורי");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "הוועדה שלך");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "עמלה זו נלקחת מהתשלום שנשלח למנהל הנכסים בזמן ההזמנה. לאחר מכן היא נכנסת לחשבון Stripe שלך ​​על ידי Stripe. <br/> זהו אחוז העמלה שתגבה ממנהלי הנכס עבורו. ההזמנות שלך. העמלה שלך תחויב בהתבסס על כל המחיר של ההזמנה, ולא על ערך הפיקדון. <br/> לא משנה מה תגדיר ערך זה, אנו ממליצים שתגדיר את תצורת האתר -> טופס הזמנה -> נתון הפקדה מינימאלית שיהיה לפחות פי שניים מהנתון הזה, כך שאם אתה רוצה לגבות 10% עמלה, עליך להפוך את ההפקדה המינימלית להיות 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "דמי פס אירופאים");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "זהו האחוז ש- Stripe מחייבת אותך בגין ביצוע תשלומים באתר שלך. נכון לעכשיו הם גובים 1.4% עבור כרטיסים אירופיים, ו -2.9% עבור כרטיסים לא אירופיים. נתון זה נדרש לקביעת מחירים בעת ההזמנה ו זמן תשלום. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "דמי פס ללא יורו");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "מספר כרטיס");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "תפוגה (MM/YY)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "מיקוד לחיוב");


jr_define ('STRIPE_PAYMENT_FORM_SECURE', "טופס תשלום מאובטח");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "פרטי חיוב");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "פרטי כרטיס");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "שם מחזיק הכרטיס");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "שלם עכשיו");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "לשלם עכשיו");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'הרחוב נדרש ואינו יכול להיות ריק');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'הרחוב חייב להיות יותר מ -6 ופחות מ -96 תווים');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'העיר נדרשת ואינה יכולה להיות ריקה');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'ה- zip נדרש ואינו יכול להיות ריק');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'ה- zip חייב להיות יותר מ -3 ופחות מ -12 תווים');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'כתובת הדוא"ל נדרשת ואינה יכולה להיות ריקה');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'הקלט אינו כתובת דוא"ל חוקית');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'כתובת הדוא"ל חייבת להיות יותר מ -6 ופחות מ -65 תווים');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'שם בעל הכרטיס נדרש ואינו יכול להיות ריק');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'שם בעל הכרטיס חייב להיות יותר מ -6 ופחות מ -70 תווים');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'מספר כרטיס האשראי נדרש ואינו יכול להיות ריק');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'מספר כרטיס האשראי אינו חוקי');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'חודש הפקיעה נדרש');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'חודש התפוגה יכול להכיל ספרות בלבד');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'שנת התפוגה נדרשת');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'שנת התפוגה יכולה להכיל ספרות בלבד');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'ה- cvv נדרש ואינו יכול להיות ריק');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'הערך אינו CVV חוקי');

jr_define ('STRIPE_PAYMENT_FAILED', "מצטערים, לא הצלחנו לעבד את התשלום שלך בשלב זה.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "אנא נסה שוב");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "התשלום נדחה.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "יותר מדי בקשות הוגשו לממשק API מהר מדי");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "פרמטרים לא חוקיים סופקו ל- API של Stripe");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "האימות עם ה- API של Stripe נכשל");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "תקשורת הרשת עם Stripe נכשלה (האם חיבור האינטרנט שלך נפסק?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "אירעה שגיאה שלא נתפסה");