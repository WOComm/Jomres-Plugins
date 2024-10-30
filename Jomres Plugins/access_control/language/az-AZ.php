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
jr_define ('_JOMRES_ACCESS_CONTROL', 'Giriş Nəzarəti');
jr_define ('_JOMRES_ACCESS_CONTROL_DESC', 'Bu xüsusiyyət istifadəçilərin xüsusi vəzifələrə daxil olması üçün tələb olunan minimum giriş səviyyəsini təyin etməyə imkan verir.');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'Varsayılan');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'Hər kəs');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', 'Qeydiyyatdan keçdi');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'Menecer');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'Super Manager');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'Heç kim');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'Resepsiyonist');