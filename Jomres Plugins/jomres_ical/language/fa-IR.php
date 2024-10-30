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

jr_define( '_JOMRES_ICAL_EVENT', 'iCal Event' );
jr_define ('_JOMRES_ICAL_FEED' , 'iCal Feed') ;
jr_define ('_JOMRES_ICAL_FEED_LINK' , 'آدرس iCal Feed') ;
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s' );
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'فید/های iCal شما می توانند رزروهای آینده را در یک تقویم راه دور از جمله دستگاه تلفن همراه, تقویم Google, تقویم Apple, Thunderbird, Outlook و موارد دیگر نشان دهند. از URL/های زیر برای اشتراک در فید/های موجود در نرم افزار تقویم شما.' );
jr_define( '_JOMRES_ICAL_ANON', 'URL ناشناس فید iCal' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'اجازه دسترسی ناشناس به فید/های iCal؟' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'اگر این گزینه فعال باشد, فید رویدادهای iCal شما برای همه در دسترس خواهد بود, اما بدون رزرو یا جزئیات مهمان.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal Import' );
jr_define( '_JOMRES_ICAL_SELECT', 'انتخاب فایل برای وارد کردن' );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'خطا, هیچ فایلی آپلود نشده است.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "هنگام وارد کردن یک فایل iCal, تاریخ پایان رویداد باید تاریخ عزیمت مهمان باشد. خلاصه باید نام مهمان باشد. توضیحات رویداد می تواند شامل تمام جزئیات دیگر باشد." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'این شماره رزرو از قبل در سیستم وجود دارد.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'هیچ اتاقی در تاریخ های انتخاب شده موجود نیست.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'هیچ رویدادی در فایل ics یافت نشد.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'رویداد با موفقیت وارد شد');
jr_define( '_JOMRES_ICAL_FAILURE', 'رویداد وارد نشد' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'نام مهمان' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'شرح رویداد' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'شروع' );
jr_define ('_JOMRES_ICAL_RESULT_HEADER_END' , 'پایان') ;
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'نتیجه');
jr_define( '_JOMRES_ICAL_WITHHELD', 'withheld' );
jr_define ('_JOMRES_ICAL_FEED_SETTINGS_DESC' , 'فید/های iCal شما می توانند رزروهای آینده را در یک تقویم از راه دور از جمله دستگاه تلفن همراه شما , تقویم Google , تقویم Apple , Thunderbird , Outlook و موارد دیگر نمایش دهند.');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'این ویژگی به شما امکان می‌دهد رزروهای سایت‌هایی مانند Airbnb, Homeway و سایرین را با Jomres همگام‌سازی کنید. باید آدرس iCal فید ملک خود را برای هر سایتی که می‌خواهید با آن همگام‌سازی کنید وارد کنید. اگر کسی می‌خواهد برای مثال, ملک خود را در Airbnb رزرو کنید, آن تاریخ‌ها در این سایت Jomres نیز به‌عنوان مسدود (رزروهای سیاه) نشان داده می‌شوند, بنابراین هیچ‌کس نمی‌تواند آن تاریخ‌ها را در اینجا رزرو کند. این جزئیات رزرو را بین سایت‌ها همگام نمی‌کند (مانند جزئیات مهمان, قیمت‌ها, فاکتورها, و غیره) اما این یک راه خوب و آسان برای جلوگیری از رزرو دو برابر با همگام سازی فقط در دسترس بودن است.');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'iCal Sync Settings');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'iCal Feed Settings' );
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'External iCal URL' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'همچنین شامل درخواست رزرو هم می شود؟' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'اگر فعال باشد, شامل رزروهایی می شود که هنوز تأیید نشده اند (اگر ویژگی تأیید رزرو فعال باشد). غیرفعال نگه داشتن این گزینه راهی عالی برای پنهان کردن رزروهایی از تقویم است که احتمالاً در انتظار تأیید هستند. وضعیت تأیید نشده/درخواست');

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'URL راه دور' );
jr_define ('_JOMRES_ICAL_REMOTE_FEED_ROOM_UID' , 'UID Room') ;
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'نام/شماره اتاق 
. توضیحات می تواند شامل تمام جزئیات دیگر باشد.');

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'فید از راه دور Ical ایجاد شد' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'فید از راه دور Ical حذف شد' );