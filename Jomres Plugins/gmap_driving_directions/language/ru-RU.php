<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('_JRPORTAL_GMAPS_DD_YES', "Да");
jr_define ('_JRPORTAL_GMAPS_DD_NO', "Нет");
jr_define ('_GOOGLE_ADDRESS', "Адрес");
jr_define ('_GOOGLE_INPUT_FIELDSET_POSTALCODE', "Почтовый индекс");
jr_define ('_GOOGLE_INPUT_FIELDSET_TOWN', "Город");
jr_define ('_GOOGLE_INITIALIZE_ERROR1', "Достигнуто максимальное количество путевых точек 9");
jr_define ('_GOOGLE_INITIALIZE_ERROR2', "Google не смог рассчитать направления для этого маршрута и выбранных параметров");
jr_define ('_GOOGLE_DIRECTION_PRINT', "Распечатать маршрут");
jr_define ('_GOOGLE_ROUTEPLANNING', "Спланируйте свой маршрут до");
jr_define ('_GOOGLE_ROUTEPLANNING_HYOURLOCATION', "Ваше местоположение (начальная точка маршрута)");
jr_define ('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS', "Параметры маршрута");
jr_define ('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR', "Оптимизировать для");
jr_define ('_GOOGLE_ROUTEPLANNING_HDRIVING', "Вождение");
jr_define ('_GOOGLE_ROUTEPLANNING_HWALKING', "Ходьба");
jr_define ('_GOOGLE_ROUTEPLANNING_HCYCLING', "Велоспорт");
jr_define ('_GOOGLE_ROUTEPLANNING_HHIGHWAYS', "Избегайте шоссе");
jr_define ('_GOOGLE_ROUTEPLANNING_HTOLLS', "Избегайте дорожных сборов");
jr_define ('_GOOGLE_SELECT_BUTTON', "Проложить маршрут");
jr_define ('_GOOGLE_SELECT_RESETMAP', "Сбросить карту");
jr_define ('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS', "Пункт назначения (конечная точка маршрута) уже отмечен на карте. Введите свое местоположение и выберите параметры маршрута, чтобы проложить маршрут к пункту назначения. Вы также можете нажать на карту, чтобы выбрать до 9 путевые точки от начальной точки до конечной. ");