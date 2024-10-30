<?php
/**
 * Plugin
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9 
* @package Jomres
* @copyright	2005-2010 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable. 
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define( '_JOMRES_ACCESS_CONTROL', "Controllo Accessi");
jr_define( '_JOMRES_ACCESS_CONTROL_DESC', "Questa funzione consente di impostare un livello di accesso minimo richiesto dagli utenti per accedere ad attività specifiche.");
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', "Predefinito");
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', "Chiunque");
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', "Utente Registrato");
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', "Manager");
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', "Super Manager");
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', "Nessuno");
jr_define('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', "Receptionist");
