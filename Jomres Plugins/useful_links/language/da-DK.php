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


jr_define('USEFUL_LINKS_MODULE_TITLE',"Nyttige links til ");
jr_define('USEFUL_LINKS_FORSALE',"Ejendomme til salg i ");
jr_define('USEFUL_LINKS_HOTELS',"Hoteller/Bed & Breakfast i ");
jr_define('USEFUL_LINKS_VILLAS',"Feriehuse til leje i ");
jr_define('USEFUL_LINKS_WIKIPEDIA',"Information om ");

jr_define('USEFUL_LINKS_ADMIN',"Nyttige links");
jr_define('USEFUL_LINKS_ADMIN_PROPERTIESFORSALE',"Ejendomstype-id");
jr_define('USEFUL_LINKS_ADMIN_HOTELS',"Hotel/B&B ejendomstype-id");
jr_define('USEFUL_LINKS_ADMIN_VILLAS',"Feriehuse ejendomstype-id");

jr_define( '_JOMRES_SHORTCODES_06000USEFULLINKS', 'Dette plugin er designet til at vise links til specifikke søgninger, hvis url\'en inkluderer "land", "region" eller "by", så typisk vil du gerne placere det i en sidebar eller modul/widget-position på øverst på siden. Du skal først konfigurere plugin\'et i fanen Webstedskonfiguration > Nyttige links for at angive ejendomstype-id\'erne for hoteller, fast ejendom og lejlighed/hytte/villaer. ' );