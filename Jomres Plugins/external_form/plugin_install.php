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

if (!isset($jrConfig['external_form_shortcode'])) {
	$query = "SELECT `setting`, `value` FROM #__jomres_pluginsettings WHERE `plugin` = 'external_form' AND `prid` = 0";
	$result = doSelectSql($query);

	if (!empty($result)) {
		foreach ($result as $r) {
			switch ($r->setting) {
				case 'plugin_shortcode':
					$siteConfig->insert_new_setting('external_form_shortcode', trim($r->value));
					break;
				case 'arg1':
					$siteConfig->insert_new_setting('external_form_arg1', trim($r->value));
					break;
				case 'arg2':
					$siteConfig->insert_new_setting('external_form_arg2', trim($r->value));
					break;
				default:
					break;
			}
		}	
	} else {
		$siteConfig->insert_new_setting('external_form_shortcode', '');
		$siteConfig->insert_new_setting('external_form_arg1', '');
		$siteConfig->insert_new_setting('external_form_arg2', '');
	}
}
