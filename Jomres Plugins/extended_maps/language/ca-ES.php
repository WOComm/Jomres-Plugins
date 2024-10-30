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
jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Mapes ampliats");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Amplada del mapa (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Alçada del mapa (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Nivell de zoom del mapa");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Anul·lar la llista de propietaris Jomres predeterminada?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Icona del marcador d'altres esdeveniments / atraccions");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Amplada emergent (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Amplada de la imatge (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Alçada de la imatge (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Mostrar la descripció de la propietat? (només per a finestres emergents de lloguer)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Voleu retallar la descripció de la propietat? (només per a finestres emergents de lloguer)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Retalla la descripció de la propietat després (caràcters) (només per a finestres emergents de lloguer)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Marcadors de grup");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Mostra un mapa amb col·leccions de propietats i esdeveniments / atraccions locals");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Especifiqueu els tipus de propietats que voleu mostrar. Separats per comes.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Mostra les propietats? Estableix a 0 per evitar que es mostrin.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Mostra esdeveniments? Estableix a 0 per evitar que es mostrin.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Mostrar atraccions? Estableix a 0 per evitar que es mostrin.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "Codi de país ISO. Utilitzeu aquesta opció per limitar el mapa a un país.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Estableix l'identificador de la regió per limitar els resultats a les propietats d'una regió específica.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Estableix un nom de ciutat per limitar els resultats a les propietats d'una ciutat específica.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");