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

jr_define ('_JOMRES_SORTING_PLUGIN_DEFAULT', "Predvolené (bez objednávania)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME', "Názov nehnuteľnosti (vzostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME_DESC', "Názov nehnuteľnosti (zostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION', "Región (vzostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION_DESC', "Región (zostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN', "Mesto (vzostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN_DESC', "Mesto (zostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS', "Hviezdy (vzostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS_DESC', "Hviezdy (zostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS', "Najsledovanejšie (vzostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS_DESC', "Najsledovanejšie (zostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS', "Hostia (vzostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS_DESC', "Hostia (zostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE', "Cena (vzostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE_DESC', "Cena (zostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_RANDOMIZE', "Randomize");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE', "Dátum pridania (vzostupne)");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE_DESC', "Dátum pridania (zostupne)");