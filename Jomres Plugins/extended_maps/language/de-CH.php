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
jr_define('_JRPORTAL_EXTENDED_MAPS_TITLE',"Erweiterte Karten");
jr_define('_JRPORTAL_EXTENDED_MAPS_HWIDTH',"Kartenbreite (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HHEIGHT',"Kartenhöhe (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL',"Kartenzoomstufe ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST',"Standard-Eigenschaftsliste von Jomres überschreiben? ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HINFOICON',"Andere Ereignisse/Attraktionen-Markersymbol ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH',"Popup-Breite (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH',"Bildbreite (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT',"Bildhöhe (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION',"Eigenschaftsbeschreibung anzeigen? (nur für Vermietungs-Popups)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION',"Eigenschaftsbeschreibung trimmen? (nur für Vermietungs-Popups)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE',"Eigenschaftsbeschreibung nach (Zeichen) trimmen (nur für Vermietungs-Popups)");
jr_define('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS',"Gruppenmarkierungen");

jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Zeigt eine Karte mit Sammlungen von Eigenschaften und lokalen Ereignissen/Attraktionen an.");
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Geben Sie die anzuzeigenden Eigenschaftstypen an. Kommas getrennt." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Eigenschaften anzeigen? Auf 0 setzen, damit sie nicht angezeigt werden." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Ereignisse anzeigen? Auf 0 setzen, damit sie nicht angezeigt werden." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Attraktionen anzeigen? Auf 0 setzen, damit sie nicht angezeigt werden." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO-Ländercode. Verwenden Sie diese Option, um die Karte auf ein Land zu beschränken." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Legen Sie die Regions-ID fest, um die Ergebnisse auf Eigenschaften in einer bestimmten Region zu beschränken." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Legen Sie einen Stadtnamen fest, um die Ergebnisse auf Immobilien in einer bestimmten Stadt zu beschränken." );

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");