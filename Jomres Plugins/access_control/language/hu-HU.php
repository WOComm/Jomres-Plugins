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
jr_define ('_JOMRES_ACCESS_CONTROL', 'Beléptetés');
jr_define ('_JOMRES_ACCESS_CONTROL_DESC', 'Ez a funkció lehetővé teszi a felhasználók számára a feladatok eléréséhez szükséges minimális hozzáférési szint beállítását.');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'Alapértelmezett');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'Bárki');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', 'Regisztrált');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'Menedzser');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'Super Manager');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'Senki');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'Recepciós');