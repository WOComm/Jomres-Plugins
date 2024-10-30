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

jr_define ('DISALLOW_SYNDICATION_TITLE' , "ممنوعیت اتحادیه") ;
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION' , 'ویژگی سندیکای Jomres.net قابلیت جدیدی است که برای به اشتراک گذاشتن خواص بین سایت ها طراحی شده است , اگرچه رزروها فقط در سرور خانه قابل انجام است.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE' , "هدف این است که سایتها بتوانند با موتورهای جستجو اعتماد ایجاد کنند. این یک ویژگی رایگان است که برای همه کاربران Jomres در دسترس است. دارندگان مجوز Jomres فعال در صورت تمایل به حذف آنها می توانند سایت از شبکه اتحادیه از طریق این صفحه. Localhost را نمی توان به شبکه اضافه کرد و اگر به هر دلیلی مشکلی در اتصال وجود داشته باشد , نمی توانید سایت خود را به شبکه اضافه کنید. اگر شما صفحه تست اتصال REST API را بررسی کنید شک ندارید. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW' , "برای حذف سایت خود از شبکه روی این پیوند کلیک کنید.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW' , "برای افزودن سایت خود به شبکه روی این پیوند کلیک کنید.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW' , "حذف این سایت از شبکه") ;
jr_define ('DISALLOW_SYNDICATION_ALLOW' , "افزودن این سایت به شبکه") ;

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY' , "متأسفیم , کلید پشتیبانی شما معتبر نیست یا فعال نیست , نمی توانید وضعیت سندیکای این نصب را تغییر دهید.");