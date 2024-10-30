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

jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Rozšírené mapy");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Šírka mapy (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Výška mapy (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Úroveň priblíženia mapy");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Chcete prepísať predvolený zoznam vlastností Jomres?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "ikona značky iných udalostí/atrakcií");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Šírka vyskakovacieho okna (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Šírka obrázku (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Výška obrázku (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Zobraziť popis nehnuteľnosti? (iba pre vyskakovacie okná na prenájom)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Orezať popis nehnuteľnosti? (iba pre vyskakovacie okná na prenájom)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Orezať popis vlastnosti po (znakoch) (iba pre vyskakovacie okná na prenájom)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Skupinové značky");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Zobrazí mapu so zbierkami nehnuteľností a miestnych udalostí/atrakcií.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Špecifické typy vlastností, ktoré chcete zobraziť. Čiarkami oddelené.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Zobraziť vlastnosti? Nastaviť na 0, aby sa zabránilo ich zobrazovaniu.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Zobraziť udalosti? Nastavením na 0 zabránite ich zobrazovaniu.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Zobraziť atrakcie? Nastavením na 0 zabránite ich zobrazovaniu.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "kód krajiny ISO. Túto možnosť použite na obmedzenie mapy na jednu krajinu.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Nastavte ID oblasti na obmedzenie výsledkov na vlastnosti v konkrétnej oblasti.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Nastaviť názov mesta, aby sa výsledky obmedzili na vlastnosti v konkrétnom meste.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
