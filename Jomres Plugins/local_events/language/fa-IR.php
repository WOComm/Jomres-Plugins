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

jr_define('_JRPORTAL_LOCAL_EVENTS_TITLE',"چه اتفاقی می افتد؟");
jr_define ('_JRPORTAL_LOCAL_EVENTS_NOTES' , "") ;
jr_define('_JRPORTAL_LOCAL_EVENTS_EVENT_TITLE',"نام رویداد");
jr_define ('_JRPORTAL_LOCAL_EVENTS_STARTDATE' , "تاریخ شروع") ;
jr_define('_JRPORTAL_LOCAL_EVENTS_ENDDATE',"تاریخ پایان");
jr_define('_JRPORTAL_LOCAL_EVENTS_LATITUDE',"Latitude");
jr_define('_JRPORTAL_LOCAL_EVENTS_LONGITUDE',"طول جغرافیایی");
jr_define('_JRPORTAL_LOCAL_EVENTS_WEBSITEURL',"URL سایت");
jr_define('_JRPORTAL_LOCAL_EVENTS_EVENTLOGORELPATH',"مسیر نسبی به لوگوی رویداد, در صورت وجود. به عنوان مثال www.event.com/logo.png (بدون https://) ");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_TITLE',"چه باید به صورت محلی انجام داد");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_NOTES'," ");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTION_TITLE',"نام جاذبه");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_ICON' , "نماد") ;
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_LATITUDE',"Latitude");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_LONGITUDE' , "طول جغرافیایی") ;
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_WEBSITEURL',"URL سایت");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTIONLOGORELPATH',"مسیر نسبی به آرم جاذبه, در صورت وجود. به عنوان مثال www.attraction.com/logo.png (بدون https://)");
jr_define ('_JRPORTAL_LOCAL_EVENTS_EDIT' , "ویرایش رویداد محلی") ;
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_EDIT',"ویرایش جاذبه های محلی");

jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_TITLE',"رویدادها و جاذبه های محلی");
jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS',"محدودیت شعاع (بر حسب کیلومتر)");
jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS_DESC',"رویدادها و جاذبه‌های محلی در زیر جزئیات ملک نشان داده می‌شوند. در اینجا شعاع را برای محدود کردن رویدادهای نشان‌داده‌شده به رویدادهایی که در محدوده خاصی هستند, تعریف کنید.");