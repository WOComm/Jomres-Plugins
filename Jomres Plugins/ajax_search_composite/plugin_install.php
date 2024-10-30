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

$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
$jrConfig = $siteConfig->get();

if (!isset($jrConfig['asc_template_style'])) {
	$query = "SELECT `setting`, `value` FROM #__jomres_pluginsettings WHERE `plugin` = 'ajax_search_composite' AND `prid` = 0";
	$result = doSelectSql($query);

	if (!empty($result)) {
		foreach ($result as $r) {
			switch ($r->setting) {
				case 'template_style':
					$siteConfig->insert_new_setting('asc_template_style', trim($r->value));
					break;
				case 'by_date':
					$siteConfig->insert_new_setting('asc_by_date', trim($r->value));
					break;
				case 'by_guestnumber':
					$siteConfig->insert_new_setting('asc_by_guestnumber', trim($r->value));
					break;
				case 'by_propertytype':
					$siteConfig->insert_new_setting('asc_by_propertytype', trim($r->value));
					break;
				case 'by_roomtype':
					$siteConfig->insert_new_setting('asc_by_roomtype', trim($r->value));
					break;
				case 'by_town':
					$siteConfig->insert_new_setting('asc_by_town', trim($r->value));
					break;
				case 'by_region':
					$siteConfig->insert_new_setting('asc_by_region', trim($r->value));
					break;
				case 'by_country':
					$siteConfig->insert_new_setting('asc_by_country', trim($r->value));
					break;
				case 'by_features':
					$siteConfig->insert_new_setting('asc_by_features', trim($r->value));
					break;
				case 'by_price':
					$siteConfig->insert_new_setting('asc_by_price', trim($r->value));
					break;
				case 'by_stars':
					$siteConfig->insert_new_setting('asc_by_stars', trim($r->value));
					break;
				default:
					break;
			}
		}	
	} else {
		$siteConfig->insert_new_setting('asc_template_style', 'multiselect');
		$siteConfig->insert_new_setting('asc_by_date', '1');
		$siteConfig->insert_new_setting('asc_by_guestnumber', '1');
		$siteConfig->insert_new_setting('asc_by_propertytype', '1');
		$siteConfig->insert_new_setting('asc_by_roomtype', '1');
		$siteConfig->insert_new_setting('asc_by_town', '1');
		$siteConfig->insert_new_setting('asc_by_region', '1');
		$siteConfig->insert_new_setting('asc_by_country', '1');
		$siteConfig->insert_new_setting('asc_by_features', '1');
		$siteConfig->insert_new_setting('asc_by_price', '1');
		$siteConfig->insert_new_setting('asc_by_stars', '1');
	}
}
