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


jr_define ('_JOMRES_SORTING_PLUGIN_DEFAULT', "Implicit (fără comandă)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME', "Nume proprietate (crescător)");
jr_define ('_JOMRES_SORTING_PLUGIN_PROPERTYNAME_DESC', "Nume proprietate (descendent)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION', "Regiune (crescătoare)");
jr_define ('_JOMRES_SORTING_PLUGIN_REGION_DESC', "Regiune (descrescătoare)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN', "Oraș (crescător)");
jr_define ('_JOMRES_SORTING_PLUGIN_TOWN_DESC', "Oraș (descendent)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS', "Stele (crescătoare)");
jr_define ('_JOMRES_SORTING_PLUGIN_STARS_DESC', "Stele (descrescătoare)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS', "Cele mai vizualizate (crescătoare)");
jr_define ('_JOMRES_SORTING_PLUGIN_MOST_POPULAR_CLICKS_DESC', "Cele mai vizualizate (descrescătoare)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS', "Invitați (ascendent)");
jr_define ('_JOMRES_SORTING_PLUGIN_GUESTS_DESC', "Invitați (descendent)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE', "Preț (crescător)");
jr_define ('_JOMRES_SORTING_PLUGIN_PRICE_DESC', "Preț (descrescător)");
jr_define ('_JOMRES_SORTING_PLUGIN_RANDOMIZE', "Randomize");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE', "Data adăugării (crescătoare)");
jr_define ('_JOMRES_SORTING_PLUGIN_LISTING_AGE_DESC', "Data adăugării (descrescătoare)");