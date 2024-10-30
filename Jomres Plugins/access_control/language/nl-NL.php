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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################

jr_define( '_JOMRES_ACCESS_CONTROL', 'Toegangscontrole');
jr_define( '_JOMRES_ACCESS_CONTROL_DESC', 'Met deze functie kunt u een minimaal toegangsniveau instellen dat gebruikers nodig hebben om toegang te krijgen tot specifieke taken.');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'Standaard');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'Iedereen');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', 'Geregistreerd');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'Beheerder');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'Supermanager');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'Niemand');
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'Receptionist');
