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


jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'שיטת שילוב זו מעדכנת רשימת Mailchimp כאשר אתה מוסיף אורח למערכת.<br/>
אינך צריך להגדיר את קלט כתובת האתר עבור webhook זה, אנו נבין זאת על סמך ה-API שלך.<br/>
כדי להגדיר את ה-webhook הזה תזדקק לשני פריטי מידע, מפתח API ומזהה הרשימה. <br/>
כדי למצוא את מפתח ה-API שלך עבור לחשבון Mailchimp שלך ו:<br/>
<ol>
  <li>לחץ על שם הפרופיל שלך כדי להרחיב את לוח החשבון, ובחר חשבון.</li>
  <li>לחץ על התפריט הנפתח תוספות ובחר מפתחות API.</li>
  <li>העתק מפתח API קיים או לחץ על הלחצן צור מפתח.</li>
  <li>שם המפתח שלך בצורה תיאורית, כדי שתדע איזה יישום משתמש במפתח זה.</li>
</ol>
לאחר מכן תזדקק ל- List ID, אותו תוכל למצוא על ידי ביקור ברשימות שלך ב- Mailchimp. לחץ על הקישור תפריט רשימות ובסוף השורה בצד ימין לחץ על התפריט הנפתח ולאחר מכן בחר הגדרות. גלול לתחתית העמוד הזה, זה יגיד משהו כמו "מזהה רשימה עבור רשימת בלהבלה". זהו המזהה של הרשימה שבה אתה צריך להשתמש.
    ');

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'מפתח API');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'מזהה רשימה');