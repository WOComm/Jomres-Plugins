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

$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
$jrConfig = $siteConfig->get();

if (!isset($jrConfig['extmaps_overrideplist'])) {
	$query = "SELECT `setting`, `value` FROM #__jomres_pluginsettings WHERE `plugin` = 'extended_maps' AND `prid` = 0";
	$result = doSelectSql($query);

	if (!empty($result)) {
		foreach ($result as $r) {
			switch ($r->setting) {
				case 'overrideplist':
					$siteConfig->insert_new_setting('extmaps_overrideplist', trim($r->value));
					break;
				case 'width':
					$siteConfig->insert_new_setting('extmaps_width', trim($r->value));
					break;
				case 'height':
					$siteConfig->insert_new_setting('extmaps_height', trim($r->value));
					break;
				case 'maptype':
					$siteConfig->insert_new_setting('extmaps_maptype', trim($r->value));
					break;
				case 'groupmarkers':
					$siteConfig->insert_new_setting('extmaps_groupmarkers', trim($r->value));
					break;
				case 'infoicon':
					$siteConfig->insert_new_setting('extmaps_infoicon', trim($r->value));
					break;
				case 'popupwidth':
					$siteConfig->insert_new_setting('extmaps_popupwidth', trim($r->value));
					break;
				case 'img_width':
					$siteConfig->insert_new_setting('extmaps_img_width', trim($r->value));
					break;
				case 'img_height':
					$siteConfig->insert_new_setting('extmaps_img_height', trim($r->value));
					break;
				case 'show_description':
					$siteConfig->insert_new_setting('extmaps_show_desc', trim($r->value));
					break;
				case 'trim_description':
					$siteConfig->insert_new_setting('extmaps_trim_desc', trim($r->value));
					break;
				case 'trim_value':
					$siteConfig->insert_new_setting('extmaps_trim_value', trim($r->value));
					break;
				default:
					break;
			}
		}	
	} else {
		$siteConfig->insert_new_setting('extmaps_overrideplist', '0');
		$siteConfig->insert_new_setting('extmaps_width', '600');
		$siteConfig->insert_new_setting('extmaps_height', '400');
		$siteConfig->insert_new_setting('extmaps_maptype', 'ROADMAP');
		$siteConfig->insert_new_setting('extmaps_groupmarkers', '1');
		$siteConfig->insert_new_setting('extmaps_infoicon', JOMRES_ROOT_DIRECTORY.'/core-plugins/je_mapview/markers/scenic.png');
		$siteConfig->insert_new_setting('extmaps_popupwidth', '280');
		$siteConfig->insert_new_setting('extmaps_img_width', '150');
		$siteConfig->insert_new_setting('extmaps_img_height', '120');
		$siteConfig->insert_new_setting('extmaps_show_desc', '1');
		$siteConfig->insert_new_setting('extmaps_trim_desc', '1');
		$siteConfig->insert_new_setting('extmaps_trim_value', '100');
	}
}
