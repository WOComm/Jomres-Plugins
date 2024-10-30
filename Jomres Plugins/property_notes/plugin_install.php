<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9
* @package Jomres
* @copyright	2005-2018 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

if (!defined('JOMRES_INSTALLER')) exit;

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_property_notes` (
	id int(10) NOT NULL auto_increment,
	property_note text NOT NULL,
	property_uid int(10),
	PRIMARY KEY  (id)
)";

doInsertSql($query,"");


