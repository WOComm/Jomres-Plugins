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
jr_define('_JRPORTAL_LOCAL_EVENTS_TITLE',"Què està passant?");
jr_define('_JRPORTAL_LOCAL_EVENTS_NOTES'," ");
jr_define('_JRPORTAL_LOCAL_EVENTS_EVENT_TITLE',"Nom de l'esdeveniment");
jr_define('_JRPORTAL_LOCAL_EVENTS_STARTDATE',"Data d'inici");
jr_define ('_JRPORTAL_LOCAL_EVENTS_ENDDATE', "Data de finalització");
jr_define('_JRPORTAL_LOCAL_EVENTS_LATITUDE',"Latitud");
jr_define ('_JRPORTAL_LOCAL_EVENTS_LONGITUDE', "Longitud");
jr_define('_JRPORTAL_LOCAL_EVENTS_WEBSITEURL',"L'URL del lloc");
jr_define('_JRPORTAL_LOCAL_EVENTS_EVENTLOGORELPATH',"El camí relatiu al logotip de l'esdeveniment, si està disponible. Per exemple, www.event.com/logo.png (sense https://) ");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_TITLE',"Què cal fer localment");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_NOTES'," ");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTION_TITLE',"Nom de l'atracció");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ICON',"Icona");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_LATITUDE', "Latitud");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_LONGITUD',"Longitud");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_WEBSITEURL', "URL del lloc");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTIONLOGORELPATH',"El camí relatiu al logotip de l'atracció, si està disponible. Per exemple, www.attraction.com/logo.png (sense https://) ");
jr_define('_JRPORTAL_LOCAL_EVENTS_EDIT',"Edita l'esdeveniment local");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_EDIT',"Edita l'atracció local");

jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_TITLE',"Esdeveniments i atraccions locals");
jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS',"Límit de radi (en quilòmetres)");
jr_define ('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS_DESC', "Es mostraran esdeveniments i atraccions locals a sota dels detalls de la propietat. Definiu aquí el radi per limitar els esdeveniments que es mostren a aquells dins d'un interval específic.");