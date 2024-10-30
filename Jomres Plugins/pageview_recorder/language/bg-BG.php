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

jr_define('_PAGEVIEW_RECORDER_ENABLED',"Регистрирайте всички показвания на страници в db?");
jr_define('_PAGEVIEW_RECORDER_DESC',"Ако е активирано, всички изгледи на страници ще се записват в базата данни. ПРЕДУПРЕЖДЕНИЕ! Таблицата за показвания на страници в базата данни може да стане много голяма за много кратък период от време! Използвайте внимателно.");