<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

if (!defined('JOMRES_INSTALLER')) exit;

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_minimum_occupancies` (
	id int(10) NOT NULL auto_increment,
	room_type_id int(10),
	property_uid int(10),
	guest_type_map CHAR(150),
	PRIMARY KEY  (id)
	)";
doInsertSql($query,"");
