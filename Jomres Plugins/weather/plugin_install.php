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

$cron =jomres_getSingleton('jomres_cron');
$cron->addJob("weather_cache_cleanup","D","");

$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
$jrConfig = $siteConfig->get();
		
if (!isset($jrConfig['openweather_apikey'])) {
	$apikey = '';
	
	$query = "SELECT `value` FROM #__jomres_pluginsettings WHERE `plugin` = 'property_weather' AND `setting` = 'apikey' AND `prid` = 0 LIMIT 1";
	$result = doSelectSql($query,1);
	
	if (trim($result) != '') {
		$apikey = $result;
	}
	
	$siteConfig->insert_new_setting('openweather_apikey', $apikey);
}
