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

jr_define('_JRPORTAL_EXTENDED_MAPS_TITLE',"Mappe estese");
jr_define('_JRPORTAL_EXTENDED_MAPS_HWIDTH',"Larghezza mappa (px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HHEIGHT',"Altezza mappa (px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL',"Livello di zoom della mappa");
jr_define('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST',"Sovrascrivere l'elenco di proprietà predefinito di Jomres? ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HINFOICON',"Icona indicatore di altri eventi/attrazioni ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH',"Larghezza popup (px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH',"Larghezza immagine (px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT',"Altezza immagine (px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION',"Mostra descrizione proprietà? (solo per popup affitti)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION',"Tagliare la descrizione della proprietà? (solo per i popup degli affitti)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE',"Taglia la descrizione della proprietà dopo (caratteri) (solo per i popup degli affitti)");
jr_define('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS',"Marcatori di gruppo");

jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Mostra una mappa con raccolte di proprietà ed eventi/attrazioni locali." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Specifica i tipi di proprietà che vuoi mostrare. Separati da virgole." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Mostra proprietà? Imposta a 0 per evitare che vengano mostrate." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Mostra eventi? Imposta a 0 per evitare che vengano mostrati." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Mostra attrazioni? Imposta a 0 per evitare che vengano mostrate." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "Codice Paese ISO. Usa questa opzione per limitare la mappa a un Paese." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Imposta l'id della regione per limitare i risultati alle proprietà in una regione specifica." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Imposta un nome di città per limitare i risultati alle proprietà in una città specifica." );

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
