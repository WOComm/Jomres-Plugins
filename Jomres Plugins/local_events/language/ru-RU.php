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

jr_define ('_JRPORTAL_LOCAL_EVENTS_TITLE', "Что происходит?");
jr_define ('_JRPORTAL_LOCAL_EVENTS_NOTES', "");
jr_define ('_JRPORTAL_LOCAL_EVENTS_EVENT_TITLE', "Название события");
jr_define ('_JRPORTAL_LOCAL_EVENTS_STARTDATE', "Дата начала");
jr_define ('_JRPORTAL_LOCAL_EVENTS_ENDDATE', "Дата окончания");
jr_define ('_JRPORTAL_LOCAL_EVENTS_LATITUDE', "Широта");
jr_define ('_JRPORTAL_LOCAL_EVENTS_LONGITUDE', "Долгота");
jr_define ('_JRPORTAL_LOCAL_EVENTS_WEBSITEURL', "URL сайта");
jr_define ('_JRPORTAL_LOCAL_EVENTS_EVENTLOGORELPATH', "Относительный путь к логотипу события, если он доступен. Например, www.event.com/logo.png (без https: //)");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_TITLE', "Что делать локально");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_NOTES', "");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTION_TITLE', "Название достопримечательности");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_ICON', "Значок");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_LATITUDE', "Широта");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_LONGITUDE', "Долгота");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_WEBSITEURL', "URL сайта");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTIONLOGORELPATH', "Относительный путь к логотипу аттракциона, если он доступен. Например, www.attraction.com/logo.png (без https: //)");
jr_define ('_JRPORTAL_LOCAL_EVENTS_EDIT', "Редактировать локальное событие");
jr_define ('_JRPORTAL_LOCAL_ATTRACTIONS_EDIT', "Редактировать местную достопримечательность");

jr_define ('_JRPORTAL_LOCAL_EVENTS_SETTINGS_TITLE', "Местные события и достопримечательности");
jr_define ('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS', "Ограничение радиуса (в километрах)");
jr_define ('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS_DESC', "Местные события и достопримечательности будут отображаться под деталями свойства. Определите здесь радиус, чтобы ограничить отображаемые события теми, которые находятся в определенном диапазоне.");