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
jr_define('_SUBSCRIPTIONS_ACTIVE',"Active");
jr_define('_SUBSCRIPTIONS_EXPIRED',"לא פעיל");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"סטטוס תשלום");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"רמה");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"ערוך מנוי");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"שלח דוא\"ל תזכורת תפוגת מנוי?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"שלח אימייל תזכורת");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"ימים לפני שהמינוי יפוג");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"שלח דוא\"ל כאשר פג תוקף המנוי?");
jr_define('_SUBSCRIPTIONS_MY',"המנויים שלי");
jr_define('_SUBSCRIPTIONS_HRENEW',"חידוש");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"חידוש מנוי");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"כבר נרשמת, נא לרכוש חידוש במקום.");
jr_define('_SUBSCRIPTIONS_HEDIT',"ערוך חבילת מנוי");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"הקלד את האותיות הראשונות של שם המשתמש ותראה תפריט נפתח עם שמות משתמש. לחץ על שם משתמש כדי לבחור אותו.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"חבילת מנוי זו אינה זמינה עוד ולכן לא ניתן לחדש אותה, אנא שקול לשדרג אותה.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"אתה לא מנוי לחבילה הזו אז אינך יכול לחדש אותה.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"אין אפשרויות חידוש לחבילה זו");
jr_define('_SUBSCRIPTIONS_CANCEL',"בטל מנוי");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"תדירות (ימים)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"אורך המנוי בימים");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"חידושים אינם מותרים עבור חבילה זו.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"מחיר חידוש");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"הגדר את זה ל-0 כדי להשבית חידושים עבור חבילה זו או הזן מחיר עבור החידוש");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"אפשרויות חבילה");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"פרטי חבילה");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"חבילת המנוי שלך");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"חבילת המנוי שלך אינה כוללת גישה לתכונה זו. כדי להשתמש בתכונה זו, תצטרך לשדרג את המנוי שלך.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "פג תוקף המנוי שלך וכל הרישומים שלך בוטלו. הרישומים שלך אינם גלויים לאורחים יותר ולא תוכל יותר לקבל הזמנות מקוונות מאתר האינטרנט שלנו. כדי להמשיך להשתמש בשירותים שלנו, פרסם הרישומים שלך והתחל לקבל הזמנות מקוונות, התחבר לחשבונך ורכוש חידוש." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"המינוי שלך ב" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"פג תוקף" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"זוהי התראה כדי ליידע אותך שתוקף המנוי שלך יפוג בקרוב. כדי להמשיך להשתמש בשירותים שלנו, התחבר לחשבונך ורכוש חידוש." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"חבילות מנוי" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"שם" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"תיאור" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"פורסם" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"תדירות" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"מחיר" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"מגבלת עסקים" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"מספר מקסימלי של עסקים שניתן להוסיף עם חבילת מנוי זו" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"הירשם" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "השתמש בפונקציונליות הטיפול במנוי" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"מצטערים, אבל מזהה החבילה אינו מזוהה." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"נראה שעדיין לא מילאת את פרטי החשבון שלך. כדי לרשום את הנכס שלך באתר, אנו צריכים שתשלים את פרטי החשבון שלך לפני שנוכל להמשיך הלאה." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"השתמשת בכל משבצות הנכסים הזמינות בחבילת המנוי שלך, כך שלא תוכל ליצור רישומים חדשים. אנא שדרג את החבילה שלך אם תרצה ליצור רישומים נוספים." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"הכנסה לפי שנה/חודש");
jr_define('_SUBSCRIPTION_WARNING',"הפעלת מנויים אבל נראה שעדיין לא יצרת חבילות מנוי. בעלים לא יוכלו לרשום נכסים באתר שלך עד שתיווצר לפחות חבילת מנוי אחת.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"גישה ל-API" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"אתה יכול לגשת לתכונה זו על ידי שדרוג ל" );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," חבילת מנוי. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'שדרוג');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'מנוי');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'הגדרות שער מנוי');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'אינך רשום כרגע לאף חבילות מנוי. אנא הירשם לחבילה כדי להמשיך להשתמש בשירותים שלנו.');
