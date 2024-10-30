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

if (!isset($jrConfig['nearby_prop_enabled'])) {
	$query = "SELECT `setting`, `value` FROM #__jomresextras_pluginsettings WHERE `plugin` = 'nearby_propertys' AND `prid` = 0";
	$result = doSelectSql($query);

	if (!empty($result)) {
		foreach ($result as $r) {
			switch ($r->setting) {
				case 'enabled':
					$siteConfig->insert_new_setting('nearby_prop_enabled', trim($r->value));
					break;
				case 'radius':
					$siteConfig->insert_new_setting('nearby_prop_radius', trim($r->value));
					break;
				case 'unit':
					$siteConfig->insert_new_setting('nearby_prop_unit', trim($r->value));
					break;
				case 'ptype_enabled':
					$siteConfig->insert_new_setting('nearby_prop_ptype_enabled', trim($r->value));
					break;
				case 'listlimit':
					$siteConfig->insert_new_setting('nearby_prop_listlimit', trim($r->value));
					break;
				default:
					break;
			}
		}	
	} else {
		$siteConfig->insert_new_setting('nearby_prop_enabled', '1');
		$siteConfig->insert_new_setting('nearby_prop_radius', '10');
		$siteConfig->insert_new_setting('nearby_prop_unit', '0');
		$siteConfig->insert_new_setting('nearby_prop_ptype_enabled', '0');
		$siteConfig->insert_new_setting('nearby_prop_listlimit', '5');
	}
}
