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

jr_define('_PAGEVIEW_RECORDER_ENABLED',"Записувати всі перегляди сторінок у базу даних?");
jr_define('_PAGEVIEW_RECORDER_DESC',"Якщо ввімкнено, всі перегляди сторінок будуть записані в базу даних. ПОПЕРЕДЖЕННЯ! Таблиця переглядів сторінок бази даних може стати дуже великою за дуже короткий проміжок часу! Використовуйте з обережністю.");