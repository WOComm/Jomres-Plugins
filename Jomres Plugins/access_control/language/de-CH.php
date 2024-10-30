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
jr_define( '_JOMRES_ACCESS_CONTROL', 'Zugriffskontrolle');
jr_define( '_JOMRES_ACCESS_CONTROL_DESC', 'Mit dieser Funktion können Sie eine Mindestzugriffsebene festlegen, die Benutzer für den Zugriff auf bestimmte Aufgaben benötigen.' );
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'Standard');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'Jeder');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', 'Registriert');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'Manager');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'Supermanager');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'Niemand');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'Rezeptionist');