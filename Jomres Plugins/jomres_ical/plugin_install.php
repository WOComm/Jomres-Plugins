<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

if (!defined('JOMRES_INSTALLER')) exit;

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_ical_remote_feeds` (
	id int(10) NOT NULL auto_increment,
	url VARCHAR(2000) NOT NULL default '',
	room_uid int(10),
	property_uid int(10),
	PRIMARY KEY  (id)
)";

doInsertSql($query,"");

$jomres_cron = jomres_singleton_abstract::getInstance('jomres_cron');
$jomres_cron->addJob('ical_process_remote_feeds', 'QH', '');
