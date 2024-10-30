<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

if (!defined('JOMRES_INSTALLER')) exit;

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_channelmanagement_framework_channels` (
	`id` int(10) NOT NULL auto_increment,
	`cms_user_id` bigint(10),
	`channel_name` varchar(255),
	`channel_friendly_name` varchar(255),
	`params` longtext,
  PRIMARY KEY  (id)
)";

doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_channelmanagement_framework_property_uid_xref` (
	`id` int(10) NOT NULL auto_increment,
	`channel_id` int(10),
	`property_uid` int(10),
	`remote_property_uid` TEXT,
    `cms_user_id` bigint(10),
	`remote_data` longtext,
  PRIMARY KEY  (id)
)";

doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_channelmanagement_framework_mapping` (
	`id` int(10) NOT NULL auto_increment,
	`channel_name` varchar(255),
	`type` varchar(255),
	`params` longtext,
  PRIMARY KEY  (id)
)";

doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_channelmanagement_framework_plugins_user_accounts` (
	`id` int(10) NOT NULL auto_increment,
	`cms_user_id` bigint(10),
	`params` longtext,
  PRIMARY KEY  (id)
)";

doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_channelmanagement_framework_rooms_xref` (
	`id` int(10) NOT NULL auto_increment,
	`channel_id` int(10),
	`property_uid` int(10),
	`params` longtext,
  PRIMARY KEY  (id)
)";

doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_channelmanagement_framework_bookings_xref` (
	`id` int(10) NOT NULL auto_increment,
	`property_uid` int(10),
	`channel_id` int(10),
	`remote_booking_id` varchar(255),
	`local_booking_id` varchar(255),
  PRIMARY KEY  (id)
)";

doInsertSql($query,"");



$query = "CREATE TABLE IF NOT EXISTS `#__jomres_channelmanagement_framework_changelog_queue_items` (
	`id` int(10) NOT NULL auto_increment,
	`channel_name` varchar(255),
	`property_uid` int(10),
	`unique_id` varchar(255) UNIQUE,
	`date_added` datetime default NULL ,
	`completed` BOOL NOT NULL DEFAULT '0',
	`attempts` int(3)  default 0,
	`item` longtext,
  PRIMARY KEY  (id)
)";

doInsertSql($query,"");

$query = "
	ALTER TABLE `#__jomres_pluginsettings` CHANGE `value` `value` TEXT NULL DEFAULT NULL;
	";

if (!doInsertSql($query)) {
    $this->setMessage('Error, unable to modify the #__jomres_pluginsettings value column', 'danger');
}

$query = "
ALTER TABLE `#__jomres_channelmanagement_framework_property_uid_xref` CHANGE `remote_property_uid` `remote_property_uid` TEXT NULL DEFAULT NULL;
";

if (!doInsertSql($query)) {
	$this->setMessage('Error, unable to modify the #__jomres_channelmanagement_framework_property_uid_xref remote_property_uid column', 'danger');
}

$jomres_cron = jomres_singleton_abstract::getInstance('jomres_cron');
$jomres_cron->addJob('get_remote_changelog_items', 'QH', '');
$jomres_cron->addJob('process_remote_changelog_items', 'QH', '');