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


jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Utökade kartor");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Kartbredd (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Karthöjd (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Kartzoomnivå");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Åsidosätta standard Jomres -egendomslista?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Ikon för andra evenemang/attraktioner");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Popup -bredd (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Bildbredd (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Bildhöjd (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Visa fastighetsbeskrivning? (endast för popup -fönster för uthyrning)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', 'Trim property description? (only for rental popups)');
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Trim egenskapsbeskrivning efter (tecken) (endast för uthyrnings popup -fönster)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Gruppmarkörer");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Visar en karta med samlingar av fastigheter och lokala evenemang/attraktioner.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Specific the property types you want to show. Komma separerade.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Visa egenskaper? Ställ in på 0 för att förhindra att de visas.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Visa händelser? Ställ in på 0 för att förhindra att de visas.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Visa attraktioner? Ställ in på 0 för att förhindra att de visas.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO -landskod. Använd det här alternativet för att begränsa kartan till ett land.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Ställ in region -id för att begränsa resultaten till egenskaper i en specifik region.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Ange ett stadsnamn för att begränsa resultaten till fastigheter i en specifik stad.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
