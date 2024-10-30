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

jr_define('_CLONE_TARIFFS_TITLE',"Clone Tariffs");
jr_define('_CLONE_TARIFFS_INFO',"در اینجا می‌توانید تعرفه‌ای را از یک ویژگی هدف به یک ویژگی منبع شبیه‌سازی کنید. فقط ویژگی‌هایی که اختیار مدیر را دارید در دسترس شما خواهند بود.");
jr_define('_CLONE_TARIFFS_SOURCE',"ویژگی منبع");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"تعرفه برای شبیه سازی");
jr_define('_CLONE_TARIFFS_TARGET',"مشخصات هدف");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"نوع اتاق دارایی مورد نظر");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"اگر حالت ویرایش تعرفه ویژگی Target با حالت ویرایش تعرفه ویژگی Source متفاوت است، هنگامی که شبیه سازی انجام می شود، تعرفه های اصلی ویژگی Target حذف می شود و حالت ویرایش تعرفه منبع تغییر می کند تا منعکس کننده آن حالت باشد. تنظیمات دارایی.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"حذف تعرفه های موجود در ویژگی Target؟");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"اگر حالت ویرایش تعرفه خاصیت هدف مانند خاصیت Source باشد، تعرفه های موجود حذف نخواهند شد. با این حال، می توانید با تنظیم این گزینه روی بله، این مورد را لغو کنید.");