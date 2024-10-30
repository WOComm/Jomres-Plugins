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

jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Paplašinātās kartes");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Kartes platums (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Kartes augstums (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Kartes tālummaiņas līmenis");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Vai ignorēt noklusējuma Jomres īpašumu sarakstu?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Citu notikumu/atrakciju marķiera ikona");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Uznirstošo logu platums (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Attēla platums (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Attēla augstums (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Parādīt īpašuma aprakstu? (tikai īres uznirstošajiem logiem)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Vai apgriezt īpašuma aprakstu? (tikai īres uznirstošajiem logiem)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Apgriezt īpašuma aprakstu pēc (rakstzīmes) (tikai īres uznirstošajiem logiem)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Grupas marķieri");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Parāda karti ar īpašumu un vietējo notikumu/atrakciju kolekcijām.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Norādiet īpašumu veidus, kurus vēlaties parādīt. Atdalot ar komatu.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Rādīt rekvizītus? Iestatiet 0, lai tie netiktu rādīti.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Rādīt notikumus? Iestatiet 0, lai novērstu to parādīšanu.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Rādīt atrakcijas? Iestatiet 0, lai tās netiktu rādītas.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO valsts kods. Izmantojiet šo opciju, lai ierobežotu karti tikai vienā valstī.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Iestatiet reģiona ID, lai rezultāti tiktu ierobežoti līdz īpašumiem noteiktā reģionā.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Iestatiet pilsētas nosaukumu, lai rezultāti tiktu ierobežoti līdz īpašumiem konkrētā pilsētā.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
