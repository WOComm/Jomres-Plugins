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


jr_define ('_PAGEVIEW_RECORDER_ENABLED', "Log alle sidevisninger til db?");
jr_define('_PAGEVIEW_RECORDER_DESC',"Hvis aktiveret, vil alle sidevisninger blive logget til databasen. ADVARSEL! Databasesidevisningstabellen kan blive meget stor i løbet af meget kort tid! Brug med forsigtighed.");