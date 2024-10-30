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

jr_define('_JRPORTAL_LOCAL_EVENTS_TITLE',"发生了什么？");
jr_define('_JRPORTAL_LOCAL_EVENTS_NOTES',"");
jr_define('_JRPORTAL_LOCAL_EVENTS_EVENT_TITLE',"事件名称");
jr_define('_JRPORTAL_LOCAL_EVENTS_STARTDATE',"开始日期");
jr_define('_JRPORTAL_LOCAL_EVENTS_ENDDATE',"结束日期");
jr_define('_JRPORTAL_LOCAL_EVENTS_LATITUDE',"纬度");
jr_define('_JRPORTAL_LOCAL_EVENTS_LONGITUDE',"经度");
jr_define('_JRPORTAL_LOCAL_EVENTS_WEBSITEURL',"站点的url");
jr_define('_JRPORTAL_LOCAL_EVENTS_EVENTLOGORELPATH',"活动标志的相对路径，如果有的话。例如www.event.com/logo.png (没有https://)");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_TITLE',"在本地做什么");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_NOTES',"");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTION_TITLE',"景点名称");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ICON',"图标");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_LATITUDE',"纬度");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_LONGITUDE',"经度");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_WEBSITEURL',"站点的url");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTIONLOGORELPATH',"景点标志的相对路径，如果有的话。例如www.attraction.com/logo.png (没有https://)");
jr_define('_JRPORTAL_LOCAL_EVENTS_EDIT',"编辑本地事件");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_EDIT',"编辑当地景点");

jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_TITLE',"本地活动和景点");
jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS',"半径限制(以公里为单位)");
jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS_DESC',"本地事件和景点将显示在属性详细信息下方。在此处定义半径以将显示的事件限制在特定范围内。");