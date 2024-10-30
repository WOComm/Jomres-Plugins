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
// Because the server may be using a proxy for outgoing calls it's better to call the Jomres App server and ask it to respond with this server's IP address. Once we know that, then we are able to give the documentation the correct IP number to configure in Beds24's API Key N field(s)
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.ipify.org?format=json');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($cURLConnection, CURLOPT_TIMEOUT, 1);

$ip_number_response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($ip_number_response);

if (isset( $jsonArrayResponse->ip)) {
    $this_servers_ip_number = $jsonArrayResponse->ip;
} else {
    $this_servers_ip_number = 'Unknown, ask your server hosts support team';
}

jr_define ('BEDS24V2_CHANNEL_MANAGEMENT', 'ניהול ערוצים (מיטות 24)');

jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24');
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'אם יש לך חשבון Beds24 וברצונך לעדכן את Bed24 בעת הזמנה, אנא בחר באפשרות זו. הגדר את כתובת האתר ל- https://www.beds24.com/api/json/');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'למשתמש זה לא הוגדרו מפתחות API, אז לא יכול להמשיך. בקר בדף שלו בדף ניהול משתמשים> מנהלי נכסים וצור להם מפתח API חדש באמצעות הקישור המופיע בדף זה.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'למשתמש זה אין מאפייני Jomres שהם יכולים להקצות לנכסי Beds24, או להיפך');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "המנהל שאליו אתה מחובר אינו נראה כבעל חשבון ב- Beds24, לכן יהיה עליך להירשם תחילה לשירותם ולאחר מכן לשמור את מפתח ה- API הזה ב <a href = 'https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> האתר של Beds24 כאן. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "העתק והדבק מפתח API זה בשדה LINK בחשבון Beds24 שלך כדי להמשיך.");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "לאחר שתעשה זאת, אנא לחץ על הלחצן למטה כדי להמשיך.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "קישור נכס של מיטות24");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', "דף זה מאפשר לך להציג את הנכסים שיש לך גישה אליהם במערכת זו, בנוסף לאלו הקיימים במנהל הערוצים. הוא גם מאפשר לך לייבא נכסים ממנהל הערוצים למערכת זו, או לייצא נכסים קיימים למנהל הערוצים. <br/> אם יש לך נכסים במערכת זו וב- Beds24 ואתה רוצה לקשר אותם זה לזה, תוכל להשתמש ב- apikey הנכס לשם כך. בקר ב- Beds24> הגדרות> מאפיינים (ודא כי הנכס שנבחר בתפריט הנפתח זהה לזה שברצונך לקשר) ואז בתפריט המשנה קישור שמור את 'נכס apikey' בשדה 'propKey' ב- Beds24. לאחר שתעשה זאת, טען מחדש את הדף. מערכת זו תעשה זאת ראה ששני הנכסים משויכים לאותו מפתח וצור את האסוציאציות הדרושות. לאחר קישור שני הנכסים, זכור לבקר בדף נכס הצג, מצא את כתובת האתר להתראה והדבק אותו בשדה 'הודעת כתובת URL' של דף הקישור. זה יהיה ודא ש- Beds24 ישתמש בקישור הנכון כדי לסנכרן הזמנות עם נכס זה כאשר הוא מקבל הזמנות. ");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "שגיאה: אין נכסים שאפשר לקשר אליהם ב- Beds24. ייתכן שזה בגלל שכל הנכסים שיש לך זכויות שכבר היו מקושרים לחשבון אחר במערכת זו.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "נכס uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "שם נכס");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Bed24 Property Uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "שם נכס מיטות24");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "נכס apikey");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "יבוא");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "הגדר סוגי חדרים");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "כאן עליך לקשר בין סוגי חדרים בחשבון Beds24 שלך לאלה המאוחסנים במערכת זו.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "מיטות24 חדרים מסוג");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "לא ניתן לייבא נכס זה עדיין מכיוון שלא הגדרת את מפתח הנכס בדף קישור הנכס.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "לא ניתן לייבא נכס זה עדיין מכיוון שאין בו חדרים. אנא צור חדר אחד או יותר (חדרים ב- Beds24 זהים לסוגי חדרים ב- Jomres) ואל תשכח להגדיר את המחיר המינימלי. . לאחר שתעשה זאת תוכל לייבא את סוג החדר ל- Jomres ולשייך אותם לסוגי החדרים הנוכחיים של Jomres. לאחר מכן תוכל לשנות את התעריפים, אך יש להגדיר מחיר מינימלי. ");
jr_define ('_BEDS24_SUGGESTED_KEY', "אנו מציעים לך להשתמש במפתח ה- API הזה. לאחר שתעשה זאת, טען מחדש את הדף הזה.");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "ייצוא");
jr_define ('BEDS24V2_REST_API_INTRO', "כאן תוכל לראות את זוג מפתחות ה- API של REST ואת הנתיב אל ה- API. אם תשמור את הפרטים האלה בחשבונך ב- Beds24 אז Beds24 24 יוכל ליצור קשר עם האתר הזה באמצעות ה- API שלו.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "מזהה לקוח");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "סוד לקוח");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (נקודת קצה)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "הצג נכס");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "שינויי סוג חדרים");

jr_define ('BEDS24_ROOM_TYPES_INFO', "דף זה מאפשר לך לשייך את סוגי החדרים שלך לאלה המאוחסנים בשרתי Beds24.");
jr_define ('BEDS24_ROOM_TYPES_INFO2', "עד קישור סוגי החדרים, לא תוכל לקבל פרטי הזמנה שנשלחו על ידי Beds24. אם הנכס שלך יובא/יצא לייצוא או מ- Beds24 אז יצרנו עבורך קישורים באופן אוטומטי, אולם אם תוסיף סוג חדר חדש, או מחק אחד, ניתן להשתמש בדף זה כדי לוודא שסוג החדר משויך כראוי. ");
jr_define ('BEDS24_ROOM_TYPES_INFO3', "בחר את סוגי החדרים Beds24 שברצונך לשייך לסוגי החדרים במערכת זו, ולאחר שתסיים לחץ על שמור כדי לעדכן את השינויים ב- Beds24.");
jr_define ('BEDS24_ROOM_TYPES_YOURS', "סוגי החדרים שלך");
jr_define ('BEDS24_ROOM_TYPES_BEDS24', "מיטות24 סוגי חדרים");
jr_define ('BEDS24_ROOM_TYPES_NONE', "לנכס זה אין סוגי חדרים, כך שלא ניתן לקשר אותו לסוגי חדרים של מיטות24. האם תרצה לייבא סוגי חדרים מ- Beds24?");
jr_define ('BEDS24_IMPORT_ROOMS', "ייבוא ​​חדרים");
jr_define ('BEDS24_EXPORT_BOOKINGS', "ייצוא הזמנות");
jr_define ('BEDS24_IMPORT_BOOKINGS', "ייבוא ​​הזמנות");
jr_define ('BEDS24_IMPORT_EXPORT', "באפשרותך לייבא ולייצא הזמנות קיימות מ- ו אל מיטות24 בלחיצת כפתור. הזמנות המיובאות מ- Beds24 מיובאות מאתמול ויכללו את כל ההזמנות בשנה הבאה. עליך להשתמש בלחצנים אלה רק לאחר מכן. ייבוא ​​או ייצוא של הנכס לראשונה למערכת. לאחר ההתקנה, הייבוא ​​ו/או הייצוא יבוצע באופן אוטומטי. ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "עדכן מחירים ל- Beds24?");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "תוכל לבחור לעדכן את מיטות 24 רק בזמינות או בזמינות ובמחירים. אם יש לך מצבים ספציפיים שבהם ברצונך להשתמש בלוח הבקרה של Beds24 לקביעת מחירים ספציפיים לערוצים ספציפיים, עליך להשאיר סט זה ל- לא.");
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT', "קישור ישיר");
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS', "אם ייבאת נכס זה ל- Jomres, יהיה עליך לשנות באופן ידני את כתובת ה- Notify in Your Beds24 -> נכס -> הגדרות הקישור להלן:");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "אין לך כרגע נכסים המשויכים לנכסי Beds24. עליך לאפס את מפתחות ה- API של המנהל שלך לפני שתאפשר למנהלים שלך לנסות להתחבר ל- Beds24. זה יבטיח שלכולם יש מפתחות ייחודיים.");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "אפס את מפתחות ה- API של מנהל כעת");
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "התעלם מאזהרה");
jr_define ('BEDS24V2_ERROR_KEYS_DONE', "מפתחות API של מנהל התאפסו");

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "קישורי נכס של מיטות24");
jr_define ('BEDS24_ASSIGN_MANAGER', "מנהל השינויים ב- Beds24");
jr_define ('BEDS24_ASSIGN_MANAGER_DESC', "כאשר מנהל צופה בדף ניהול ערוצים (Bed24) בממשק הקדמי, כל נכס החולק מפתח API הן ב- Jomres והן ב- Bed24 מקושרים אוטומטית בתוך Jomres. כמו כן, כל נכס מיובא או מיוצא על ידי המנהל מקושרים. תוכל לשנות את המנהל שאליו מקושר נכס על ידי שינוי התפריט הנפתח של המנהל בדף זה ולאחר מכן לחיצה על שמור. ");
jr_define ('BEDS24V2_TARIFFS_TITLE', "ייצוא תעריפים");
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC', "תוכל לייצא את התעריפים שיצרת ל- Beds24 לתעריף יומי ספציפי. אם אתה מתכוון להשתמש בתכונה זו עליך להגדיר את האפשרות 'עדכון מחירים ל- Beds24?' בתצורת הנכס למספר אתה. ייתכן שיהיה עליך גם להגדיר את הנכס בלוח הבקרה של מיטות24 כך שתוכל לקבל מספר תעריפים יומיים. לשם כך עבור אל הגדרות> נכסים> חדרים> מחירים יומיים והגדר את 'מספר המחירים היומיים' למספר המחירים שאתה רוצה. . לאחר שתעשה זאת, תוכל ללחוץ על אחד מכפתורי P כדי להגדיר את התעריף היומי. ");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "שם תעריף");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "סוג החדר");
jr_define ('BEDS24V2_BOOKING_RESEND', "שלח הודעה מחדש");
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24', "זהו מידע ההזמנה כפי שהוא מאוחסן ב- Beds24. אלא אם כן אתה בטוח שהנתונים אינם נכונים, לא תצטרך לשלוח מחדש את ההזמנה ל- Beds24.");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24', "נראה כי הזמנה זו אינה קשורה להזמנה ב- Beds24. תוכל להשתמש בכפתור שלח שוב כדי לייצא הזמנה זו למיטות24.");

jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS', "אנונימיזציה של אורחים?");
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "כאשר ההזמנות נשלחות למנהל הערוץ, אנו ממליצים לאנונימו את פרטי האורח. אם תגדיר אפשרות זו ל- yes, כאשר פרטי ההזמנה נשלחים למנהל הערוץ שם האורח, כתובת הדוא ל אינה . ל- OTAs תהיה רישום מדויק של הזמינות שלך מבלי שתצטרך לשתף מידע נוסף מהנדרש. המשמעות היא שאתה תואם את ה- GDPR מכיוון שאם האורח יבחר מאוחר יותר למחוק את פרטיו במערכת זו (לא תקבל הודעה כאשר זה קורה), פרטיהם אינם נשארים עם בקרי נתונים אחרים שאין לך שליטה עליהם. במידת הצורך, תוכל עדיין להצליב הזמנות במערכת זו עם אלה שבמנהל הערוץ, דף פרטי ההזמנה יראה לך את מספר ההזמנה עבור ההזמנה הזו כפי שהיא מאוחסנת במנהל הערוצים. ");
jr_define ('BEDS24V2_MASTER_APIKEY', "תכונות ניסיוניות - מפתח API של Master Beds24");
jr_define ('BEDS24V2_MASTER_APIKEY_DESC', "אם כבר יש לך התקנה של מגרשים עם נכסים המקושרים ל- BEDS24 קרא את התיאור המלא כאן. כברירת מחדל, Jomres מיועדת להיות פלטפורמת הזמנות מרובת בעלי עסקים. נכסים אל ובין מיטות 24 בצורה מאובטחת. הגדרה זו מאפשרת לך לעקוף את הפונקציונליות הזו על ידי שליחת מפתח api יחיד לכל הנכסים. המשמעות היא שאתה צריך רק חשבון אחד ב- Beds24 אולם המשמעות היא שכל החיובים ייצברו על ידי אותו חשבון אחד. כל מנהל בעל גישה לנכס יוכל לשלוח עדכונים לנכס בשרתי beds24. השאר ריק כדי להתעלם מהגדרה זו ולאלץ מנהלי נכסים להשתמש בחשבונות Bed24 משלהם. מפתח ה- API יכול ללבוש כל צורה שתרצה, כל כך הרבה זמן מכיוון שהמפתח כאן תואם את זה ב <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> <em> מפתח API 1 </em> </ שדה. אם יש לך כבר התקנה על מגרשים עם נכסים המקושרים ל- BEDS24: אתה יכול לעבור לשימוש בתכונה זו, אולם זה יחייב אותך לקטוע (לרוקן) טבלאות אלה, למחוק את הנכסים הקיימים שכבר נמצאים ב- Jomres, ולאחר מכן לייבא מחדש את הנכסים ממיטות 24 לתוך ג'ומרס. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> בעת הגדרת מפתח ה- API שלך בקטע <em> API N N </em> בדף גישה לחשבון של Beds24, חשוב שתגדיר את השדה <em> API Key Access </em> כ- ' אפשר רק כתובת IP לרשימת ההיתרים 'והגדרת את מספר ה- IP ל <strong> ". $this_servers_ip_number." </Strong> זה חל באופן שווה על תצורת מפתח ה- API הראשי כאן, ובחזית אם מנהל נכס מגדיר API אישי משלו. מפתחות. ");
jr_define ('BEDS24V2_WHITELIST_WARNING', "אם הנכסים שלך כבר היו מחוברים ל- Beds24, שים לב ש- Beds24 הציגה לאחרונה מדיניות שבה כל השרתים המתחברים לחשבון שלך צריכים להיות ברשימה לבנה. תוכל לעשות זאת בדף גישה לחשבון, שם מפתח הגישה שלך הוזן. בחר בתפריט הנפתח IP לרשימת ההיתרים והגדר את מספר ה- IP ל- ");