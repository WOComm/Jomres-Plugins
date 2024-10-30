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
jr_define ('_JOMRES_ACCESS_CONTROL', 'Մուտքի վերահսկում');
jr_define ('_JOMRES_ACCESS_CONTROL_DESC', 'Այս գործառույթը թույլ է տալիս սահմանել օգտվողների կողմից պահանջվող մուտքի նվազագույն մակարդակ `որոշակի առաջադրանքներ մուտք գործելու համար:');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'Կանխադրված');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'bodyանկացած մեկը');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', 'Գրանցված');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'Կառավարիչ');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'Super Manager');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'Ոչ ոք');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'Ընդունիչ');