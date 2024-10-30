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

jr_define('_JINTOUR_TITLE',"مدیریت تور/فعالیت");

jr_define('_JINTOUR_PROFILES_TITLE',"نمایه های تور/فعالیت");
jr_define('_JINTOUR_PROFILES_NEW',"نمایه تور/فعالیت جدید");
jr_define('_JINTOUR_PROFILES_DELETE',"حذف نمایه تور/فعالیت");

jr_define('_JINTOUR_PROFILE_TITLE',"عنوان نمایه");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"شرح");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"توضیحاتی از تور/فعالیت خود, از جمله برنامه سفر را وارد کنید.");
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK' , "روزهای هفته") ;
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"قیمت بزرگسالان");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"قیمت فرزند");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"برای حذف گزینه ای از ظاهر شدن در فرم رزرو, قیمت را 0 (صفر) بگذارید");
jr_define ('_JINTOUR_PROFILE_SPACES_ADULTS' , "فضاهای بزرگسالان") ;
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"فضاهای کودک");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"تعداد فضاهای موجود در تور/فعالیت");
jr_define('_JINTOUR_PROFILE_START_DATE',"شروع فصل");
jr_define ('_JINTOUR_PROFILE_END_DATE' , "فصل به پایان می رسد") ;

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"هنگامی که یک نمایه تور/فعالیت ایجاد کردید، باید تورها/فعالیت ها را بر اساس تنظیمات آن نمایه ایجاد کنید. تور/فعالیت را ایجاد کنید، سپس روی نماد فلش سبز در کنار نمایه کلیک کنید تا خود تورها/فعالیت ها ایجاد شود. پس از ایجاد تورها/فعالیت‌ها، در صورت تمایل می‌توانید تورها/فعالیت‌ها را حذف کنید.");
jr_define('_JINTOUR_PROFILE_GENERATE',"ایجاد تورها/فعالیت ها");

jr_define('_JINTOUR_TOUR_TITLE',"عنوان فعالیت");
jr_define('_JINTOUR_TOUR_DATE',"تاریخ");
jr_define('_JINTOUR_TOUR_ADULTS',"بزرگسالان");
jr_define('_JINTOUR_TOUR_KIDS',"کودکان");
jr_define ('_JINTOUR_TOUR_ITINERY' , "برنامه سفر") ;

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"تورهای جدید ایجاد شده");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"رزرو تور لغو شد");
jr_define ('_JINTOUR_TOUR_SAVE_MESSAGE' , "ایجاد تورهای جدید") ;
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"فضاهای موجود در حال حاضر");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"رزرو جدید برای شناسه تور/منبع");
jr_define ('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE' , "رزرو جدیدی برای تور/منابع مدیر انجام شده است. لطفاً برای مشاهده صفحه منطقه مدیر آن تور , پیوند زیر را مشاهده کنید");

jr_define('_JINTOUR_TITLE_CONFIG',"پیکربندی تورهای مجتمع Jomres");
jr_define('_JINTOUR_TITLE_WHOLESITE',"آیا کل نصب یک نصب Jintour است؟");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"اگر این را روی Yes تنظیم کنید، تمام ویژگی‌ها ویژگی‌های تور خواهند بود. اگر آن را روی No تنظیم کنید، پس از ایجاد ویژگی‌های جدید، می‌توانید هر دو ویژگی تور و هتل/آپارتمان را داشته باشید.");


jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"تورها");
jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC' , "در صورت ارائه رزرو برای مواردی که در تاریخهای خاصی (به عنوان مثال تورها , بلیط های کنسرت) در دسترس هستند , گزینه تور را انتخاب کنید");
jr_define('_JINTOUR_SHOWDEPARTURE',"نمایش فیلد ورودی خروج؟");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"اگر می خواهید تاریخ ورود و خروج را نشان دهید، این را روی Yes تنظیم کنید. اگر سفرهای اتوبوس، بلیط هواپیما و غیره را ارائه می‌دهید که باید تاریخ‌های ورودی و خروجی را بدانید، نشان دادن تاریخ عزیمت به شما امکان می‌دهد منابع را در چندین تاریخ ارائه دهید، در حالی که با تنظیم روی No، فقط رزرو برای یک تاریخ قابل قبول است");

jr_define ('_JINTOUR_PROFILES_TITLE_LIST' , "لیست تورها") ;