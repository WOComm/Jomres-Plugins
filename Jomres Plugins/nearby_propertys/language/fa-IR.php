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

jr_define('_JRPORTAL_NEARBY_PROPERTYS_TITLE',"خواص نزدیک");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_TITLE_FRONTEND',"خواص نزدیک");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_HRADIUS',"شعاع");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_HLISTLIMIT',"حداکثر تعداد ویژگی های نزدیک برای نمایش ");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_HPTYPE_ENABLED',"فقط دارایی هایی را با همان نوع ویژگی با ویژگی مشاهده شده در حال حاضر نشان دهید؟ ");
jr_define ('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE' , "تقریباً") ;
jr_define('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_KM',"km");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_DISTANCE_MILES',"مایل");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_INSTRUCTIONS',"قبل از استفاده از این افزونه, باید مطمئن شوید که مختصات طول و عرض جغرافیایی را برای همه ویژگی ها وارد کرده اید. اگر نمی خواهید Google Maps را فعال کنید, فقط کافی است مختصات زیرا از آنها برای جستجوی ویژگی های نزدیک در شعاع انتخابی شما و محاسبه فاصله از ویژگی فعلی (ویژگی که در حال حاضر مشاهده می شود) استفاده می شود.");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY',"ملاک دیگری در این نزدیکی وجود ندارد.");
jr_define('_JRPORTAL_NEARBY_PROPERTYS_NOTHINGNEARBY2'," در ");