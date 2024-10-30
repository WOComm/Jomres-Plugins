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


jr_define ('_JOMRES_SORTING_PLUGIN_DEFAULT', "Standard (ingen bestilling)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME', "Ejendomsnavn (stigende)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME_DESC', "Ejendomsnavn (faldende)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION', "Region (stigende)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION_DESC', "Region (faldende)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN', "By (stigende)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN_DESC', "By (faldende)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS', "Stjerner (stigende)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS_DESC', "Stjerner (faldende)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS', "Mest set (stigende)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS_DESC', "Mest set (faldende)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS', "Gæster (stigende)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS_DESC', "Gæster (faldende)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE', "Pris (stigende)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE_DESC', "Pris (faldende)");
jr_define ('_JOMRES_SORTING_PLUGIN_RANDOMIZE', "Randomize");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE', "Tilføjet dato (stigende)");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE_DESC', "Tilføjet dato (faldende)");