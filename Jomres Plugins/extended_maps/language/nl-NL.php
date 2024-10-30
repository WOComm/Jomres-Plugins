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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################




jr_define('_JRPORTAL_EXTENDED_MAPS_TITLE',"Uitgebreide kaarten");
jr_define('_JRPORTAL_EXTENDED_MAPS_HWIDTH',"Kaartbreedte (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HHEIGHT',"Kaarthoogte (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL',"Zoomniveau kaart ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST',"Standaard Jomres-eigenschappenlijst overschrijven? ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HINFOICON',"Markeringspictogram voor andere evenementen/attracties ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH',"Pop-upbreedte (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH',"Beeldbreedte (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT',"Afbeeldingshoogte (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION',"Beschrijving van eigendom weergeven? (alleen voor pop-ups van verhuur)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION',"Trim eigenschap beschrijving? (alleen voor verhuur pop-ups)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE',"Trim eigenschap beschrijving na (tekens) (alleen voor verhuur pop-ups)");
jr_define('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS',"Groepsmarkeringen");

jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Geeft een kaart weer met verzamelingen eigendommen en lokale evenementen/attracties." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Specifiek de eigenschapstypen die u wilt weergeven. Door komma's gescheiden." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Toon eigenschappen? Zet op 0 om te voorkomen dat ze worden getoond." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Toon gebeurtenissen? Zet op 0 om te voorkomen dat ze worden getoond." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Toon attracties? Zet op 0 om te voorkomen dat ze worden getoond." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO-landcode. Gebruik deze optie om de kaart tot één land te beperken." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Stel de regio-ID in om de resultaten te beperken tot eigenschappen in een specifieke regio." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Stel een plaatsnaam in om de resultaten te beperken tot eigenschappen in een specifieke plaats." );

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
