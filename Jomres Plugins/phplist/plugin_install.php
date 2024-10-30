<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
if (!defined('JOMRES_INSTALLER')) exit;

$query = "CREATE TABLE IF NOT EXISTS `#__jomresextras_pluginsettings` (
`id` int(11) NOT NULL auto_increment,
`prid` int(11),
`plugin` varchar(255),
`setting` varchar(255),
`value` text,
PRIMARY KEY (id)
)";
doInsertSql($query,"");

$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
$jrConfig = $siteConfig->get();

if (!isset($jrConfig['phplist_enabled'])) {
	$siteConfig->insert_new_setting('phplist_enabled', '0');
	$siteConfig->insert_new_setting('phplist_url', 'http://www.mysite.com/lists/');
	$siteConfig->insert_new_setting('phplist_user', 'admin');
	$siteConfig->insert_new_setting('phplist_pass', '123456');
	$siteConfig->insert_new_setting('phplist_skipConfEmail', '1');
	$siteConfig->insert_new_setting('phplist_html', '1');
	$siteConfig->insert_new_setting('phplist_attr1', 'attribute1');
	$siteConfig->insert_new_setting('phplist_attr2', 'attribute2');
	$siteConfig->insert_new_setting('phplist_list_id', '1');
}
