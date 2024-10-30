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

$cron =jomres_getSingleton('jomres_cron');
$cron->addJob("unpaid_bookings","D","");

$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
$jrConfig = $siteConfig->get();

if (!isset($jrConfig['unpaid_b_enabled'])) {
	$query = "SELECT `setting`, `value` FROM #__jomresextras_pluginsettings WHERE `plugin` = 'unpaid_bookings' AND `prid` = 0";
	$result = doSelectSql($query);

	if (!empty($result)) {
		foreach ($result as $r) {
			switch ($r->setting) {
				case 'enabled':
					$siteConfig->insert_new_setting('unpaid_b_enabled', trim($r->value));
					break;
				case 'days':
					$siteConfig->insert_new_setting('unpaid_b_days', trim($r->value));
					break;
				case 'deleteorcancel':
					$siteConfig->insert_new_setting('unpaid_b_delete', trim($r->value));
					break;
				default:
					break;
			}
		}	
	} else {
		$siteConfig->insert_new_setting('unpaid_b_enabled', '0');
		$siteConfig->insert_new_setting('unpaid_b_days', '3');
		$siteConfig->insert_new_setting('unpaid_b_delete', '0');
	}
}