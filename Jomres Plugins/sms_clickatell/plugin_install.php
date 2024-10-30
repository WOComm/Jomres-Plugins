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

if (!isset($jrConfig['sms_clickatell_active'])) {
	$query = "SELECT `setting`, `value` FROM #__jomres_pluginsettings WHERE `plugin` = 'backend_sms_clickatell_settings' AND `prid` = 0";
	$result = doSelectSql($query);

	if (!empty($result)) {
		foreach ($result as $r) {
			switch ($r->setting) {
				case 'active':
					$siteConfig->insert_new_setting('sms_clickatell_active', trim($r->value));
					break;
				case 'username':
					$siteConfig->insert_new_setting('sms_clickatell_username', trim($r->value));
					break;
				case 'password':
					$siteConfig->insert_new_setting('sms_clickatell_password', trim($r->value));
					break;
				case 'api_id':
					$siteConfig->insert_new_setting('sms_clickatell_api_id', trim($r->value));
					break;
				default:
					break;
			}
		}	
	} else {
		$siteConfig->insert_new_setting('sms_clickatell_active', '0');
		$siteConfig->insert_new_setting('sms_clickatell_username', '');
		$siteConfig->insert_new_setting('sms_clickatell_password', '');
		$siteConfig->insert_new_setting('sms_clickatell_api_id', '');
	}
}
