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
jr_define('_PAGEVIEW_RECORDER_ENABLED',"Registrar totes les pàgines vistes a db?");
jr_define('_PAGEVIEW_RECORDER_DESC',"Si està activat, totes les pàgines vistes es registraran a la base de dades. ADVERTÈNCIA! La taula de visualitzacions de pàgines de la base de dades pot ser molt gran en molt poc temps! Feu servir amb cura.");