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
jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Kiterjesztett térképek");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Térkép szélessége (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Térképmagasság (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Térkép nagyítási szint");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Felülbírálja az alapértelmezett Jomres tulajdonságlistát?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Egyéb események/látnivalók jelölő ikonja");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Előugró ablak szélessége (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Kép szélessége (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Képmagasság (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Megjeleníteni a tulajdon leírását? (csak a kölcsönzött előugró ablakokhoz)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Bevágja az ingatlanleírást? (csak a bérelt előugró ablakokhoz)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "A tulajdonság leírásának kivágása (karakterek után) (csak a kölcsönzött előugró ablakokhoz)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Csoportjelzők");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Térképet jelenít meg ingatlanok és helyi események/látnivalók gyűjteményeivel.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Adja meg a megjeleníteni kívánt tulajdonságtípusokat. Vesszővel elválasztva.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Tulajdonságok megjelenítése? 0 -ra állítva, hogy ne jelenjenek meg.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Események megjelenítése? 0 -ra állítva, hogy ne jelenjenek meg.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Látnivalók megjelenítése? Állítsa 0 -ra, hogy megakadályozza azok megjelenítését.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO országkód. Ezzel az opcióval korlátozhatja a térképet egy országra.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Állítsa be a régióazonosítót, hogy az eredményeket egy meghatározott régió tulajdonságaira korlátozza.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Állítson be egy városnevet, hogy az eredményeket egy adott város tulajdonságaira korlátozza.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
