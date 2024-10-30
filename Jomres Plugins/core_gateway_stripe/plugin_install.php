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

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_stripe_users` (
	id int(10) NOT NULL auto_increment,
	mos_id int(10),
	connected bool default 0,
	publishable_key VARCHAR(255) NOT NULL,
	stripe_user_id VARCHAR(255) NOT NULL,
	refresh_token VARCHAR(255) NOT NULL,
	access_token VARCHAR(255) NOT NULL,
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");
