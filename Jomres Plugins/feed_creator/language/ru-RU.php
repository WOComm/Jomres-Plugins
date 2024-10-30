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

jr_define ('_JRPORTAL_FEED_CREATOR_TITLE', "RSS-канал");
jr_define ('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS', "Этот плагин создает ленту из всех свойств jomres. В настоящее время поддерживаются форматы синдикации RSS 1.0 и RSS 2.0.");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDNAME', "Имя канала");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDDESC', "Описание канала");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME', "Имя файла канала (без пробелов)");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT', "Формат распространения");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME', "Время кеширования (в секундах)");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL', "URL изображения фида");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC', "Усечь описание свойства?");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE', "Обрезать после (символов)");
jr_define ('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE', "Показать изображение фида?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE', "Показать изображение свойства?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN', "Показать город собственности?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION', "Показать регион свойства?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY', "Показать страну собственности?");
jr_define ('_JRPORTAL_FEED_CREATOR_HITEMS', "Ограничить количество синдицированных свойств до");