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
jr_define( '_JOMRES_ACCESS_CONTROL', 'Kontrola dostępu' );
jr_define( '_JOMRES_ACCESS_CONTROL_DESC', 'Ta funkcja umożliwia ustawienie minimalnego poziomu dostępu wymaganego przez użytkowników, aby uzyskać dostęp do określonych zadań.' );
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'Domyślne');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'Każdy');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', 'Zarejestrowany');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'Menedżer');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'Super menedżer');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'Nikt');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'Recepcjonistka');