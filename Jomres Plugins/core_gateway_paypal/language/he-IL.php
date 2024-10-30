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

jr_define ('PAYPAL_API_KEY_TITLE', "מפתח API של Paypal");
jr_define ('PAYPAL_API_KEY_TITLE_DESC', "הגדר את מזהה הלקוח והסוד של Paypal עבור חשבונות Live ו- Sandbox שלך. לאחר ההגדרה תוכל לבצע הן תשלומי הזמנה והן חשבונית באמצעות Paypal.");

jr_define ('PAYPAL_API_CLIENTID', "מזהה לקוח");
jr_define ('PAYPAL_API_SECRET', "סוד");
jr_define ('PAYPAL_API_CLIENTID_SANDBOX', "מזהה לקוח ארגז חול");
jr_define ('PAYPAL_API_SECRET_SANDBOX', "סוד ארגז חול");

jr_define ('PAYPAL_API_CLIENTID_FINDING', "כיצד אתה מוצא את מזהה הלקוח והסוד שלך?");

jr_define ('PAYPAL_API_CLIENTID_STEP1', 'עבור אל https://developer.paypal.com/ והיכנס.');
jr_define ('PAYPAL_API_CLIENTID_STEP2', "עבור אל היישומים שלי ותעודות פרטיות בתפריט הצדדי.");
jr_define ('PAYPAL_API_CLIENTID_STEP3', "לחץ על צור אפליקציה ליצירת אפליקציה חדשה");
jr_define ('PAYPAL_API_CLIENTID_STEP4', "תן לאפליקציה שלך שם ולאחר מכן לחץ על צור אפליקציה");
jr_define ('PAYPAL_API_CLIENTID_STEP5', "בדף זה תוכל לראות את מזהה הלקוח ואת הסוד שלך. העתק והדבק את המפתחות האלה בשדות המתאימים למעלה.");