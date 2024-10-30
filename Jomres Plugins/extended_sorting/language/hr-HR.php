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

jr_define ('_JOMRES_SORTING_PLUGIN_DEFAULT', "Zadano (bez naručivanja)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME', "Naziv svojstva (uzlazno)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME_DESC', "Naziv nekretnine (silazno)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION', "Regija (uzlazno)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION_DESC', "Regija (opadajuće)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN', "Grad (uzlazno)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN_DESC', "Grad (silazno)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS', "Zvijezde (uzlazno)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS_DESC', "Zvijezde (silazno)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS', "Najgledanije (uzlazno)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS_DESC', "Najgledanije (silazno)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS', "Gosti (uzlazno)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS_DESC', "Gosti (silazno)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE', "Cijena (uzlazno)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE_DESC', "Cijena (silazna)");
jr_define ('_JOMRES_SORTING_PLUGIN_RANDOMIZE', "Randomize");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE', "Datum dodavanja (uzlazno)");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE_DESC', "Datum dodavanja (silazno)");