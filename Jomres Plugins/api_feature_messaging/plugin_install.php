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

// https://vertabelo.com/blog/database-model-for-a-messaging-system/

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_messages_user_group` (
	id int(10) NOT NULL auto_increment,
	user_id int(10),
	group_id int(10),
    property_uid int(10),
	create_date DATETIME,
	is_active TINYINT( 1 ) NOT NULL DEFAULT '1',
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_messages_group` (
	id int(10) NOT NULL auto_increment,
	name VARCHAR(255 ) NOT NULL default 'changeme',
	create_date DATETIME,
	is_active TINYINT( 1 ) NOT NULL DEFAULT '1',
	PRIMARY KEY  (id)
)";
	doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_messages_message` (
	id int(10) NOT NULL auto_increment,
	subject BLOB,
    creator_id int(10),
    message_body BLOB,
    attachment_id int(10),
	create_date DATETIME,
    expiry_date DATETIME,
    is_reminder TINYINT( 1 ) NOT NULL DEFAULT '0',
	is_active TINYINT( 1 ) NOT NULL DEFAULT '1',
	PRIMARY KEY  (id)
)";
	doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_messages_message_recipient` (
	id VARCHAR(255) NOT NULL default 'message_id-recipient_id-recipient_group_id',
	recipient_id int(10),
	recipient_group_id int(10),
    group_id int(10),
    message_id int(10),
    next_remind_date DATETIME,
	is_read TINYINT( 1 ) NOT NULL DEFAULT '0',
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_messages_reminder_frequency` (
	id int(10) NOT NULL auto_increment,
	title VARCHAR(255 ) NOT NULL default 'changeme',
	frequency INT(1),
	is_active TINYINT( 1 ) NOT NULL DEFAULT '1',
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");

