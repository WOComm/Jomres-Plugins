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

jr_define ('_JOMRES_DATAWIPE_TITLE' , "پاک کردن داده ها") ;
jr_define ('_JOMRES_DATAWIPE_DESC' , "این ویژگی به شما امکان می دهد داده های جمع آوری شده هنگام رزرو را حذف کنید. برای استفاده توسعه دهندگانی که داده های توسعه زیادی در نصب خود ایجاد کرده اند (مانند رزروهای آزمایشی , اشتراک ها) و می خواهند اطلاعات را از سیستم پاک کنید , در حالی که اطلاعات دارایی و تعرفه را حفظ می کنید. <br/> این افزونه همه گزارشات cron , موارد دلخواه کاربران , یادداشت ها , رزروها , فاکتورها , مشترکین , اشتراک ها , مهمانان , داده های حسابرسی , تعداد کلیک و بررسی ها را حذف می کند. " );
jr_define ('_JOMRES_DATAWIPE_WARNING' , "این داده ها را فقط می توان از یک نسخه پشتیبان از سیستم شما بازیابی کرد , بنابراین باید بدانید که این یک اسکریپت بسیار مضر است. در نتیجه , توصیه می شود هنگامی که از آن برای مقصود خود استفاده کرده اید هدف این است که دوباره آن را حذف کنید. ");
jr_define ('_JOMRES_DATAWIPE_GO' , "برای پاک کردن داده ها کلیک کنید") ;
jr_define ('_JOMRES_DATAWIPE_EMPTYING' , "خالی") ;
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS' , "با موفقیت خالی شد.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE' , "جدول خالی نشد.");