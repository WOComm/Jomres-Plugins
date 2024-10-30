<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


jr_define ('_JRPORTAL_WESTERN_UNION', "ويسترن يونيون") ;
jr_define ('_JRPORTAL_WESTERN_UNION_TITLE', "إعدادات Western Union") ;
jr_define ('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS' , "هنا يمكنك تحديد تفاصيل حساب WU التي سيتم استخدامها لجميع الخصائص التي تم تمكين بوابة WU. إذا اخترت تجاوز تفاصيل حساب WU المعينة في الواجهة الأمامية , فسيتم استخدام التفاصيل التي تم تعيينها هنا . إذا اخترت عدم القيام بذلك , فسيتم استخدام تفاصيل حساب WU المحددة في تهيئة بوابة الواجهة الأمامية. ");
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE', "تجاوز تفاصيل حساب WU المعينة لجميع الخصائص؟") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER', "Western Union Branch:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN', "اسم المستفيد:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT', "معرف المستفيد:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC', "عنوان المستفيد:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME', "معلومات أخرى:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1', "Western Union Branch:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1', "اسم المستفيد:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1', "معرف المستفيد:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1', "عنوان المستفيد:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1', "معلومات أخرى:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2', "Western Union Branch:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2', "اسم المستفيد:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2', "معرف المستفيد:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2', "عنوان المستفيد:") ;
jr_define ('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2', "معلومات أخرى:") ;
jr_define ('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE' , "تفاصيل الدفع لحجزك في") ;
jr_define ('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO', "عزيزي") ;
jr_define ('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU' , "شكرًا لك على الحجز في") ;
jr_define ('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO' , "لتأمين حجزك , يرجى إرسال إيداعك") ;
jr_define ('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL' , "إلى حساب Western Union أدناه.") ;
jr_define ('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS' , "إلى حساب Western Union أدناه. سيتم أيضًا إرسال نسخة من معلومات حساب Western Union إليك عبر البريد الإلكتروني بعد إرسال هذا الحجز.") ;
jr_define ('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1' , "إذا كان لديك أي أسئلة , من فضلك لا تتردد في الاتصال بنا. يمكنك الاتصال بنا على") ;
jr_define ('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2' , "أو مراسلتنا عبر البريد الإلكتروني على") ;
jr_define ('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL' , "إذا كان لديك أي أسئلة , يرجى عدم التردد في الاتصال بنا.") ;
jr_define ('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT', "طباعة تفاصيل حساب Western Union") ;
jr_define ('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT', "إرسال") ;