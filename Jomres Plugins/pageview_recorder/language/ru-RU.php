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

jr_define ('_PAGEVIEW_RECORDER_ENABLED', "Записывать все просмотры страниц в базу данных?");
jr_define ('_PAGEVIEW_RECORDER_DESC', "Если включено, все просмотры страниц будут регистрироваться в базе данных. ВНИМАНИЕ! Таблица просмотров страниц базы данных может стать очень большой за очень короткое время! Используйте с осторожностью.");