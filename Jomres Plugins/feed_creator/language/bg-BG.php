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

jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"RSS канал");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Този плъгин създава емисия от всички свойства на jomres. Понастоящем се поддържат формати за синдикация RSS 1.0 и RSS 2.0.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Име на емисия");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Описание на емисията");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Име на файла за емисия (без интервали)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Формат за синдикиране");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Време за кеширане (в секунди)");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL', "URL адрес на изображението на емисията");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC', "Пресечете описанието на имота?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Отрязване след (знаци)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Показване на изображението на канала?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Показване на изображението на собственост?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"Показване на града на собственост?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Показване на региона на собственост?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Показване на държавата на собственост?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Ограничете броя на синдикираните имоти до");