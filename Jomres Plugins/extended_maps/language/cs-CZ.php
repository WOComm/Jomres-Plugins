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
jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Rozšířené mapy");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Šířka mapy (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Výška mapy (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Úroveň přiblížení mapy");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Přepsat výchozí seznam vlastností Jomres?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "ikona značky jiných akcí/atrakcí");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "šířka vyskakovacího okna (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Šířka obrázku (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Výška obrázku (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Zobrazit popis nemovitosti? (pouze pro vyskakovací okna k pronájmu)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Oříznout popis nemovitosti? (pouze pro vyskakovací okna k pronájmu)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Oříznout popis vlastnosti po (znaky) (pouze u vyskakovacích oken)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Group markers");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Zobrazí mapu se sbírkami nemovitostí a místních událostí/atrakcí.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Specifické typy vlastností, které chcete zobrazit. Oddělené čárkou.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Zobrazit vlastnosti? Nastavením na 0 zabráníte jejich zobrazení.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Zobrazit události? Nastavením na 0 zabráníte jejich zobrazování.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Zobrazit atrakce? Nastavením na 0 zabráníte jejich zobrazení.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "kód země ISO. Pomocí této možnosti omezte mapu na jednu zemi.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Nastavte ID oblasti, abyste omezili výsledky na vlastnosti v konkrétní oblasti.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Nastavit název města a omezit výsledky na vlastnosti v konkrétním městě.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");