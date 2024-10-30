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
jr_define( '_JOMRES_ACCESS_CONTROL', 'Access Control' );
jr_define( '_JOMRES_ACCESS_CONTROL_DESC', 'This feature allows you to set a minimum access level required by users to access specific tasks.' );
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'Default');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'Anybody');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', 'Registered');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'Manager');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'Super Manager');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'Nobody');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'Receptionist');