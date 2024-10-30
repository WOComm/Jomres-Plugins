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

jr_define('_JRPORTAL_EXTENDED_MAPS_TITLE',"Extended Maps");
jr_define('_JRPORTAL_EXTENDED_MAPS_HWIDTH',"Map width (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HHEIGHT',"Map height (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL',"Map zoom level ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST',"Override default Jomres propertylist? ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HINFOICON',"Other events/attractions marker icon ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH',"Popup width (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH',"Image width (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT',"Image height (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION',"Display property description? (only for rentals popups)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION',"Trim property description? (only for rentals popups)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE',"Trim property description after (chars) (only for rentals popups)");
jr_define('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS',"Group markers");

jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Displays a map with collections of properties and local events/attractions." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Specific the property types you want to show. Comma separated." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Show properties? Set to 0 to prevent them from being shown." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Show events? Set to 0 to prevent them from being shown." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Show attractions? Set to 0 to prevent them from being shown." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO country code. Use this option to limit the map to one country." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Set the region id to limit the results to properties in a specifc region." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Set a town name to limit the results to properties in a specific town." );

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");

