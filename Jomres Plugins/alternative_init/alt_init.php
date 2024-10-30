<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// Designed to allow a non-jomres script to include jomres functionality without actually running Jomres itself

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

require_once(dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'framework.php');
