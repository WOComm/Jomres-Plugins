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

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE' , "رزرو ساده") ;
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC' , "رزروهای سیاه رزروهایی هستند که یک اتاق , اتاق یا ملک را اشغال کرده اند , اما هیچ گونه صورتحساب یا داده فاکتور ندارند. به طور معمول از آنها برای نشان دادن رزروهایی که از طریق وسیله دیگری (به عنوان مثال تلفن) انجام شده اند استفاده می شود. شما رزروهای مشکی ایجاد می کنید تا اطمینان حاصل کنید که این منابع نمی توانند به صورت آنلاین , توسط مدیر املاک یا مهمان رزرو شوند. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM' , "شما باید حداقل یک اتاق را انتخاب کنید.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED' , "با موفقیت رزرو شد.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED' , "رزرو نمی شود زیرا در آن بازه زمانی قبلاً رزرو شده است.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY' , "\اتاق توسط\" مسدود شده است)") ;
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP' , "از این تقویم برای سهولت منابع کتاب استفاده کنید. یک اتاق یا اتاق انتخاب کنید , سپس بر روی اولین و آخرین تاریخهای رزرو سیاه کلیک کنید و منابع سیاه رزرو می شوند. اگر رزرو سیاه فقط برای یک رزرو باشد date , سپس دوبار روی آن تاریخ کلیک کنید. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP' , "از این تقویم برای سهولت منابع کتاب استفاده کنید. روی اولین و آخرین تاریخهای رزرو سیاه کلیک کنید و منابع به صورت سیاه رزرو خواهند شد. اگر رزرو سیاه فقط برای یک تاریخ باشد , سپس آن تاریخ را دوبار کلیک کنید . ");

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL' , "افزودن همه") ;
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL' , "حذف همه") ;
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED' , "موارد انتخاب شده") ;