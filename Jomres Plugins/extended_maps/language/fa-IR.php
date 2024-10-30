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

jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE' , "نقشه های گسترده") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH' , "عرض نقشه (پیکسل)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT' , "ارتفاع نقشه (پیکسل)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL' , "سطح زوم نقشه") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST' , "مالکیت پیش فرض Jomres را نادیده بگیرید؟");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON' , "نماد نشانگر سایر رویدادها/جاذبه ها") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH' , "عرض پنجره (پیکسل)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH' , "عرض تصویر (پیکسل)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT' , "ارتفاع تصویر (پیکسل)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION' , "نمایش مشخصات ملک؟ (فقط برای پنجره های اجاره ای)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION' , "شرح ویژگی ملک را کوتاه کنید؟ (فقط برای پنجره های اجاره ای)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE' , "کوتاه کردن توصیف ملک بعد از (chars) (فقط برای پنجره های اجاره ای)") ;
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS' , "نشانگرهای گروه") ;

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS' , "نقشه ای را با مجموعه ای از املاک و رویدادها/جاذبه های محلی نمایش می دهد.") ;
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS' , "انواع ویژگی هایی را که می خواهید نشان دهید مشخص کنید. کاما جدا شده است.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES' , "نمایش ویژگی ها؟ برای جلوگیری از نمایش آنها روی 0 تنظیم کنید.") ;
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS' , "نمایش رویدادها؟ برای جلوگیری از نمایش آنها روی 0 تنظیم کنید.") ;
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS' , "نمایش جاذبه ها؟ برای جلوگیری از نمایش آنها روی 0 تنظیم کنید");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY' , "کد کشور ISO. از این گزینه برای محدود کردن نقشه به یک کشور استفاده کنید.") ;
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION' , "شناسه منطقه را طوری تنظیم کنید که نتایج را به خواص یک منطقه خاص محدود کند.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN' , "نام شهر را تنظیم کنید تا نتایج را به ویژگی های یک شهر خاص محدود کند.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
