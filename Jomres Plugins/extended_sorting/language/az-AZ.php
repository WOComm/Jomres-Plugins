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
jr_define ('_JOMRES_SORTING_PLUGIN_DEFAULT', "Varsayılan (sifariş yoxdur)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME', "Mülkiyyət Adı (artan)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME_DESC', "Mülkiyyət Adı (azalan)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION', "Region (artan)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION_DESC', "Region (azalan)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN', "Şəhər (artan)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN_DESC', "Şəhər (azalan)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS', "Ulduzlar (yüksələn)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS_DESC', "Ulduzlar (azalan)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS', "Ən çox baxılan (artan)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS_DESC', "Ən çox baxılan (azalan)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS', "Qonaqlar (artan)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS_DESC', "Qonaqlar (azalan)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE', "Qiymət (artan)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE_DESC', "Qiymət (azalan)");
jr_define ('_JOMRES_SORTING_PLUGIN_RANDOMIZE', "Təsadüfi");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE', "Əlavə edilən tarix (artan)");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE_DESC', "Əlavə edilən tarix (azalan)");