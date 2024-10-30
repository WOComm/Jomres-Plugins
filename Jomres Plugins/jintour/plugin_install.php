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

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_jintour_profiles` (
	id int(10) NOT NULL auto_increment,
	title VARCHAR(255 ) NOT NULL default 'changeme',
	description text NOT NULL,
	days_of_week CHAR(25),
	price_adults float NOT NULL default '0',
	price_kids float NOT NULL default '0',
	spaces_adults int(10),
	spaces_kids int(10),
	start_date DATE,
	end_date DATE,
	repeating bool,
	property_uid int(10),
	tax_rate float NOT NULL default '0',
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_jintour_tours` (
	id int(10) NOT NULL auto_increment,
	title VARCHAR(255 ) NOT NULL default 'changeme',
	description text NOT NULL,
	price_adults float NOT NULL default '0',
	price_kids float NOT NULL default '0',
	tourdate DATE,
	spaces_available_adults int(10),
	spaces_available_kids int(10),
	property_uid int(10),
	tax_rate float NOT NULL default '0',
	published TINYINT( 1 ) NOT NULL DEFAULT '1',
	profile_id int(10),
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_jintour_tour_bookings` (
	id int(10) NOT NULL auto_increment,
	description text,
	tour_id int(10),
	spaces_adults int(10),
	spaces_kids int(10),
	contract_id int(10),
	property_id int(10),
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_jintour_properties` (
	id int(10) NOT NULL auto_increment,
	property_uid int(10),
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");

//create and update indexes if necessary
$query = "SHOW INDEX FROM `#__jomres_jintour_properties` WHERE Key_name = 'property_uid' ";
$indexExists = doSelectSql( $query );
if (count($indexExists) < 1)
	{
	$query = "ALTER TABLE `#__jomres_jintour_properties` ADD INDEX property_uid ( property_uid ) ";
	doInsertSql($query,"");
	}

$query = "SHOW INDEX FROM `#__jomres_jintour_profiles` WHERE Key_name = 'property_uid' ";
$indexExists = doSelectSql( $query );
if (count($indexExists) < 1)
	{
	$query = "ALTER TABLE `#__jomres_jintour_profiles` ADD INDEX property_uid ( property_uid ) ";
	doInsertSql($query,"");
	}

$query = "SHOW INDEX FROM `#__jomres_jintour_tours` WHERE Key_name = 'property_uid' ";
$indexExists = doSelectSql( $query );
if (count($indexExists) < 1)
	{
	$query = "ALTER TABLE `#__jomres_jintour_tours` ADD INDEX property_uid ( property_uid ) ";
	doInsertSql($query,"");
	}

$query = "SHOW INDEX FROM `#__jomres_jintour_tour_bookings` WHERE Key_name = 'property_uid' ";
$indexExists = doSelectSql( $query );
if (count($indexExists) < 1)
	{
	$query = "ALTER TABLE `#__jomres_jintour_tour_bookings` ADD INDEX property_uid ( property_id ) ";
	doInsertSql($query,"");
	}

$query = "SHOW INDEX FROM `#__jomres_jintour_tour_bookings` WHERE Key_name = 'contract_id' ";
$indexExists = doSelectSql( $query );
if (count($indexExists) < 1)
	{
	$query = "ALTER TABLE `#__jomres_jintour_tour_bookings` ADD INDEX contract_id ( contract_id ) ";
	doInsertSql($query,"");
	}

$query = "SHOW INDEX FROM `#__jomres_jintour_tour_bookings` WHERE Key_name = 'tour_id' ";
$indexExists = doSelectSql( $query );
if (count($indexExists) < 1)
	{
	$query = "ALTER TABLE `#__jomres_jintour_tour_bookings` ADD INDEX tour_id ( tour_id ) ";
	doInsertSql($query,"");
	}


$query = "SHOW COLUMNS FROM `#__jomres_jintour_tours` LIKE 'profile_id' ";
$indexExists = doSelectSql( $query );
if (count($indexExists) < 1)
	{
	$query = "ALTER TABLE `#__jomres_jintour_tours` ADD profile_id int(10) ";
	doInsertSql($query,"");
	}