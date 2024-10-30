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

jr_define('_JRPORTAL_GMAPS_DD_YES',"Да");
jr_define ('_JRPORTAL_GMAPS_DD_NO', "Не");
jr_define('_GOOGLE_ADDRESS',"Адрес");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"Пощенски код");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"Град");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Достигнат максимален брой от 9 точки");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google не можа да изчисли упътвания за този маршрут и избрани опции");
jr_define('_GOOGLE_DIRECTION_PRINT',"Отпечатване на упътвания");
jr_define('_GOOGLE_ROUTEPLANNING',"Планирайте маршрута си до ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Вашето местоположение (начална точка на маршрута)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Опции за маршрут");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"Оптимизиране за");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Шофиране");
jr_define ('_GOOGLE_ROUTEPLANNING_HWALKING', "Ходене");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Колоездене");
jr_define ('_GOOGLE_ROUTEPLANNING_HHIGHWAYS', "Избягване на магистрали");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Избягвайте пътните такси");
jr_define('_GOOGLE_SELECT_BUTTON',"Вземете упътвания");
jr_define('_GOOGLE_SELECT_RESETMAP',"Нулиране на картата");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Вашата дестинация (крайна точка на маршрута) вече е маркирана на картата. Моля, въведете местоположението си и изберете опциите си за маршрут, за да получите упътвания до точката на дестинация. Можете също да щракнете върху картата, за да изберете до 9 точки от вашата начална точка до крайната точка.");