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

$query = "CREATE TABLE IF NOT EXISTS `#__jomres_manager_news` (
	`id` int(10) NOT NULL auto_increment,
	`article_title` VARCHAR(255 ) NOT NULL default 'changeme',
	`article_content` text NOT NULL,
	`article_url` text NOT NULL default '',
	`date_posted` DATE,
	`alert_style` VARCHAR(30) NOT NULL default 'default',
	`property_uid` INT NULL DEFAULT '0',
	PRIMARY KEY  (id)
)";
doInsertSql($query,"");

if (!checkManagerNewsPropertyuidColExists()) {
	alterManagerNewsPropertyuidCol();
}

function checkManagerNewsPropertyuidColExists()
{
    $guestsTimestampInstalled = true;
    $query = "SHOW COLUMNS FROM #__jomres_manager_news LIKE 'property_uid'";
    $result = doSelectSql($query);
    if (count($result) > 0) {
        return true;
    }

    return false;
}

function alterManagerNewsPropertyuidCol()
{
    $query = "ALTER TABLE `#__jomres_manager_news` ADD `property_uid` INT NULL DEFAULT '0' ";
    doInsertSql($query, '');
}
