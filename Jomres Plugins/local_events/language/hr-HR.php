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

jr_define ('_JRPORTAL_LOCAL_EVENTS_TITLE', "Što se događa?");
jr_define('_JRPORTAL_LOCAL_EVENTS_NOTES'," ");
jr_define('_JRPORTAL_LOCAL_EVENTS_EVENT_TITLE',"Naziv događaja");
jr_define('_JRPORTAL_LOCAL_EVENTS_STARTDATE',"Datum početka");
jr_define ('_JRPORTAL_LOCAL_EVENTS_ENDDATE', "Datum završetka");
jr_define ('_JRPORTAL_LOCAL_EVENTS_LATITUDE', "Latitude");
jr_define('_JRPORTAL_LOCAL_EVENTS_LONGITUDE',"Dužina");
jr_define('_JRPORTAL_LOCAL_EVENTS_WEBSITEURL',"URL stranice");
jr_define('_JRPORTAL_LOCAL_EVENTS_EVENTLOGORELPATH',"Relativni put do logotipa događaja, ako je dostupan. Npr. www.event.com/logo.png (bez https://) ");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_TITLE', "Što učiniti lokalno");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_NOTES'," ");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTION_TITLE',"Naziv atrakcije");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ICON',"Ikona");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_LATITUDE',"Latitude");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_LONGITUDE',"Dužina");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_WEBSITEURL',"URL stranice");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTIONLOGORELPATH',"Relativni put do logotipa atrakcije, ako je dostupan. Npr. www.attraction.com/logo.png (bez https://) ");
jr_define ('_JRPORTAL_LOCAL_EVENTS_EDIT', "Uređivanje lokalnog događaja");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_EDIT',"Uredi lokalnu atrakciju");

jr_define ('_JRPORTAL_LOCAL_EVENTS_SETTINGS_TITLE', "Lokalni događaji i atrakcije");
jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS',"Ograničenje radijusa (u kilometrima)");
jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS_DESC',"Lokalni događaji i atrakcije bit će prikazani ispod detalja svojstva. Ovdje definirajte radijus kako biste ograničili prikazane događaje na one unutar određenog raspona.");