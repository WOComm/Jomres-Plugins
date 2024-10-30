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

jr_define('_JRPORTAL_FEED_CREATOR_TITLE' , "خوراک RSS");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"این افزونه یک فید از تمام ویژگی های jomres ایجاد می کند. در حال حاضر فرمت های پیوند RSS 1.0 و RSS 2.0 پشتیبانی می شوند.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME' , "نام فید");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDDESC' , "توضیحات خوراک") ;
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME' , "نام فایل فید (بدون فاصله)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT' , "قالب پیوند");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"زمان کش (بر حسب ثانیه)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL' , "نشانی اینترنتی تصویر فید");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC' , "توضیح مشخصات ملک؟");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"قطع کردن بعد از (نویسه ها)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE' , "نمایش تصویر فید؟");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE' , "نمایش تصویر دارایی؟");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN' , "نمایش شهر ملک؟");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION' , "نمایش منطقه دارایی؟");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY' , "نمایش کشور دارایی؟");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS' , "محدود کردن تعداد دارایی های سندیکایی به");