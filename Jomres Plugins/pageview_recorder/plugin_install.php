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

$query = "CREATE TABLE  IF NOT EXISTS `#__jomres_pageviews` (
	`id` int( 11 ) NOT NULL AUTO_INCREMENT ,
	`task` varchar( 255 ) default NULL ,
	`property_uid` int(10) NOT NULL default '0',
	`ip` varchar( 255 ) default NULL ,
	`country_code` VARCHAR(2),
	`date_time` datetime default NULL ,
	`user_id` int( 11 ) default NULL ,
	`user_is_manager` BOOL NOT NULL DEFAULT '0',
	`user_is_registered` BOOL NOT NULL DEFAULT '0',
	PRIMARY KEY ( `id` )
	)";
doInsertSql($query,"");

$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
$jrConfig = $siteConfig->get();

if (!isset($jrConfig['record_pageviews'])) {
	$siteConfig->insert_new_setting('record_pageviews', '0');
}
