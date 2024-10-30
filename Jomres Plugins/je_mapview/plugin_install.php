<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
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

if (!isset($jrConfig['mapview_height'])) {
	$query = "SELECT `setting`, `value` FROM #__jomresextras_pluginsettings WHERE `plugin` = 'je_mapview' AND `prid` = 0";
	$result = doSelectSql($query);

	if (!empty($result)) {
		foreach ($result as $r) {
			switch ($r->setting) {
				case 'width':
					$siteConfig->insert_new_setting('mapview_width', trim($r->value));
					break;
				case 'height':
					$siteConfig->insert_new_setting('mapview_height', trim($r->value));
					break;
				case 'maptype':
					$siteConfig->insert_new_setting('mapview_maptype', trim($r->value));
					break;
				case 'groupmarkers':
					$siteConfig->insert_new_setting('mapview_groupmarkers', trim($r->value));
					break;
				case 'infoicon':
					$siteConfig->insert_new_setting('mapview_infoicon', trim($r->value));
					break;
				case 'popupwidth':
					$siteConfig->insert_new_setting('mapview_popupwidth', trim($r->value));
					break;
				case 'img_width':
					$siteConfig->insert_new_setting('mapview_img_width', trim($r->value));
					break;
				case 'img_height':
					$siteConfig->insert_new_setting('mapview_img_height', trim($r->value));
					break;
				case 'show_description':
					$siteConfig->insert_new_setting('mapview_show_desc', trim($r->value));
					break;
				case 'trim_description':
					$siteConfig->insert_new_setting('mapview_trim_desc', trim($r->value));
					break;
				case 'trim_value':
					$siteConfig->insert_new_setting('mapview_trim_value', trim($r->value));
					break;
				default:
					break;
			}
		}	
	} else {
		$siteConfig->insert_new_setting('mapview_width', '600');
		$siteConfig->insert_new_setting('mapview_height', '400');
		$siteConfig->insert_new_setting('mapview_maptype', 'ROADMAP');
		$siteConfig->insert_new_setting('mapview_groupmarkers', '1');
		$siteConfig->insert_new_setting('mapview_infoicon', JOMRES_ROOT_DIRECTORY.'/core-plugins/je_mapview/markers/scenic.png');
		$siteConfig->insert_new_setting('mapview_popupwidth', '280');
		$siteConfig->insert_new_setting('mapview_img_width', '150');
		$siteConfig->insert_new_setting('mapview_img_height', '120');
		$siteConfig->insert_new_setting('mapview_show_desc', '1');
		$siteConfig->insert_new_setting('mapview_trim_desc', '1');
		$siteConfig->insert_new_setting('mapview_trim_value', '100');
	}
}
