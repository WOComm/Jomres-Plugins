<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"RSS-канал");
jr_define ('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS', "Цей плагін створює канал з усіх ресурсів jomres. Наразі підтримуються формати розсилки RSS 1.0 та RSS 2.0.");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDNAME', "Назва каналу");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Опис каналу");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Назва файлу каналу (без пробілів)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Формат синдикації");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Час кешу (у секундах)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"URL-адреса зображення каналу");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Урізати опис властивості?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Обрізати після (символів)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Показати зображення каналу?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Показати зображення властивості?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN', "Показати місто власності?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Показати регіон властивостей?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Показати країну власності?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Обмежити кількість синдикованих властивостей до");