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


jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Udvidede kort");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Kortbredde (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Korthøjde (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Kort zoomniveau");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Tilsidesæt standard Jomres ejendomsfortegnelse?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Andre begivenheder/attraktionsmarkørikon");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Popup -bredde (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Billedbredde (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Billedhøjde (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Vis ejendomsbeskrivelse? (kun for popup -vinduer til leje)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Beskær ejendomsbeskrivelse? (kun for popup -vinduer til leje)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Beskær ejendomsbeskrivelse efter (tegn) (kun for popup -vinduer til leje)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Gruppemarkører");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Viser et kort med samlinger af ejendomme og lokale begivenheder/attraktioner.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Specificer de egenskabstyper, du vil vise. Kommasepareret.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Vis egenskaber? Indstil til 0 for at forhindre dem i at blive vist.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Vis begivenheder? Indstil til 0 for at forhindre dem i at blive vist.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Vis attraktioner? Indstil til 0 for at forhindre dem i at blive vist.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO -landekode. Brug denne indstilling til at begrænse kortet til ét land.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Indstil region -id til at begrænse resultaterne til egenskaber i et specifikt område.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Angiv et bynavn for at begrænse resultaterne til ejendomme i en bestemt by.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
