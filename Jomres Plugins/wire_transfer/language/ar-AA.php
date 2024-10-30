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


jr_define ('_JRPORTAL_WIRE_TRANSFER', "حوالة مصرفية") ;
jr_define ('_JRPORTAL_WIRE_TRANSFER_TITLE', "إعدادات التحويل البنكي") ;
jr_define ('_JRPORTAL_WIRE_TRANSFER_ADMIN_INSTRUCTIONS' , "هنا يمكنك تحديد تفاصيل الحساب المصرفي التي سيتم استخدامها لجميع الخصائص التي تم تمكين بوابة التحويل الإلكتروني لها. إذا اخترت تجاوز تفاصيل الحساب المصرفي المعينة في الواجهة الأمامية , فستكون التفاصيل المحددة هنا هي مستخدم. إذا اخترت عدم القيام بذلك , فسيتم استخدام تفاصيل الحساب المصرفي المحددة في تهيئة البوابة الأمامية. ");
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_OVERRIDE_ACTIVE', "تجاوز تفاصيل الحساب المصرفي المعينة لجميع الخصائص؟") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER', "صاحب الحساب:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN', "IBAN:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT', "رمز SWIFT:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC', "رمز BIC:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME', "اسم البنك:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER1', "صاحب الحساب:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN1', "IBAN:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT1', "رمز SWIFT:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC1', "رمز BIC:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME1', "اسم البنك:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_ACCOUNT_HOLDER2', "صاحب الحساب:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_IBAN2', "IBAN:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_SWIFT2', "رمز SWIFT:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_BIC2', "رمز BIC:") ;
jr_define ('_JOMRES_WIRE_TRANSFER_GATEWAY_BANK_NAME2', "اسم البنك:") ;
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_TITLE' , "تفاصيل الدفع لحجزك في") ;
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_HELLO', "عزيزي") ;
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_EMAIL_THANKYOU' , "شكرًا لك على الحجز في") ;
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_SENDDEPOSITTO' , "لتأمين حجزك , يرجى تحويل إيداعك المصرفي") ;
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS_EMAIL' , "إلى الحساب المصرفي أدناه.") ;
jr_define ('_JOMRES_CUSTOMTEXT_WIRE_TRANSFER_BELOWADDRESS' , "إلى الحساب المصرفي أدناه. سيتم أيضًا إرسال نسخة من معلومات الحساب المصرفي إليك عبر البريد الإلكتروني بعد إرسال هذا الحجز.") ;
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS1' , "إذا كان لديك أي أسئلة , فلا تتردد في الاتصال بنا. يمكنك الاتصال بنا على") ;
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS2' , "أو مراسلتنا عبر البريد الإلكتروني على") ;
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_CONTACTUS_EMAIL' , "إذا كان لديك أي أسئلة , فلا تتردد في الاتصال بنا.") ;
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_PRINT', "طباعة تفاصيل الحساب المصرفي") ;
jr_define ('_JOMRES_WIRE_TRANSFER_CUSTOMTEXT_SUBMIT', "إرسال") ;