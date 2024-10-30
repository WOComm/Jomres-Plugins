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



jr_define ('_JOMRES_SORTING_PLUGIN_DEFAULT', "Privzeto (brez naročanja)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME', "Ime lastnosti (naraščajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME_DESC', "Ime lastnosti (padajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION', "Regija (naraščajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION_DESC', "Regija (padajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN', "Mesto (naraščajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN_DESC', "Mesto (padajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS', "Zvezde (naraščajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS_DESC', "Zvezde (padajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS', "Najbolj gledano (naraščajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS_DESC', "Najbolj gledano (padajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS', "Gostje (naraščajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS_DESC', "Gostje (padajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE', "Cena (naraščajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE_DESC', "Cena (padajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_RANDOMIZE', "Naključno");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE', "Datum dodajanja (naraščajoče)");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE_DESC', "Datum dodajanja (padajoče)");