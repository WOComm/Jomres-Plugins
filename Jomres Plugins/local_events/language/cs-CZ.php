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
jr_define('_JRPORTAL_LOCAL_EVENTS_TITLE',"Co se děje?");
jr_define('_JRPORTAL_LOCAL_EVENTS_NOTES'," ");
jr_define('_JRPORTAL_LOCAL_EVENTS_EVENT_TITLE',"Název události");
jr_define('_JRPORTAL_LOCAL_EVENTS_STARTDATE',"Datum zahájení");
jr_define ('_JRPORTAL_LOCAL_EVENTS_ENDDATE', "Datum ukončení");
jr_define('_JRPORTAL_LOCAL_EVENTS_LATITUDE',"zeměpisná šířka");
jr_define('_JRPORTAL_LOCAL_EVENTS_LONGITUDE',"Zeměpisná délka");
jr_define('_JRPORTAL_LOCAL_EVENTS_WEBSITEURL',"Adresa URL webu");
jr_define('_JRPORTAL_LOCAL_EVENTS_EVENTLOGORELPATH',"Relativní cesta k logu události, je-li k dispozici. Např. www.event.com/logo.png (bez https://) ");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_TITLE',"Co dělat lokálně");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_NOTES'," ");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTION_TITLE',"Název atrakce");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ICON',"Ikona");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_LATITUDE',"zeměpisná šířka");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_LONGITUDE', "zeměpisná délka");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_WEBSITEURL',"Adresa URL webu");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTIONLOGORELPATH',"Relativní cesta k logu atrakce, je-li k dispozici. Např. www.attraction.com/logo.png (bez https://) ");
jr_define ('_JRPORTAL_LOCAL_EVENTS_EDIT', "Upravit místní událost");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_EDIT', "Upravit místní atrakci");

jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_TITLE',"Místní události a atrakce");
jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS',"Limit poloměru (v kilometrech)");
jr_define ('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS_DESC', "Místní události a atrakce budou zobrazeny pod podrobnostmi o nemovitosti. Zde definujte poloměr pro omezení událostí zobrazených na události v určitém rozsahu.");