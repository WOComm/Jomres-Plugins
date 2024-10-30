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

jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"یادآوری پرداخت");
jr_define ('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1' , "ارسال ایمیل یادآوری پرداخت ..") ;
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..روزها پس از رزرو موقت");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"این افزونه به طور خودکار در پس‌زمینه اجرا می‌شود و یک ایمیل یادآوری پرداخت به مهمانان ارسال می‌کند که رزروهای موقتی را انجام داده‌اند که در بازه زمانی انتخابی شما به‌عنوان پولی علامت‌گذاری نشده‌اند. این برای زمانی مفید است که رزروهایی را که پولی هستند بپذیرید. با استفاده از روش‌های پرداخت آفلاین (انتقال سیمی, چک) اگر رزرو ظرف X روز از زمان رزرو پرداخت نشود, یک ایمیل یادآوری پرداخت برای مهمان ارسال می‌شود. همچنین یک نسخه از آن را دریافت خواهید کرد. اگر از افزونه Provisional Bookings Handling نیز استفاده می‌کنید, مطمئن شوید که فاصله زمانی که می‌خواهید ایمیل یادآوری پرداخت را ارسال کنید حداقل 1 روز کمتر از زمانی باشد که برای حذف یا لغو رزرو پرداخت نشده تنظیم شده است.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"یادآوری پرداخت برای رزرو شما در ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"شما یک رزرو بدون پرداخت در ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"به منظور ایمن کردن رزرو خود, لازم است مبلغی را واریز کنید ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"شماره رزرو");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3', ". در صورت تمایل به بحث در مورد گزینه های پرداخت , لطفاً با ما تماس بگیرید. <br /> <br /> با تشکر.");