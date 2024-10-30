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

jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"RSS Feed");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"此插件从所有 jomres 属性创建提要。目前支持 RSS 1.0 和 RSS 2.0 联合格式。");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Feed 名称");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Feed 描述");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Feed 文件名(无空格)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"联合格式");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"缓存时间(秒)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"Feed 图片网址");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"截断属性描述？");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"(字符)后截断");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"显示提要图片？");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"显示属性图像？");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"显示房产城镇？");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"显示属性区域？");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"显示房产国家？");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"限制联合财产的数量");