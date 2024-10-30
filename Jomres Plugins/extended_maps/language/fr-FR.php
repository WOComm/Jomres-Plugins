<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 25/06/2019 - https://www.valtari.fr
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JRPORTAL_EXTENDED_MAPS_TITLE',"Cartes étendues");
jr_define('_JRPORTAL_EXTENDED_MAPS_HWIDTH',"Largeur de la carte (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HHEIGHT',"Hauteur de la carte (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL',"Niveau de zoom de la carte ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST',"Remplacer la liste d'établissement par défaut de Jomres ? ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HINFOICON',"Autres icônes de marqueurs d'événements /ou d'attractions ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH',"Largeur de la popup (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH',"Largeur de l'image (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT',"Hauteur de l'image (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION',"Afficher la description de l'établissement ? (uniquement pour les popups affichant des locations)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION',"Description succincte de l'établissement ? (uniquement pour les popups affichant des locations)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE',"Description succincte de l'établissement ensuite (caractères) (uniquement pour les popups affichant des locations)");
jr_define('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS',"Marqueurs de groupe");

jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Affiche une carte avec des marqueurs d'établissements et d’événements ou d' attractions locaux." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Spécifiez les types d'établissement que vous souhaitez afficher. Séparées par des virgules." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Afficher les établissements ? Définissez la valeur sur 0 pour ne pas les afficher." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Afficher les événements ? Définissez la valeur sur 0 pour ne pas les afficher." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Afficher les attractions ? Définissez la valeur sur 0 pour ne pas les afficher." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "Code ISO de pays. Utilisez cette option pour limiter la carte à un pays." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Renseigner l'ID de région pour limiter les résultats aux établissement d'une région spécifique." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Renseigner un nom de ville pour limiter les résultats aux établissements d'une ville spécifique." );

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");

