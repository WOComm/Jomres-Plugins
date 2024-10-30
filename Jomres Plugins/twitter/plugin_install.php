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

if (!isset($jrConfig['twitter_hashtags'])) {
	$query = "SELECT `setting`, `value` FROM #__jomres_pluginsettings WHERE `plugin` = 'twitter_config' AND `prid` = 0";
	$result = doSelectSql($query);

	if (!empty($result)) {
		foreach ($result as $r) {
			switch ($r->setting) {
				case 'hashtags':
					$siteConfig->insert_new_setting('twitter_hashtags', trim($r->value));
					break;
				case 'message':
					$siteConfig->insert_new_setting('twitter_message', trim($r->value));
					break;
				case 'access_token':
					$siteConfig->insert_new_setting('twitter_access_token', trim($r->value));
					break;
				case 'access_secret':
					$siteConfig->insert_new_setting('twitter_access_secret', trim($r->value));
					break;
				case 'consumer_key':
					$siteConfig->insert_new_setting('twitter_consumer_key', trim($r->value));
					break;
				case 'consumer_secret':
					$siteConfig->insert_new_setting('twitter_consumer_secret', trim($r->value));
					break;
				default:
					break;
			}
		}	
	} else {
		$siteConfig->insert_new_setting('twitter_hashtags', '');
		$siteConfig->insert_new_setting('twitter_message', 'A booking has been made for');
		$siteConfig->insert_new_setting('twitter_access_token', '');
		$siteConfig->insert_new_setting('twitter_access_secret', '');
		$siteConfig->insert_new_setting('twitter_consumer_key', '');
		$siteConfig->insert_new_setting('twitter_consumer_secret', '');
	}
}
