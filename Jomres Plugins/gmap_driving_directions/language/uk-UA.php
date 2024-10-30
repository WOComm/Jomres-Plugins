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

jr_define('_JRPORTAL_GMAPS_DD_YES',"Так");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Ні");
jr_define ('_GOOGLE_ADDRESS', "Адреса");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"Поштовий індекс");
jr_define ('_GOOGLE_INPUT_FIELDSET_TOWN', "Місто");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Досягнута максимальна кількість 9 точок");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google не зміг розрахувати маршрути для цього маршруту та вибраних параметрів");
jr_define('_GOOGLE_DIRECTION_PRINT',"Друк маршрутів");
jr_define('_GOOGLE_ROUTEPLANNING',"Сплануйте свій маршрут до ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Ваше місцезнаходження (початкова точка маршруту)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Параметри маршруту");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Оптимізувати для");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"За кермом");
jr_define ('_GOOGLE_ROUTEPLANNING_HWALKING', "Ходьба");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Велоспорт");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Уникайте автомагістралей");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Уникати плати за проїзд");
jr_define('_GOOGLE_SELECT_BUTTON',"Отримати маршрут");
jr_define('_GOOGLE_SELECT_RESETMAP',"Скинути карту");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Ваш пункт призначення (кінцева точка маршруту) вже позначено на карті. Будь ласка, введіть своє місцезнаходження та виберіть варіанти маршруту, щоб отримати маршрути до пункту призначення. Ви також можете натиснути на карту, щоб вибрати до 9 шляхові точки від початкової точки до пункту призначення.");