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

jr_define ('_JOMRES_SORTING_PLUGIN_DEFAULT', "По подразбиране (без подреждане)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME', "Име на собствеността (възходящо)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME_DESC', "Име на имота (низходящо)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION', "Регион (възходящ)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION_DESC', "Регион (низходящ)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN', "Град (възходящ)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN_DESC', "Град (низходящ)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS', "Звезди (възходящо)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS_DESC', "Звезди (низходящо)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS', "Най -гледани (възходящ)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS_DESC', "Най -гледаните (низходящи)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS', "Гости (възходящ)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS_DESC', "Гости (низходящ)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE', "Цена (възходящ)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE_DESC', "Цена (низходяща)");
jr_define ('_JOMRES_SORTING_PLUGIN_RANDOMIZE', "На случаен принцип");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE', "Дата на добавяне (възходящ)");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE_DESC', "Добавена дата (низходяща)");