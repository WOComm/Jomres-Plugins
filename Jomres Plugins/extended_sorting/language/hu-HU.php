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
jr_define ('_JOMRES_SORTING_PLUGIN_DEFAULT', "Alapértelmezett (nincs sorrend)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME', "Tulajdon neve (növekvő)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME_DESC', "Tulajdon neve (csökkenő)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION', "Régió (növekvő)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION_DESC', "Régió (csökkenő)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN', "Város (emelkedő)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN_DESC', "Város (csökkenő)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS', "Csillagok (növekvő)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS_DESC', "Csillagok (csökkenő)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS', "Legnézettebb (növekvő)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS_DESC', "Legnézettebb (csökkenő)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS', "Vendégek (növekvő)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS_DESC', "Vendégek (csökkenő)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE', "Ár (növekvő)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE_DESC', "Ár (csökkenő)");
jr_define ('_JOMRES_SORTING_PLUGIN_RANDOMIZE', "Randomize");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE', "Hozzáadás dátuma (növekvő)");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE_DESC', "Hozzáadás dátuma (csökkenő)");