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

jr_define ('JOMRES_COUPONS_SCAN' , "این کد را در تلفن خود اسکن کرده و اکنون رزرو کنید!") ;
jr_define ('JOMRES_COUPONS_GETADISCOUNT' , "تخفیف بگیرید") ;
jr_define ('JOMRES_COUPONS_PERCENT' , "٪") ;
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION' , "بدون هزینه اقامت شما") ;
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN' , "در صورت رزرو بین") ;
jr_define ('JOMRES_COUPONS_AND' , "و") ;
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN' , "برای تاریخهای بین") ;
jr_define ('JOMRES_COUPONS_ALTERNATIVELY' , "از طرف دیگر , هنگام رزرو این کد تخفیف را وارد کنید:") ;
jr_define ('JOMRES_COUPONS_PRINT_COUPONS' , "کوپن های چاپ") ;

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM' , 'رزرو معتبر از') ;
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO' , 'رزرو معتبر تا') ;
jr_define ('_JRPORTAL_COUPONS_GUESTNAME' , 'نام مهمان') ;
jr_define ('_JRPORTAL_COUPONS_DESC_478' , "می توان کدهای تخفیف ایجاد کرد و به عنوان انگیزه ای برای رزرو به مهمانان منتقل کرد. <br/>
معتبر از تاریخ و به تاریخهایی اشاره دارد که می توان در آن رزرو کرد , در حالی که رزرو معتبر از تاریخ تا تاریخهایی است که رزرو باید برای اعتبار کوپن پوشش دهد. اگر رزرو خارج از آن دوره انجام شود , نرخ عادی برای روزهای خارج از آن دوره اعمال می شود. <br/>
اگر می خواهید رزرو برای یک مهمان خاص در دسترس باشد , نام آن مهمان را در کرکره ای انتخاب کنید تا کوپن فقط به آن مهمان محدود شود. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN' , "کدهای تخفیف ایجاد شده در اینجا برای همه ویژگی های وب سایت قابل اجرا خواهد بود.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK' , 'با کوپن شما , این رزرو با تخفیف از') ;
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO' , ' به ') ;