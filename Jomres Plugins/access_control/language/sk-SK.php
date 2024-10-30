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

jr_define ('_JOMRES_ACCESS_CONTROL', 'riadenie prístupu');
jr_define ('_JOMRES_ACCESS_CONTROL_DESC', 'Táto funkcia vám umožňuje nastaviť minimálnu úroveň prístupu požadovanú užívateľmi na prístup k špecifickým úlohám.');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'Predvolené');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'ktokoľvek');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', 'registrovaný');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'manažér');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'super manažér');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'Nikto');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'recepčný');