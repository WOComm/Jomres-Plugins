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

jr_define('_PAGEVIEW_RECORDER_ENABLED',"将所有页面视图记录到数据库中？");
jr_define('_PAGEVIEW_RECORDER_DESC',"如果启用，所有页面访问量将被记录到数据库中。警告！数据库页面访问量表可能在很短的时间内变得非常大！小心使用。");