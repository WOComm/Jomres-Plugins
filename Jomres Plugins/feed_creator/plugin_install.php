<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
if (!defined('JOMRES_INSTALLER')) exit;

$query = "SHOW COLUMNS FROM #__jomres_propertys LIKE 'feed_timestamp'";
$result = doSelectSql($query);

if (!empty($result)) {
	$query="ALTER TABLE #__jomres_propertys DROP COLUMN feed_timestamp";
	doInsertSql($query,'');
}

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

if (!isset($jrConfig['feed_enabled'])) {
	$query = "SELECT `setting`, `value` FROM #__jomresextras_pluginsettings WHERE `plugin` = 'feed_creator' AND `prid` = 0";
	$result = doSelectSql($query);

	if (!empty($result)) {
		foreach ($result as $r) {
			switch ($r->setting) {
				case 'enabled':
					$siteConfig->insert_new_setting('feed_enabled', trim($r->value));
					break;
				case 'showpropertyimage':
					$siteConfig->insert_new_setting('feed_showpropertyimage', trim($r->value));
					break;
				case 'showpropertytown':
					$siteConfig->insert_new_setting('feed_showpropertytown', trim($r->value));
					break;
				case 'showpropertyregion':
					$siteConfig->insert_new_setting('feed_showpropertyregion', trim($r->value));
					break;
				case 'showpropertycountry':
					$siteConfig->insert_new_setting('feed_showpropertycountry', trim($r->value));
					break;
				case 'items':
					$siteConfig->insert_new_setting('feed_items', trim($r->value));
					break;
				case 'truncatedesc':
					$siteConfig->insert_new_setting('feed_truncatedesc', trim($r->value));
					break;
				case 'truncatedescsize':
					$siteConfig->insert_new_setting('feed_truncatedescsize', trim($r->value));
					break;
				case 'feedname':
					$siteConfig->insert_new_setting('feed_feedname', trim($r->value));
					break;
				case 'feeddesc':
					$siteConfig->insert_new_setting('feed_feeddesc', trim($r->value));
					break;
				case 'feedformat':
					$siteConfig->insert_new_setting('feed_feedformat', trim($r->value));
					break;
				case 'showfeedimage':
					$siteConfig->insert_new_setting('feed_showfeedimage', trim($r->value));
					break;
				case 'feedimageurl':
					$siteConfig->insert_new_setting('feed_feedimageurl', trim($r->value));
					break;
				case 'feedfilename':
					$siteConfig->insert_new_setting('feed_feedfilename', trim($r->value));
					break;
				case 'feedcachetime':
					$siteConfig->insert_new_setting('feed_feedcachetime', trim($r->value));
					break;
				default:
					break;
			}
		}	
	} else {
		$siteConfig->insert_new_setting('feed_enabled', '1');
		$siteConfig->insert_new_setting('feed_showpropertyimage', '1');
		$siteConfig->insert_new_setting('feed_showpropertytown', '1');
		$siteConfig->insert_new_setting('feed_showpropertytown', '1');
		$siteConfig->insert_new_setting('feed_showpropertycountry', '1');
		$siteConfig->insert_new_setting('feed_items', '10');
		$siteConfig->insert_new_setting('feed_truncatedesc', '1');
		$siteConfig->insert_new_setting('feed_truncatedescsize', '300');
		$siteConfig->insert_new_setting('feed_feedname', 'Jomres Feed');
		$siteConfig->insert_new_setting('feed_feeddesc', 'Jomres feed description');
		$siteConfig->insert_new_setting('feed_feedformat', '2');
		$siteConfig->insert_new_setting('feed_showfeedimage', '1');
		$siteConfig->insert_new_setting('feed_feedimageurl', JOMRES_IMAGES_RELPATH.'jrlogo.png');
		$siteConfig->insert_new_setting('feed_feedfilename', 'feed');
		$siteConfig->insert_new_setting('feed_feedcachetime', '86400');
	}
}
