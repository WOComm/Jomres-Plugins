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

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_beds24_contract_booking_number_xref` (
	`id` int(10) NOT NULL auto_increment,
	`contract_uid` int(10),
	`property_uid` int(10),
	`booking_number` varchar(255),
	`room_id` int(10),
  PRIMARY KEY  (id)
)";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_beds24_room_type_xref` (
	`id` int(10) NOT NULL auto_increment,
	`jomres_room_type` int(10),
	`beds24_room_type` int(10),
	`property_uid`  int(10),
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_beds24_property_uid_xref` (
	`id` int(10) NOT NULL auto_increment,
	`property_uid` int(10),
	`beds24_property_uid` int(10),
    `manager_id` int(10),
  PRIMARY KEY  (id)
)";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_beds24_rest_api_key_xref` (
	`id` int(10) NOT NULL auto_increment,
	`oauth_client` VARCHAR(80) NULL DEFAULT NULL,
    `manager_id` int(10),
  PRIMARY KEY  (id)
)";
doInsertSql($query,"");


$cron =jomres_getSingleton('jomres_cron');
$cron->removeJob( "beds24_cron_getbookings");

if ( !checkBookingnumberxrefRoomidColExists() ) alterBookingnumberxrefRoomidCol();

function checkBookingnumberxrefRoomidColExists()
	{
	$query  = "SHOW COLUMNS FROM #__jomres_beds24_contract_booking_number_xref LIKE 'room_id'";
	$result = doSelectSql( $query );
	if ( !empty( $result ) )
		return true;
	return false;
	}

function alterBookingnumberxrefRoomidCol()
	{
	$query = "ALTER TABLE `#__jomres_beds24_contract_booking_number_xref` ADD `room_id` int(10) AFTER `booking_number` ";
	doInsertSql( $query, '' );
	}

	