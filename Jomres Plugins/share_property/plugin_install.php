<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2011 Aladar Barthi
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

if (!isset($jrConfig['share_prop_enabled'])) {
	$query = "SELECT `setting`, `value` FROM #__jomresextras_pluginsettings WHERE `plugin` = 'share_property' AND `prid` = 0";
	$result = doSelectSql($query);

	if (!empty($result)) {
		foreach ($result as $r) {
			switch ($r->setting) {
				case 'enabled':
					$siteConfig->insert_new_setting('share_prop_enabled', trim($r->value));
					break;
				case 'style':
					$siteConfig->insert_new_setting('share_prop_style', trim($r->value));
					break;
				case 'shortURL':
					$siteConfig->insert_new_setting('share_prop_shortURL', trim($r->value));
					break;
				case 'displayDelicious':
					$siteConfig->insert_new_setting('share_prop_Delicious', trim($r->value));
					break;
				case 'displayDigg':
					$siteConfig->insert_new_setting('share_prop_Digg', trim($r->value));
					break;
				case 'displayFacebook':
					$siteConfig->insert_new_setting('share_prop_Facebook', trim($r->value));
					break;
				case 'displayGoogle':
					$siteConfig->insert_new_setting('share_prop_Google', trim($r->value));
					break;
				case 'displayStumbleUpon':
					$siteConfig->insert_new_setting('share_prop_StumbleUpon', trim($r->value));
					break;
				case 'displayTechnorati':
					$siteConfig->insert_new_setting('share_prop_Technorati', trim($r->value));
					break;
				case 'displayTwitter':
					$siteConfig->insert_new_setting('share_prop_Twitter', trim($r->value));
					break;
				case 'displayLinkedIn':
					$siteConfig->insert_new_setting('share_prop_LinkedIn', trim($r->value));
					break;
				case 'displayGooglePlus':
					$siteConfig->insert_new_setting('share_prop_GooglePlus', trim($r->value));
					break;
				case 'displayGooglePlusOne':
					$siteConfig->insert_new_setting('share_prop_GooglePlusOne', trim($r->value));
					break;
				default:
					break;
			}
		}	
	} else {
		$siteConfig->insert_new_setting('share_prop_enabled', '1');
		$siteConfig->insert_new_setting('share_prop_style', 'texto');
		$siteConfig->insert_new_setting('share_prop_shortURL', '0');
		$siteConfig->insert_new_setting('share_prop_Delicious', '1');
		$siteConfig->insert_new_setting('share_prop_Digg', '1');
		$siteConfig->insert_new_setting('share_prop_Facebook', '1');
		$siteConfig->insert_new_setting('share_prop_Google', '1');
		$siteConfig->insert_new_setting('share_prop_StumbleUpon', '1');
		$siteConfig->insert_new_setting('share_prop_Technorati', '1');
		$siteConfig->insert_new_setting('share_prop_Twitter', '1');
		$siteConfig->insert_new_setting('share_prop_LinkedIn', '1');
		$siteConfig->insert_new_setting('share_prop_GooglePlus', '1');
		$siteConfig->insert_new_setting('share_prop_GooglePlusOne', '1');
	}
}
