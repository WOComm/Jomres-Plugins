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
jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Utvidede kart");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Kartbredde (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Karthøyde (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Kart zoom -nivå");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Override default Jomres propertyylist?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Andre hendelser/attraksjoner markørikon");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Popup -bredde (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Bildebredde (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Bildehøyde (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Display property description? (only for rental popups)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Trim property description? (only for rental popups)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Trim eiendomsbeskrivelse etter (tegn) (bare for utleie -popup -vinduer)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Gruppemarkører");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Viser et kart med samlinger av eiendommer og lokale hendelser/attraksjoner.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Spesifiser egenskapstypene du vil vise. Kommaseparert.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Vis egenskaper? Sett til 0 for å forhindre at de vises.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Vis hendelser? Sett til 0 for å forhindre at de vises.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Vis attraksjoner? Sett til 0 for å forhindre at de vises.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO -landskode. Bruk dette alternativet for å begrense kartet til ett land.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Angi region -ID for å begrense resultatene til egenskaper i en spesifikk region.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Angi et bynavn for å begrense resultatene til eiendommer i en bestemt by.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
