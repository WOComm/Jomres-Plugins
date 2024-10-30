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

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_auctionhouse_auctions` (
	id int(10) NOT NULL auto_increment,
	title VARCHAR(255 ),
	description text,
	value float NOT NULL default '0',
	reserve float NOT NULL default '0',
	end_value float NOT NULL default '0',
	buy_now_value float NOT NULL default '0',
	start_date DATETIME,
	end_date DATETIME,
	property_uid int(10),
	cms_user_id int(10),
	winner_cms_user_id int(10),
	lang CHAR(5) default 'en-GB',
	blackbooking_id int(10),
	finished TINYINT NOT NULL DEFAULT '0',
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_auctionhouse_bids` (
	id int(10) NOT NULL auto_increment,
	cms_user_id int(10),
	auction_id int(10),
	bid_value float NOT NULL default '0',
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_auctionhouse_lists` (
	id int(10) NOT NULL auto_increment,
	cms_user_id int(10),
	listname VARCHAR(255 ),
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_auctionhouse_lists_auction_xref` (
	id int(10) NOT NULL auto_increment,
	auction_id int(10),
	list_id int(10),
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");
