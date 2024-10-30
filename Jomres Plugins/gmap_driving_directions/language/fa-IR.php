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

jr_define('_JRPORTAL_GMAPS_DD_YES',"بله");
jr_define ('_JRPORTAL_GMAPS_DD_NO' , "No");
jr_define ('_GOOGLE_ADDRESS' , "آدرس") ;
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE' , "کد پستی");
jr_define ('_GOOGLE_INPUT_FIELDSET_TOWN' , "شهر") ;
jr_define('_GOOGLE_INITIALIZE_ERROR1' , "حداکثر 9 نقطه راه رسیده است");
jr_define('_GOOGLE_INITIALIZE_ERROR2' , "Google نمی تواند مسیرهای این مسیر و گزینه های انتخاب شده را محاسبه کند");
jr_define('_GOOGLE_DIRECTION_PRINT',"چاپ مسیرها");
jr_define('_GOOGLE_ROUTEPLANNING',"مسیر خود را برای رسیدن به  برنامه ریزی کنید.");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION' , "موقعیت مکانی شما (نقطه شروع مسیر)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS' , "گزینه های مسیر");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR' , "بهینه سازی برای");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING' , "رانندگی");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING' , "پیاده روی");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING' , "دوچرخه سواری");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS' , "از بزرگراه ها اجتناب کنید");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS' , "اجتناب از عوارض");
jr_define('_GOOGLE_SELECT_BUTTON' , "دریافت مسیرها");
jr_define('_GOOGLE_SELECT_RESETMAP' , "بازنشانی نقشه");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"مقصد شما (نقطه پایان مسیر) قبلاً روی نقشه مشخص شده است. لطفا مکان خود را وارد کنید و گزینه های مسیر خود را برای دریافت مسیرها به نقطه مقصد انتخاب کنید. همچنین می توانید بر روی نقشه کلیک کنید تا حداکثر 9 نقطه بین راه را از نقطه شروع خود تا نقطه مقصد انتخاب کنید.");